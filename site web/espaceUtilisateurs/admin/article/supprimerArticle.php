<?php 
$bdd = new PDO('mysql:host=localhost;dbname=mglsi_news;', 'root');
if(isset($_GET['id']) AND !empty($_GET['id'])){
  $getid = $_GET['id'];
  $recupArticle = $bdd->prepare('SELECT * FROM Article WHERE id = ?');
  $recupArticle->execute(array($getid));
  if($recupArticle->rowCount() > 0){
    $deleteArticle = $bdd->prepare('DELETE FROM Article WHERE id = ?');
    $deleteArticle->execute(array($getid));
    header('Location: ../listeArticles.php');
  }else{
  	echo "Aucun article trouvé";
  }
 }else{
 	echo "Aucun identifiant trouvé";
 }
 ?> 
