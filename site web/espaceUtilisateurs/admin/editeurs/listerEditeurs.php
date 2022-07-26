<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=mglsi_news;', 'root');
// if (!$_SESSION['mdp']) {
//  	header('Location: ../../signin.php');
//  	} 
?>

<!DOCTYPE html>
<!-- -->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ESP News - Site d'acutualité</title>
        <link rel="stylesheet" href="../../../style.css">
        <script src="script.js"></script>
    </head>
<body>
<header><h1 id="titre">ESP News</h1>
        <nav>
                <ul class="navlinks">
                    <li><a class="firstA" href="../listeArticles.php">Liste des articles</a></li>
                    <li>
                        <a class="firstA" href="../categorie/ajouterCategorie.php">Catégorie</a>
                    </li>

                    <li>
                        <a class="firstA" href="../article/publierArticle.php">Article</a>
                    </li>
                
                    <li>
                        <a class="firstA" href="ajouterEditeur.php">Editeurs</a>
                    </li>
            
                </ul>
                <ul>
                    <li>
                        <a id="secondA" href="../../../logout.php">Déconnexion</a>
                    </li> 
                </ul>
        </nav>
    </header>  


	<!-- Afficher tous les membres -->
         <?php 
         $recupUsers = $bdd->query('SELECT * FROM Utilisateurs');
         while ($user = $recupUsers->fetch()) {
         	?>

             <div style="float:right; padding:20px; font-size:25px;border: 1px solid #4671d6; margin:15px;">
            <p class="username"><?= $user['username']; ?> 
             <a class="usernameSupp" href="supprimerEditeur.php?id=<?= $user['id']; ?>" style="color: red; text-decoration: none;">supprimer le visiteur</a><br/></p>
         	<a class="usernameModif" href="modifierEditeurs.php?id=<?= $user['id']; ?>">
      			<button style="color: black ; background-color: yellow; margin-bottom: 10px;"><span style="font-size 20px;">Modifier<span></button>
      		</a>
         </div>
         	<?php
         }

         ?>
	<!-- Fin afficher tout les membres -->

</body>
</html>