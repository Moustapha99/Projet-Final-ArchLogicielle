<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root');
if(!$_SESSION['mdp']){
  header('Location: connexion.php');
}
  if (isset($_POST['envoi'])) {
    if (!empty($_POST['id']) AND !empty($_POST['pseudo'])) {
      $id = htmlspecialchars($_POST['id']);
      $pseudo = nl2br(htmlspecialchars($_POST['pseudo']));

    $insererArticle = $bdd->prepare('INSERT INTO membres(id, pseudo)VALUES(?, ?)');
    $insererArticle->execute(array($id, $pseudo));
      echo "Le visiteur a bien été ajouter";
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
  <input type="text" name="id">
  <br>
  <textarea name="pseudo"></textarea>
  <br>
  <input type="submit" name="envoi">
  
</form>
</body>
</html>