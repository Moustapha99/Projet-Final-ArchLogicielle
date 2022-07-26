<?php
    error_reporting(0);
    session_start();

include("../../../connexion.php");
include '../../../includes/footer.php';


    // if (isset($_SESSION['username'])) {
    //     header("Location: signin.php");
    // }

    if (isset($_POST['submit']) && isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $cpassword = md5($_POST['cpassword']);

        if ($password == $cpassword) {
            $sql = "insert into Utilisateurs (username,password) values ('$username','$password')";
            $result = mysqli_query($conn, $sql);
            if (!$result->num_rows > 0) {
                $sql = "INSERT INTO users (username, email, password)
                        VALUES ('$username', '$email', '$password')";
                $result = mysqli_query($conn, $sql);
            } else {
                echo "<script>alert('Woops! Email Already Exists.')</script>";
            }
            
        } else {
            echo "<script>alert('Les mots de passe ne correspondent pas')</script>";
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



    <div class="wrapper">
            <a class="popupA" href="#" class="close">&times;</a>
            <div class="column details">
                <div class="signupDiv" id="inscription">
                  <form class="signup" method="post">
                    <h1 class="popupH1">Ajouter un éditeur</h1>
                    <input class="popupINPUT" type="name" name="username" placeholder="Nom d'utilisateur">
                    <input class="popupINPUT" type="password" name="password" id="confirm-password" placeholder="Mot de passe">
                    <input class="popupINPUT" type="password" name="cpassword" placeholder="Confirmez le mot de passe">
                    <p id=message></p>
                    <!-- onclick="checkPassword()" -->
                    <button class="form-submit" name="submit">Ajouter</button>
                  </form>
                </div>
            </div>

            <div class="column content">
                <div class="signup">
                    <h1 class="popupH1">Bonjour!</h1>
                    <p class="popupP">Vous pouvez lister les éditeurs en cliquant sur le bouton ci-dessous</p>
                   <a href="listerEditeurs.php"><button class="form-submitEdit" name="submit">Lister les éditeurs</button></a>
                </div>
            </div>
    </div>

</body>
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 