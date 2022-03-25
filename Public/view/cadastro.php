<div class="cadastro">
    <form id="form_cadastro" class="form-cadastro" action="/cadastro" method="post">
        <div class="ntf-cadastro" id="ntf_cadastro"></div>
        <input class="login-input" type="text" name="nome" placeholder="Nome">
        <input class="login-input" type="text" name="sobrenome" placeholder="Sobrenome">
        <input class="login-input" type="email" name="email" placeholder="E-mail">
        <input class="login-input" type="text" onkeypress="return onlynumber();" name="telefone" placeholder="Telefone">
        <input class="login-input" type="password" name="senha" placeholder="Senha">
        <input class="login-input" type="password" name="confirmar_senha" placeholder="Confirmar senha"> 
        <input class="btn-submit" type="submit" name="cadastro" value="Cadastrar usuário">
    </form>      

    <script>
        $("#form_cadastro").submit(function(event){            
            event.preventDefault();
            var post_url = $(this).attr("action");
            var request_method = $(this).attr("method");
            var form_data = $(this).serialize();	
            $.ajax({
                url : post_url,
                type: request_method,
                data : form_data
            }).done(function(response){ //
                console.log("dsddsf")
                $("#ntf_cadastro").html(response);
            });
        });  

        function onlynumber(evt) {
            var theEvent = evt || window.event;
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode( key );
            //var regex = /^[0-9.,]+$/;
            var regex = /^[0-9.]+$/;
            if( !regex.test(key) ) {
                theEvent.returnValue = false;
                if(theEvent.preventDefault) theEvent.preventDefault();
            }
        }
    </script>
</div>
