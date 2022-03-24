<?php
require './vendor/autoload.php';
require './Core/Global.php';

use Controller\View\{ControllerHome, ControllerLogin, ControllerError};
use Controller\{ControllerLogoff};
use Core\App;
$router = new App;


if(isset($_SESSION['nome'])){        
    $router->view("", function(){(new ControllerHome)->render_home();});
    $router->view("logoff", function(){(new ControllerLogoff)->logoff();}); 

    // ajax
    $router->view("tabela", function(){view('tabela');}, "POST");
    $router->view("cadastro", "./Controllers/ControllerCadastro.php", "POST");
    $router->view("menu", "./Controllers/ControllerMenu.php", "POST");
    $router->view("editar", "./Controllers/ControllerEditor.php", "POST");
}else{        
    // tela de login
    $router->view("", function(){(new ControllerLogin)->render_login();});
    $router->view("login", function(){(new ControllerLogin)->login();} , "POST");    
}

//Files routers
$router->file("/sitemap.xml", "./Controllers/sitemap.php");
$router->file("/robots.txt", "./Controllers/robots.php");

if($router->valid == false){
    (new ControllerError)->render_error();
}