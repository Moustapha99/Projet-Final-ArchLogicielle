<?php 
session_start();
   
    include("connexion.php");
    include("functions.php");
include 'includes/header.php';
?>

        <h2 id="lastNews">Les dernières actualités</h2>
        <div id="mesArticles" > 
                
                <?php
                    include 'connexion.php';
                    foreach ($result as $article) {        
                ?>
                <div id="idArticle" class="box" data-id="<?=$article["id"]?>">
                    <div id="titreArticle" class="box"><h3><a classe="lienArt" href="article.php?id=<?= $article['id'] ?>"> <?=$article["titre"]?></a></h3></div>
                    <div id="contenuArticle" class="box"><a classe="lienArt" href="article.php?id=<?= $article['id'] ?>"> <?=$article["contenu"]?></a></div>
                </div>
                              
                <?php
                   }
                ?>    
        </div> 
        
<?php include 'includes/footer.php';?>
