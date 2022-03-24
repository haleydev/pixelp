<?php
use Model\Conexao;
$conexao = new Conexao;
$conexao->mysqli();
$conexao->conect;

$q = "";
if(isset($_POST['pesquisa'])){
   $filtersearch = filter_var($_POST['pesquisa'], FILTER_SANITIZE_SPECIAL_CHARS);
   if(strlen($filtersearch) >= 1){
      $q = "WHERE nome like '%$filtersearch%' or email like '%$filtersearch%' or id like '%$filtersearch%' or telefone like '%$filtersearch%'";
   }      
}
$selectusers = "SELECT * FROM usuarios $q ORDER BY id ASC";
$queryusers = mysqli_query($conexao->conect, $selectusers);
$quantidadepesquisa = mysqli_num_rows($queryusers);

// quantidade de usuarios encontrados
$selectquantidade = "SELECT id FROM usuarios";
$queryquantidade = mysqli_query($conexao->conect, $selectquantidade);
$quantidadetotal = mysqli_num_rows($queryquantidade);

if(isset($_POST['pesquisa']) and $quantidadepesquisa > 0 and strlen($filtersearch) >= 1):?>

<script>
   $("#total_results").html('<?=$quantidadepesquisa?> resultados para <?=$filtersearch?>');
</script>

<?php else:?>

<script>
   $("#total_results").html('Usuários cadastrados <?=$quantidadetotal?>');
</script>

<?php endif;?>

<div id="notification" class="notification display-none">
   <?php if(isset($_SESSION['notification'])){echo $_SESSION['notification']; unset($_SESSION['notification']);}?>
</div>

<table id="tabela" class="tabela-usuarios">
   <tr onclick=reverse() title="Reverter tabela" class="tabela_th" id="tabela_th">
      <th class="table-id">ID</th>
      <th>Nome</th>
      <th>Sobrenome</th>
      <th>E-mail</th>
      <th>Telefone</th>
      <th>Nivel de acesso</th>
      <th>Data de cadastro</th>
      <?php if($_SESSION['usr-acesso'] == "master"):?> <th>Senha</th> <?php endif;?>
      <th class="table-action">Ações</th>  
   </tr>       
   <?php   
   while($userinfo=mysqli_fetch_object($queryusers)):?> 
   <tr>
      <td class="table-id" data-label="ID"><?=$userinfo->id?></td>
      <td title="Clique para editar" class="field-editable" campo="nome" iduser="<?=$userinfo->id?>" data-label="Nome"><?=$userinfo->nome?></td>
      <td title="Clique para editar" class="field-editable" campo="sobrenome" iduser="<?=$userinfo->id?>" data-label="Sobrenome"><?=$userinfo->sobrenome?></td>
      <td title="Clique para editar" class="field-editable" campo="email" iduser="<?=$userinfo->id?>" data-label="E-mail"><?=$userinfo->email?></td>
      <td title="Clique para editar" class="field-editable" campo="telefone" iduser="<?=$userinfo->id?>" data-label="Telefone"><?=$userinfo->telefone?></td>
      <td title="Clique para editar" class="field-editable" campo="acesso" iduser="<?=$userinfo->id?>" data-label="Nivel de acesso"><?=$userinfo->acesso?></td>
      <td data-label="Data de cadastro"><?=$userinfo->data_cadastro?></td>
      <?php if($_SESSION['usr-acesso'] == "master"):?> <td title="Clique para editar" class="field-editable campo-senha" campo="senha" iduser="<?=$userinfo->id?>" data-label="Senha"></td> <?php endif;?>
      <td title="Cuidado!" campo="excluir" iduser="<?=$userinfo->id?>" class="table-action action-hover field-editable">EXCLUIR</td>
   </tr> 
   <?php endwhile;?>   
</table>
<?php
if($quantidadepesquisa == 0):?>
   <p class="sem-resultados">Sem resultados</p>
<?php endif;?>
<?php $conexao->close()?>

<script> 
   $(function () {
      $(".field-editable").click(function () {
         var conteudoOriginal = $(this).text();
         var userid = $(this).attr('iduser');
         var campo = $(this).attr('campo');

         switch(campo) {
            case "senha":
               $(this).addClass("celulaEmEdicao");
               $(this).html("<input class='input-edit' type='password' value='" + conteudoOriginal + "' />");
               $(this).children().first().focus();
            break;
           
            case "excluir":
               var infEdit = userid + "," + campo;
                  $.ajax({
                        type:'post',
                        url:'<?=URL?>/editar',                
                        data:{tabela: infEdit}, 
                        success:function(resultado){
                           $("#main").html(resultado);
                        }
                  }); 
            break;

            default:
               $(this).addClass("celulaEmEdicao");
               $(this).html("<input class='input-edit' type='text' value='" + conteudoOriginal + "' />");
               $(this).children().first().focus();
         }   

         $(this).children().first().keypress(function (e) {
               if (e.which == 13) {
                  var novoConteudo = $(this).val();
                  var infEdit = userid + "," + campo + "," + novoConteudo;                  

                  $.ajax({
                     type:'post',
                     url:'<?=URL?>/editar',                
                     data:{tabela: infEdit}, 
                     success:function(resultado){
                        $("#main").html(resultado);
                     }
                  });    

                  $(this).parent().text(novoConteudo);
                  $(this).parent().removeClass("celulaEmEdicao");
               }
         });

         $(this).children().first().blur(function(){      
            $(this).parent().text(conteudoOriginal);
            $(this).parent().removeClass("celulaEmEdicao");
         });
      });
   });   

   // reverter tabela (foi dificil achar essa funcao kaka)
   function reverse(epinfo){
      [].reverse.call($('table tr')).not( "#tabela_th" ).appendTo('table');
   }
</script>
