<?php
namespace Controller\View;
use Model\Conexao;

class ControllerLogin 
{    
    public $view = "login";   
    public $title = "Login - Gerenciador de usuários";


    public function render_login(){
        require "./Public/view/".$this->view.".php";        
    }

    public function login(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $conexao = new Conexao;
            $conexao->mysqli();           
        
            $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT); 
            $dados_st = array_map('strip_tags',$dados_rc);
            $dados = array_map('trim', $dados_st);               
        
            if(in_array('',$dados)){
                echo "Preencha todos os campos";
            }else{
                $email_user = $dados['email_login'];
                $l_senha = $dados['senha_login'];
                $selectlogin = "SELECT * FROM usuarios WHERE email='$email_user' LIMIT 1";   
                $querylogin = mysqli_query($conexao->conect, $selectlogin);
                if(mysqli_num_rows($querylogin) == 1){
                    $l_result = mysqli_fetch_object($querylogin);
                    if(password_verify( $l_senha.'sdioufgisdfugndikofugniksdufgn', $l_result->senha)){
                        if($l_result->acesso == "adm" or $l_result->acesso == "master"){
                             //logado       
                            $_SESSION['nome'] = $l_result->nome;                  
                            $_SESSION['usr-id'] = $l_result->id;                            
                            $_SESSION['usr-email'] = $l_result->email;                      
                            $_SESSION['usr-acesso'] = $l_result->acesso;
                            echo "true";
                        }else{
                            echo "Nivel de acesso negado";
                        }
                       
                    }else{
                        echo "Senha incorreta";                        
                    }       
                }else{
                    echo "Login ou senha incorreto";                    
                }      
            }
            $conexao->close();
        }
    }
}