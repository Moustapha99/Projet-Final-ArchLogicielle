<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=mglsi_news;', 'root');
if(!$_SESSION['mdp']){
	header('Location: connexion.php');
}
  if (isset($_POST['envoi'])) {
  	if (!empty($_POST['titre']) AND !empty($_POST['contenu']) AND !empty($_POST['categorie'])) {
  		$titre = htmlspecialchars($_POST['titre']);
  		$contenu = nl2br(htmlspecialchars($_POST['contenu']));

    $insererArticle = $bdd->prepare('INSERT INTO articles(titre, contenu, categorie)VALUES(?, ?, ?)');
    $insererArticle->execute(array($titre, $contenu, $categorie));
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
  <select name="categorie">
  <option value=""> ---Selectionner une catégorie--- </option>
<option value="Sport">Sport</option>
<option value="Sport">Politique</option>
<option value="Sport">Sante</option>
<option value="Sport">Education</option>
</select>
	<input type="submit" name="envoi">

	
</form>
</body>
</html>