<?php
    use Model\Conexao;
    if(isset($_POST['tabela'])){ 
        $dados = explode(',',filter_var($_POST['tabela'], FILTER_SANITIZE_SPECIAL_CHARS));
        $userid = $dados[0] ?? "";   
        $campo = $dados[1] ?? "";  
        $novo = $dados[2] ?? "";  
        
        if(in_array('',$dados)){
            $notificacao = "<p class='red'>Erro: campo vazio</p>";
        }else{
            $conexao =new Conexao;
            $conexao->mysqli();
            $erro = false;
            // verificar dados
            $selectver = "SELECT email,nome,acesso FROM usuarios WHERE id='$userid' LIMIT 1";   
            $queryver = mysqli_query($conexao->conect, $selectver);
            $ver_result = mysqli_fetch_object($queryver);
            // end verificar dados

            // verificações de acesso
            if($ver_result->acesso == "master" and $_SESSION['usr-acesso'] == "adm"){
                $notificacao = "<p class='red'>Sem permissão para alterar dados de um master</p>";
                $erro = true;
            }
            if($ver_result->acesso == "adm" and $_SESSION['usr-acesso'] == "adm"){
                $notificacao = "<p class='red'>Sem permissão para alterar dados de um adm</p>";
                $erro = true;
            }        
            // end verificações de acesso

            if($erro == false){
                switch($campo): 
                    case "nome":                    
                        if(strlen($novo) <= 4 or str_contains($novo, ' ')){
                            $notificacao = "<p class='red'>Erro: nome muito curto ou inválido</p>";                      
                        }else{
                            $queryupdate = "UPDATE usuarios SET nome='$novo' where id='$userid'";
                            if(mysqli_query($conexao->conect, $queryupdate)){
                                $notificacao = "<p class='green'>Nome atualizado com sucesso<br>'$novo'</p>"; 
                            }
                        }
                    break; 
    
                    case "sobrenome":
                        if(strlen($novo) <= 4){
                            $notificacao = "<p class='red'>Erro: sobrenome muito curto</p>";                      
                        }else{
                            $queryupdate = "UPDATE usuarios SET sobrenome='$novo' where id='$userid'";
                            if(mysqli_query($conexao->conect, $queryupdate)){
                                $notificacao = "<p class='green'>Sobrenome atualizado com sucesso<br>'$novo'</p>"; 
                            }
                        }                
                    break;
    
                    case "email": 
                        if($novo == $ver_result->email){
                            $notificacao = "<p class='red'>Erro: e-mail já cadastrado</p>";
                        }else{
                            if(filter_var($novo,FILTER_VALIDATE_EMAIL) == false){
                                $notificacao = "<p class='red'>Erro: e-mail inválido</p>"; 
                            }else{
                                $queryupdate = "UPDATE usuarios SET email='$novo' where id='$userid'";
                                if(mysqli_query($conexao->conect, $queryupdate)){
                                    $notificacao = "<p class='green'>E-mail atualizado com sucesso<br>'$novo'</p>"; 
                                }
                            }
                        }
                    break;  
    
                    case "telefone":                   
                        if(!is_numeric($novo)){
                            $notificacao = "<p class='red'>Erro: digite apenas números</p>";                         
                        }else{
                            if(strlen($novo) < 9 or strlen($novo) > 14){
                                $notificacao = "<p class='red'>Erro: telefone deve conter entre 14 e 9 digitos</p>";     
                            }else{
                                $queryupdate = "UPDATE usuarios SET telefone='$novo' where id='$userid'";
                                if(mysqli_query($conexao->conect, $queryupdate)){
                                    $notificacao = "<p class='green'>Telefone atualizado com sucesso<br>'$novo'</p>"; 
                                }
                            }
                        }                                       
                    break;  
    
                    case "acesso":
                        if($ver_result->acesso == "master"){
                            $notificacao = "<p class='red'>Um master não pode ter seu nivel de acesso alterado</p>";
                        }else{
                            if($novo == "adm" or $novo == "user"){
                                $queryupdate = "UPDATE usuarios SET acesso='$novo' where id='$userid'";
                                if(mysqli_query($conexao->conect, $queryupdate)){
                                    $notificacao = "<p class='green'>Nivel de acesso atualizado com sucesso<br>'".strtoupper($novo)."'</p>";  
                                }                                                 
                            }else{
                                $notificacao = "<p class='red'>Erro: nivel de acesso só pode ser<br>adm ou usuario</p>";                                               
                            }
                        }     
                    break;   
                    
                    case "excluir":
                        if($ver_result->acesso == "master"){
                            $notificacao = "<p class='red'>Um master não pode ser excluido</p>";
                        }else{
                            $excluiruser="DELETE FROM usuarios WHERE id='$userid'";
                            if(mysqli_query($conexao->conect, $excluiruser)){
                                $notificacao = "<p class='red'>Usuário $ver_result->nome excluido</p>";
                            } 
                        }                                     
                    break;

                    case "senha":
                        if($_SESSION['usr-acesso'] != "master"){
                            $notificacao = "<p class='red'>Sem permissão para alterar senha</p>";
                        }else{
                            if(strlen($novo) <= 5){
                                $notificacao = "<p class='red'>Senha muito curta</p>";
                            }else{
                                $c_rash = password_hash($novo.'sdioufgisdfugndikofugniksdufgn', PASSWORD_DEFAULT); 
                                $queryupdate = "UPDATE usuarios SET senha='$c_rash' where id='$userid'";
                                if(mysqli_query($conexao->conect, $queryupdate)){
                                    $notificacao = "<p class='green'>Senha do usuario '$ver_result->nome' atualizada</p>";
                                }
                            }                            
                        }                                     
                    break;
                endswitch;
            }  
            $conexao->close();        
        }        
    }

    $_SESSION['notification'] = $notificacao ?? "";
    include "./Public/view/tabela.php";
?>

<script>
   $(document).ready(function(){ 
        $("#notification").removeClass("display-none");
        setTimeout(function() {
            $('#notification').fadeOut('fast');
      }, 4000)
   });
</script>