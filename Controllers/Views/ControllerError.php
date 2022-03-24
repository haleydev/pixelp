<?php
namespace Controller\View;

class ControllerError 
{    
    public $view = "error";
    public $title = "Pagina não encontrada";    

    public function render_error(){
        http_response_code(404);          
        require  "./Public/view/$this->view.php"; 
    }
}