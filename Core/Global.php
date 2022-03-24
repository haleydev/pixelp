<?php
date_default_timezone_set('America/Sao_Paulo');

if(!isset($_SESSION)){
    session_start();    
}

ob_start();

// router functions
function view($view){
    $file = './Public/view/'.$view.'.php';
    if(file_exists($file)){        
        require $file;                               
    }else{
        header("Location: /404");
    }
}

function mvcget($variable){
    if(defined($variable)){
        $array = get_defined_constants(true)["user"]; 
        return $array[$variable];
    }else{
        return "INDEFINED";
    }
}


// url config
if($_SERVER["HTTP_HOST"] == "localhost"){
    define("URL", "http://localhost");  
}else{   
    define("URL", "https://infinityfilmes.net"); 
}


// functions front-end
function active($link){
    $linkatual = filter_var(urldecode($_SERVER['REQUEST_URI']), FILTER_SANITIZE_URL);              
        if($link == $linkatual){
            echo 'active';
    }
}