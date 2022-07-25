<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root');
if (!$_SESSION['mdp']) {
 	header('Location: connexion.php');
 	} 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Afficher les membres</title>
	<meta charset="utf-8">
</head>
<body>
	<!-- Afficher tous les membres -->
         <?php 
         $recupUsers = $bdd->query('SELECT * FROM membres');
         while ($user = $recupUsers->fetch()) {
         	?>
         	<p><?= $user['pseudo']; ?> <a href="supprimer.php?id=<?= $user['id']; ?>" style="color: red; text-decoration: none;">supprimer le visiteur</a></p>
         	<a href="modifier-visiteurs.php?id=<?= $user['id']; ?>">
      			<button style="color: black ; background-color: yellow; margin-bottom: 10px;">Modifier</button>
      		</a>
         	<?php
         }

         ?>
	<!-- Fin afficher tout les membres -->

</body>
</html>