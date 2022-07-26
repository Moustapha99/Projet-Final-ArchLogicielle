<?php
session_start();
include '../../../includes/footer.php';

$bdd = new PDO('mysql:host=localhost;dbname=mglsi_news;', 'root');
if(isset($_GET['id']) AND !empty($_GET['id'])){
	$getid = $_GET['id'];
    $recupArticle = $bdd->prepare('SELECT * FROM Article WHERE id = ?');
    $recupArticle->execute(array($getid));
   if($recupArticle->rowCount() > 0){
   	  $articleInfos = $recupArticle->fetch();
      $titre = $articleInfos['titre'];
      $contenu = str_replace('<br />', '', $articleInfos['contenu']);
      
      if(isset($_POST['valider'])){  
       $titre_saisi = htmlspecialchars($_POST['titre']);
       $contenu_saisi = nl2br(htmlspecialchars($_POST['contenu']));

       $updateArticle = $bdd->prepare('UPDATE Article SET titre = ?, contenu = ? WHERE id = ?');
       $updateArticle->execute(array($titre_saisi, $contenu_saisi, $getid));

         header('Location: ../listeArticles.php');
         echo"<script>alert('Article modifié');</script>";
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
                    <h1 class="popupH1">Modifier l'article</h1>
                    <input class="popupINPUT" type="name" name="titre" value="<?= $titre;?>">
                    <textarea name="contenu"  cols="50" rows="10"><?= $contenu;?></textarea>
                    <button class="form-submit" name="valider">Modifier</button>
                  </form>
                </div>
            </div>

            <div class="column content">
                <div class="signup">
                    <h1 class="popupH1">Bonjour!</h1>
                    <p class="popupP">Vous pouvez modifier l'artcile à partir de ce formulaire</p>
                </div>
            </div>
    </div>

</body>