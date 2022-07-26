<?php
    error_reporting(0);
    session_start();
include '../../../includes/footer.php';
include '../../../connexion.php';


    // if (isset($_SESSION['username'])) {
    //     header("Location: signin.php");
    // }

    if (isset($_POST['submit']) && isset($_POST['titre']) && isset($_POST['contenu'])) {
        $titre = $_POST['titre'];
        $contenu = md5($_POST['contenu']);

        
            $sql = "insert into Article (titre,contenu,categorie) values ('$titre', '$contenu')";
            $result = mysqli_query($conn, $sql);
            if (!$result->num_rows > 0) {
                $sql = "INSERT INTO Article (titre, contenu)
                        VALUES ('$titre', '$contenu')";
                $result = mysqli_query($conn, $sql);
            } else {
                echo "<script>alert('Woops! Email Already Exists.')</script>";
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
                        <a class="firstA" href="../categorie/ajouterCategorie.php">Catégorie</a>
                    </li>
                    <li>
                        <a class="firstA" href="publierArticle.php">Article</a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a id="secondA" href="../../../logout.php">Déconnexion</a>
                    </li> 
                </ul>
        </nav>
    </header>  



    <div class="wrapperArticle">
            <a class="popupA" href="#" class="close">&times;</a>
            <div class="column details">
                <div class="signupDiv" id="inscription">
                  <form class="signup" method="post">
                    <h1 class="popupH1">Publier un Article</h1>
                    <input class="popupINPUT" type="name" name="titre" placeholder="Titre de l'article">
                    <textarea name="contenu" cols="50" rows="10" placeholder="Contenu de l'article"></textarea>
                    <button class="form-submit" name="submit">Ajouter</button>
                  </form>
                </div>
            </div>

            <div class="column content">
                <div class="signup">
                    <h1 class="popupH1">Bonjour!</h1>
                    <p class="popupP">Vous pouvez publier des articles à partir de ce formulaire</p>
                </div>
            </div>
    </div>

</body>
