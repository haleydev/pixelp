<?php
require './vendor/autoload.php';
require './Core/Global.php';

use Controller\View\{ControllerHome, ControllerLogin};
use Controller\{ControllerLogoff};
use Core\App;
$app = new App;


if(isset($_SESSION['nome'])){        
    $app->url("", function(){(new ControllerHome)->render_home();});
    $app->url("logoff", function(){(new ControllerLogoff)->logoff();}); 
    // ajax
    $app->post("tabela", function(){renderView('tabela');});
    $app->post("cadastro", "./Controllers/ControllerCadastro.php");
    $app->post("menu", "./Controllers/ControllerMenu.php");
    $app->post("editar", "./Controllers/ControllerEditor.php");
}else{ 
    // tela de login
    $app->url("", function(){(new ControllerLogin)->render_login();});
    $app->post("login", function(){(new ControllerLogin)->login();});    
}

// files routers
$app->file("/sitemap.xml", "./Controllers/sitemap.php");
$app->file("/robots.txt", "./Controllers/robots.php");

$app->end();