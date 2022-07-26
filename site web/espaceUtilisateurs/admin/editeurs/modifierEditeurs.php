<?php
$bdd = new PDO('mysql:host=localhost;dbname=mglsi_news;', 'root');
if(isset($_GET['id']) AND !empty($_GET['id'])){
	$getid = $_GET['id'];
    $recupArticle = $bdd->prepare('SELECT * FROM Utilisateurs WHERE id = ?');
   $recupArticle->execute(array($getid));
   if($recupArticle->rowCount() > 0){
   	  $articleInfos = $recupArticle->fetch();
      $id = $articleInfos['id'];
      $username = str_replace('<br />', '', $articleInfos['username']);
      
      if(isset($_POST['valider'])){  
       $id_saisi = htmlspecialchars($_POST['id']);
       $username_saisi = nl2br(htmlspecialchars($_POST['username']));

       $updateArticle = $bdd->prepare('UPDATE Utilisateurs SET id = ?, username = ? WHERE id = ?');
       $updateArticle->execute(array($id_saisi, $username_saisi, $getid));

         header('Location: listerEditeurs.php');
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
        
                    <li>
                        <a class="firstA" href="../editeurs/ajouterEditeur.php">Editeurs</a>
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
                    <h1 class="popupH1">Modifier l'éditeur</h1>
                    <input class="popupINPUT" type="name" name="id" value="<?= $id;?>">
                    <textarea name="username"  cols="30" rows="3"><?= $username;?></textarea> <br/>
                    <button class="form-submit" name="valider">Modifier</button>
                  </form>
                </div>
            </div>

            <div class="column content">
                <div class="signup">
                    <h1 class="popupH1">Bonjour!</h1>
                    <p class="popupP">Vous pouvez modifier les informations sur l'éditeur à partir de ce formulaire</p>
                </div>
            </div>
    </div>

</body>