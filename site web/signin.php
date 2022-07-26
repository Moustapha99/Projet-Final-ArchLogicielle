<?php
    session_start();
    error_reporting(0);
include("connexion.php");
include("functions.php");
include 'includes/header.php';
include 'includes/footer.php';


// if (isset($_SESSION['username'])) {
//     header("Location: espaceUtilisateur.php");
// }


// if (isset($_POST['submit'])) {
// 	$username = $_POST['username'];
// 	$password = md5($_POST['password']);

// 	$sql = "SELECT * FROM Utilisateurs WHERE username='$username' AND password='$password'";
// 	$result = mysqli_query($conn, $sql);
// 	if ($result->num_rows > 0) {
// 		$row = mysqli_fetch_assoc($result);
// 		$_SESSION['username'] = $row['username'];
// 		header("Location: espaceUtilisateurs/admin/espaceAdmin.php");
// 	} else {
// 		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
// 	}
// }

if(isset($_POST['submit'])){
	if (!empty($_POST['username']) AND !empty($_POST['password'])) {
		$username_par_defaut = "admin";
		$password_par_defaut ="passer";

		$username_saisi = htmlspecialchars($_POST['username']);
		$password_saisi = htmlspecialchars($_POST['password']);

		if ($username_saisi == $username_par_defaut) {
			$_SESSION['password'] = $password_saisi;
			header('Location: espaceUtilisateurs/admin/espaceAdmin.php');

		}else if($username_saisi != $username_par_defaut) {
			$_SESSION['password'] = $password_saisi;
			header('Location: espaceUtilisateurs/editeurs/espaceEditeurs.php');

		}else{
			echo "votre mot de passe est incorrect";
		}
	}else{
		echo "veuillez completer tous les champs";
	}
}
?>
    
        <div class="wrapper">
            <a class="popupA" href="#" class="close">&times;</a>
            <div class="column details">
                 <div class="signinDiv">
                    <form class="signin" method="post">
                        <h1 class="popupH1">Se Connnecter</h1>
                        <input class="popupINPUT" type="name" name="username" placeholder="Nom d'utilisateur">
                        <input class="popupINPUT" type="password" name="password" placeholder="Mot de passe">
                        <a class="popupA" href="mdpOublie.php">Mot de passe oublié?</a>
                        <button class="form-submit" name="submit">Se connecter</button>
                        <span>Vous n'avez pas de compte?<a href="signup.php" id="signup">Créer un compte</a></span>
                    </form>
                </div>
            </div>

            <div class="column content">
                <div class="signin">
                <h1 class="popupH1">Bienvenue</h1>
                <p class="popupP">Restez connecté avec nous pour plus d'informations! </p>
                </div>
            </div>
        </div>
