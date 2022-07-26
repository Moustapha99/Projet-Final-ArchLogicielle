<?php 
session_start();
   
    include("../../connexion.php");
    include("../../functions.php");
?>

<!DOCTYPE html>
<!-- -->
<html> 
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ESP News - Site d'acutualité</title>
        <link rel="stylesheet" href="../../style.css">
        <script src="script.js"></script>
    </head>

    <body>

    <header><h1 id="titre">ESP News</h1>
        <nav>
                 <ul class="navlinks">
                    

                    <li><a class="firstA" href="listeArticles.php">Liste des articles</a></li>

                    <li><a class="firstA" href="categorie/ajouterCategorie.php">Catégorie</a></li>
                    
                    <li><a class="firstA" href="article/publierArticle.php">Article</a></li>

                    <li>
                        <a id="secondA" href="../../logout.php">Déconnexion</a>
                    </li> 
                </ul> 
     </nav>
    </header>  
    <div id="mesArticles" > 
                
                <?php
                    include '../../connexion.php';
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
<?php include '../../includes/footer.php';?>
