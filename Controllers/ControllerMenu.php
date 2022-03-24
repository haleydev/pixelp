<?php
if(isset($_POST['menu'])){
    
    switch($_POST['menu']):
        case "inicio":
            return include './Public/view/tabela.php';
            break; 

        case "cadastro":
            return include './Public/view/cadastro.php';
            break; 

        case "logoff":?>
            <script>    
                $(document).ready(function() {
                    window.location.replace("<?=URL?>/logoff");
                });
            </script>
        <?php break;
    endswitch;  
}
?>