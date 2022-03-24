<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <meta name="theme-color" content="#191919">  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="<?=URL?>/css/main.css?<?=time()?>">
    <title><?=$this->title?></title>
</head>
<body>

<header id="header" class="header"> 
    <div class="header-p1">
        <h1>Gerenciador de usuários</h1>

        <div class="btns-header">
            <input type='checkbox' id='darkmod' value='Dark Mod' class='display-none'>
            <label title='ligar/deligar modo noturno' for='darkmod'><span class="material-icons">nights_stay</span></label>
        </div>        
    </div>
   
    <div class="user-log">
        <p>Bem vindo <?=$_SESSION['nome']?> - <?=$_SESSION['usr-acesso']?></p>        
    </div>
    
    <nav class="main-menu" id="nav">
        <div class="div-search">            
            <input id="search_input" autocomplete="off" name="usuario" class="input-search" type="text" placeholder="Pesquisar...">          
        </div>
        
        <p id="total_results" class="total-results"></p> 

        <input id="nav-toggle" type="checkbox" class="display-none">
        <ul class="links">
            <li><button onclick = menu(this) value="inicio"><p style="color: rgb(183, 83, 83);" class="btn-menu"> Listar usuários </p></button></li>        
            <li><button onclick = menu(this) value="cadastro"><p class="btn-menu"> Cadastrar usuário </p></button></li>
            <li><button onclick = menu(this) value="logoff"><p class="btn-menu"> Encerrar sessão </p></button></li>
        </ul> 
        
        <label for="nav-toggle" class="icon-burger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>            
        </label>
    </nav>  
</header>

<div id="main" class="main">   
    <?php include $this->require ?> 
   
</div>            
    
<footer class="footer">    
    <span><p>&copy; Gerenciador de usuários <?=date('Y')?></p></span>    
</footer>

<script>
    const summary = document.querySelectorAll('.btn-menu');
    for (let i = 0; i < summary.length; i++){
        const el = summary[i];
        el.onclick = () => {
            for (let j = 0; j < summary.length; j++) {
            const color = summary[j] === el ? 'rgb(183 83 83)' : 'var(--font-color-primary)';
            summary[j].style.color = color;
            }
        } 
    }

    function menu(menun){             
        $.ajax({                
            url: '/menu',
            type: "POST",
            data: {menu:$(menun).val()},
            success:function(resultmenu){                   
                $("#main").html(resultmenu);
            }
        })
    };   

    $(document).ready(function(){
        $("#search_input").keyup(function(){
            $.ajax({
                type:'POST',
                url:'/tabela',                
                data:{pesquisa: $('#search_input').val()}, 
                success:function(result){
                    $("#main").html(result);
                }
            });
        });
    });
</script>  
<script src="<?=URL?>/js/main.js"></script>

</body>
</html>