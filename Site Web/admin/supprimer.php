<?php 
   session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root');
 if (isset($_GET['id']) AND !empty($_GET['id'])) {
 	$getid = $_GET['id'];
    $recupUser = $bdd->prepare('SELECT * FROM membres WhERE id = ?');
    $recupUser->execute(array($getid));
    if($recupUser->rowCount() > 0) {

    $banirUser = $bdd->prepare('DELETE FROM membres WhERE id = ?');
    $banirUser->execute(array($getid));	

    header('Location: visiteurs.php');
    }else{
    	echo "aucun membre n'a été trouvé ";
    }
 }else{
 	echo "L'identifiant n'a pas été récupéré";
 }
?>