<?php
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root');
if(isset($_GET['id']) AND !empty($_GET['id'])){
	$getid = $_GET['id'];
    $recupArticle = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
   $recupArticle->execute(array($getid));
   if($recupArticle->rowCount() > 0){
   	  $articleInfos = $recupArticle->fetch();
      $id = $articleInfos['id'];
      $pseudo = str_replace('<br />', '', $articleInfos['pseudo']);
      
      if(isset($_POST['valider'])){  
       $id_saisi = htmlspecialchars($_POST['id']);
       $pseudo_saisi = nl2br(htmlspecialchars($_POST['pseudo']));

       $updateArticle = $bdd->prepare('UPDATE membres SET id = ?, pseudo = ? WHERE id = ?');
       $updateArticle->execute(array($id_saisi, $pseudo_saisi, $getid));

         header('Location: visiteurs.php');
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
    	<input type="text" name="id" value="<?= $id; ?>">
    	<br>
    	<textarea name="pseudo"><?= $pseudo; ?></textarea>
    	
    	<br><br>
    	<input type="submit" name="valider">
    </form>
</body>
</html>