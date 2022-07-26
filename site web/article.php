<?php

include 'includes/header.php';
include 'includes/footer.php';

if (empty($_GET['id']))
{
	die('Erreur, pas d\'id défini');
}

  $conn = mysqli_connect('localhost', 'root','','mglsi_news');    

  $sql = "SELECT * FROM article WHERE id='" . $_GET['id'] . "'"; //on sélectionne l'article
  $result = mysqli_query($conn, $sql) or die('Erreur SQL : '.mysql_error());
  $article=$result->fetch_assoc();//on récupère les résultats

?>

<div class="Affarticle">
<h1 id="artTitle"><?= $article['titre']?></h1><br/>
<h3 id="artContenu"><?= $article['contenu'] ?></h3> 
<div>