<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=mglsi_news;', 'root');
if(!$_SESSION['mdp']){
  header('Location: connexion.php');
}
  if (isset($_POST['envoi'])) {
    if (!empty($_POST['id']) AND !empty($_POST['libelle'])) {
      $id = htmlspecialchars($_POST['id']);
      $libelle = nl2br(htmlspecialchars($_POST['libelle']));

    $inserercategorie = $bdd->prepare('INSERT INTO categorie(id, libelle)VALUES(?, ?)');
    $inserercategorie->execute(array($id, $libelle));
      echo "L'categorie a bien été envoyé";
    }else{
      echo "Veuillez completer tous les champs...";

    }
    
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Publier une categorie</title>
  <meta charset="utf-8">
</head>
<body>
<form method="POST" action="">
  <input type="text" name="id">
  <br>
  <textarea name="libelle"></textarea>
  <br>
  <input type="submit" name="envoi">
  
</form>
</body>
</html>