<?php
// use Model\Conexao;
// $conexao = new Conexao;
// $conexao->mysqli();

// $mysqlxml = "SELECT * FROM blog ORDER BY id DESC";
// $mysqlxml = "";
// $connxml = mysqli_query($conexao->conect, "$mysqlxml");  

header("Content-type: text/xml");
echo '<?xml version="1.0" encoding="UTF-8" ?>';
?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?=URL?></loc>        
        <lastmod>2022-01-03</lastmod>
        <priority>1.0</priority>
    </url>

    <?php            
        // while($xml=mysqli_fetch_object($connxml)) {        
        //     echo 
        //     "<url>
        //         <loc>https://yousite/post?p=".$xml->id."</loc>        
        //         <lastmod>".$xml->oficialdata."</lastmod>
        //         <priority>1.0</priority>
        //     </url>"
            
        // ;}
    ?>   

</urlset>
<?php
    // $conexao->close() 
?>