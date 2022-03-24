<?php
namespace Controller\View;

class ControllerHome 
{    
    public $view = "tabela";
    public $template = "main";
    public $title = "Gerenciador de usuários";    

    public function render_home(){  
        $this->require = "./Public/view/".$this->view.".php";       
        require  "./Public/templates/".$this->template.".php"; 
    }
}