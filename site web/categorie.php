<?php

include 'includes/footer.php';
include 'includes/header.php';

if (empty($_GET['categorie']))
{
	die('Erreur, pas de categorie définie');
}

  $conn = mysqli_connect('localhost', 'root','','mglsi_news');    
  $sql = "SELECT * FROM article WHERE categorie='" . $_GET['categorie'] . "'"; //on sélectionne les article par categorie
  $result = mysqli_query($conn, $sql) or die('Erreur SQL : '.mysql_error());
  // $articles=$result->fetch_assoc();//on récupère les résultats

?>
<div id="mesArticlesparCat" > 
                
                <?php
                    
                    foreach ($result as $article) {        
                ?>
                <div id="idArticleparCat" class="box" data-id="<?=$article["id"]?>">
                    <div id="titreArticleparCat" class="box"><h3><a classe="lienArt" href="article.php?id=<?= $article['id'] ?>"> <?=$article["titre"]?></a></h3></div>
                    <div id="contenuArticleparCat" class="box"><a classe="lienArt" href="article.php?id=<?= $article['id'] ?>"> <?=$article["contenu"]?></a></div>
                </div>
                              
                <?php
                   }
                ?>    
        </div>
        