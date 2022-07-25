<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root');
if(!$_SESSION['mdp']){
	header('Location: connexion.php');
}
  if (isset($_POST['envoi'])) {
  	if (!empty($_POST['titre']) AND !empty($_POST['contenu'])) {
  		$titre = htmlspecialchars($_POST['titre']);
  		$contenu = nl2br(htmlspecialchars($_POST['contenu']));

    $insererArticle = $bdd->prepare('INSERT INTO articles(titre, contenu)VALUES(?, ?)');
    $insererArticle->execute(array($titre, $contenu));
  		echo "L'article a bien été envoyé";
  	}else{
  		echo "Veuillez completer tous les champs...";

  	}
  	
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Publier un article</title>
	<meta charset="utf-8">
</head>
<body>
<form method="POST" action="">
	<input type="text" name="titre">
	<br>
	<textarea name="contenu"></textarea>
	<br>
	<input type="submit" name="envoi">
	
</form>
</body>
</html>