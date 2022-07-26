<?php
    error_reporting(0);
    session_start();

include("../../../connexion.php");
include '../../../includes/footer.php';

    $bdd = new PDO('mysql:host=localhost;dbname=mglsi_news;', 'root');
// if(!$_SESSION['mdp']){
//   header('Location: connexion.php');
// }
  if (isset($_POST['submit'])) {
    if (!empty($_POST['libelle'])) {
      $libelle = nl2br(htmlspecialchars($_POST['libelle']));

    $inserercategorie = $bdd->prepare('INSERT INTO Categorie(libelle)VALUES(?)');
    $inserercategorie->execute(array($libelle));
      echo "La categorie a bien été enregistrée";
    }else{
      echo "Veuillez completer tous les champs...";

    }
    
  }

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
                        <a class="firstA" href="ajouterCategorie.php">Catégorie</a>
                    </li>

                    <li>
                        <a class="firstA" href="../article/publierArticle.php">Article</a>
                    </li>
            
                </ul>
                <ul>
                    <li>
                        <a id="secondA" href="../../../logout.php">Déconnexion</a>
                    </li> 
                </ul>
        </nav>
    </header>  



    <div class="wrapper">
            <a class="popupA" href="#" class="close">&times;</a>
            <div class="column details">
                <div class="signupDiv" id="inscription">
                  <form class="signup" method="post">
                    <h1 class="popupH1">Ajouter  Catégorie</h1>
                    <input class="popupINPUT" type="text" name="libelle"  placeholder="libelle ">
                    <button class="form-submit" name="submit">Ajouter</button>
                  </form>
                </div>
            </div>

            <div class="column content">
                <div class="signup">
                    <h1 class="popupH1">Bonjour!</h1>
                    <p class="popupP">Vous pouvez ajouter des catégories à partir de ce formulaire</p>
                </div>
            </div>
    </div>

</body>
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 