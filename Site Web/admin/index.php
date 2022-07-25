<?php 
 session_start();
 if (!$_SESSION['mdp']) {
 	header('Location: connexion.php');
 }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<nav>
		<ul>
			<li class="deroulant"><a href="#">Article &ensp;</a>
				<ul class="sous">
	   <li> <a href="publier-article.php">Publier un nouvel article</a></li>
	 <li> <a href="articles.php">Afficher tous les articles</a></li> 
	</ul>
   </li>
       <li class="deroulant"><a href="#">Catégorie &ensp;</a>
      <ul class="sous">
	<li><a href="categorie.php">Afficher les categories</a></li>
	<li><a href="ajouter-categorie.php">Ajouter une categories</a></li>
	</ul>
</li>
 <li class="deroulant"><a href="#">Utilisateurs &ensp;</a>
      <ul class="sous">
	<li><a href="visiteurs.php">Afficher les visiteurs</a></li>
	<li><a href="ajouter-visiteurs.php">Ajouter un visiteur</a></li>
	</ul>
</li>
</ul>
  </nav>

</body>
</html>