<?php
$bdd = new PDO('mysql:host=localhost;dbname=mglsi_news;', 'root');
if(isset($_GET['id']) AND !empty($_GET['id'])){
	$getid = $_GET['id'];
    $recupArticle = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
   $recupArticle->execute(array($getid));
   if($recupArticle->rowCount() > 0){
   	  $articleInfos = $recupArticle->fetch();
      $titre = $articleInfos['titre'];
      $contenu = str_replace('<br />', '', $articleInfos['contenu']);
      
      if(isset($_POST['valider'])){  
       $titre_saisi = htmlspecialchars($_POST['titre']);
       $contenu_saisi = nl2br(htmlspecialchars($_POST['contenu']));

       $updateArticle = $bdd->prepare('UPDATE articleS SET titre = ?, contenu = ? WHERE id = ?');
       $updateArticle->execute(array($titre_saisi, $contenu_saisi, $getid));

         header('Location: articles.php');
      }

   }else
   {
       echo "Aucun article trouvé";
   }
}else{
	echo "Aucun identifiant trouvé";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Modifier l'article</title>
	<meta charset="utf-8">
</head>
<body>
    <form method="POST" action="">
    	<input type="text" name="titre" value="<?= $titre; ?>">
    	<br>
    	<textarea name="contenu"><?= $contenu; ?></textarea>
    	
    	<br><br>
    	<input type="submit" name="valider">
    </form>
</body>
</html>