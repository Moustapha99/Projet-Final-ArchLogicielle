<?php
$bdd = new PDO('mysql:host=localhost;dbname=mglsi_news;', 'root');
if(isset($_GET['id']) AND !empty($_GET['id'])){
	$getid = $_GET['id'];
    $recupCategorie = $bdd->prepare('SELECT * FROM categorie WHERE id = ?');
   $recupCategorie->execute(array($getid));
   if($recupCategorie->rowCount() > 0){
   	  $categorieInfos = $recupCategorie->fetch();
      $libelle = str_replace('<br />', '', $categorieInfos['libelle']);
      
      if(isset($_POST['valider'])){  
       
       $libelle_saisi = nl2br(htmlspecialchars($_POST['libelle']));

       $updateCategorie = $bdd->prepare('UPDATE categorie SET id = ?, libelle = ? WHERE id = ?');
       $updateCategorie->execute(array( $libelle_saisi, $getid));

         header('Location: categorie.php');
      }

   }else
   {
       echo "Aucune categorie trouvé";
   }
}else{
	echo "Aucun identifiant trouvé";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Modifier la categorie</title>
	<meta charset="utf-8">
</head>
<body>
    <form method="POST" action="">
    	
    	<textarea name="libelle"><?= $libelle; ?></textarea>
    	
    	<br><br>
    	<input type="submit" name="valider">
    </form>
</body>
</html>