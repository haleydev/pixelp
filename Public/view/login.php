<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <meta name="theme-color" content="#242424">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="<?=URL?>/css/login.css?<?=time()?>">
    <title><?=$this->title?></title>
</head>
<body>
<div id="main" class="main"> 
    <img class="logo-login" src="<?=URL?>/images/logo.png" alt="logo">

    <div class="btn-dark">
        <input type='checkbox' id='darkmod' value='Dark Mod' class='display-none'>
        <label title='ligar/deligar modo noturno' for='darkmod'><span class="material-icons">nights_stay</span></label>
    </div>        
      
    <form method="POST" id="form_login" action="<?=URL?>/login" class="form-login">
        <h1 class="display-none">Pixelp Project</h1>
        <p class="notification" id="notification"></p>
        <div class="div-login-input"><span class="material-icons">email</span><input class="login-input" type="text" name="email_login" placeholder="E-mail"></div>
        <div class="div-login-input"><span class="material-icons">lock</span><input class="login-input" type="password" name="senha_login" placeholder="Senha"></div>                      
        <input class="btn-submit" type="submit" value="LOGIN" name="login">                
    </form> 

    <span class="copy"><p>&copy; Gerenciador de usuários <?=date('Y')?></p></span>    
</div>

<script>
    $("#form_login").submit(function(event){
        event.preventDefault();
        var post_url = $(this).attr("action");
        var request_method = $(this).attr("method");
        var form_login = $(this).serialize();	
        $.ajax({
            url : post_url,
            type: request_method,
            data : form_login
        }).done(function(response){		
            if(response == "true"){
                location.reload();
            }else{
                $("#notification").html(response);
            }
        });
    });    
</script>
<script src="<?=URL?>/js/main.js"></script>
</body>
</html>