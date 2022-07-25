<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=mglsi_news;', 'root');
if (!$_SESSION['mdp']) {
 	header('Location: connexion.php');
 	} 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Aficher les categories</title>
	<meta charset="utf-8">
</head>
<body>
      <?php
      $recupCategories = $bdd->query('SELECT * FROM categorie');
      while($categorie = $recupCategories->fetch()){
      	?>
      	<div class="categorie" style="border: 1px solid black">
      		<h1><?= $categorie ['id']; ?></h1>
      		<p><?= $categorie['libelle'];?></p>
      		<a href="Supprimer-categorie.php?id=<?= $categorie['id']; ?>">
      			<button style="color: white ; background-color: red; margin-bottom: 10px;">Supprimer le categorie</button>
      		</a>
      		<a href="modifier-categorie.php?id=<?= $categorie['id']; ?>">
      			<button style="color: black ; background-color: yellow; margin-bottom: 10px;">Modifier le categorie</button>
      		</a>
      		
      	</div>
      	<br>
      	<?php  
      } 
      ?>
</body>
</html>