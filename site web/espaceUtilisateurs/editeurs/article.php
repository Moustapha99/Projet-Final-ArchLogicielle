<?php
session_start();
   
include '../../includes/footer.php';


if (empty($_GET['id']))
{
	die('Erreur, pas d\'id défini');
}

  $conn = mysqli_connect('localhost', 'root','','mglsi_news');    

  $sql = "SELECT * FROM article WHERE id='" . $_GET['id'] . "'"; //on sélectionne l'article
  $result = mysqli_query($conn, $sql) or die('Erreur SQL : '.mysql_error());
  $article=$result->fetch_assoc();//on récupère les résultats
?>


<!DOCTYPE html>
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
	<?php
    //   $recupArticles = $bdd->query('SELECT * FROM articles');
    //   while($article = $recupArticles->fetch()){
      	?>
	<div class="Affarticle">
		<h1 id="artTitle",><?= $article['titre']?></h1><br/>
		<h3 id="artContenu"><?= $article['contenu'] ?></h3> 

            <a href="article/supprimerArticle.php?id=<?= $article['id']; ?>">
      			<button style="color: white ; background-color: red; margin-bottom: 10px;">Supprimer l'article</button>
      		</a>
      		<a href="article/modifierArticle.php?id=<?= $article['id']; ?>">
      			<button style="color: black ; background-color: yellow; margin-bottom: 10px; float:right;">Modifier l'article</button>
      		</a>
	<div>

	<?php  
    //   } 
      ?>
	</body>