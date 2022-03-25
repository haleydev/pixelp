<?php
use Model\Conexao;
if(isset($_POST['nome'])){
    $conexao = new Conexao;
    $conexao->mysqli();

    $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT); 
    $dados_st = array_map('strip_tags',$dados_rc);
    $dados = array_map('trim', $dados_st);
    $c_erro = null; 
  
    $nome = $dados['nome'];
    $sobrenome = $dados['sobrenome'];
    $email = $dados['email']; 
    $telefone = $dados['telefone']; 
    $senha = $dados['senha'];    
    $c_confirmar_senha = $dados['confirmar_senha'];  
    $c_data = date('d/m/Y \à\s H:i'); 

    if(in_array('',$dados)){
        echo "<p>Preencha todos os campos</p>";
    }else{
        // telefone
        if(!is_numeric($telefone)){
            echo "<p>'> Telefone deve conter apenas números</p>"; 
            $c_erro = true;                        
        }else{
            if(strlen($telefone) < 9 or strlen($telefone) > 14){
                echo "<p> Telefone deve conter entre 14 e 9 digitos</p>";     
                $c_erro = true;
            }
        }

        if(strpos($nome, ' ') == true) {
            echo "<p>Nome não pode ter espaços em branco</p>";
            $c_erro = true;
        }

        //usuario  
        if(strlen($nome) <= 4){
            echo "<p>Nome muito curto</p>"; 
            $c_erro = true;
        }

        //email
        if(filter_var($email , FILTER_VALIDATE_EMAIL ) == false) {  
            echo "<p>E-mail invalido</p>";
            $c_erro = true;                       
        }else{
            $selectemail = "SELECT email FROM usuarios WHERE email ='$email' LIMIT 1";   
            $queryemail = mysqli_query($conexao->conect, $selectemail);
            if(mysqli_num_rows($queryemail) != 0){
                echo "<p>E-mail já cadastrado</p>";   
                $c_erro = true;         
            }
        }    
        //senha
        if($senha == $c_confirmar_senha){
            if(strlen($senha) <= 6){
                echo "<p>Senha muito curta 'min 6'</p>";
                $c_erro = true;
            }else{
                $c_rash = password_hash($senha.'sdioufgisdfugndikofugniksdufgn', PASSWORD_DEFAULT);                
            }        
        }else{
            echo "<p>As senhas não se coincidem</p>";
            $c_erro = true;
        }     
        //inserir
        if($c_erro == null){
            $sql_user = "INSERT INTO usuarios (nome, email, senha, data_cadastro, telefone, sobrenome, acesso) 
            VALUES ('$nome', '$email', '$c_rash', '$c_data', '$telefone', '$sobrenome', 'user')";      
            (mysqli_query($conexao->conect, $sql_user));
            echo "<p class='green'>CADASTRADO COM SUCESSO</p>";
        }
    }
    $conexao->close();
}