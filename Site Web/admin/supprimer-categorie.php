 <?php 
$bdd = new PDO('mysql:host=localhost;dbname=mglsi_news;', 'root');
if(isset($_GET['id']) AND !empty($_GET['id'])){
  $getid = $_GET['id'];
  $recupArticle = $bdd->prepare('SELECT * FROM categorie WHERE id = ?');
  $recupArticle->execute(array($getid));
  if($recupArticle->rowCount() > 0){
    $deleteArticle = $bdd->prepare('DELETE FROM categorie WHERE id = ?');
    $deleteArticle->execute(array($getid));
    header('Location: categorie.php');
  }else{
  	echo "Aucune categorie trouvé";
  }
 }else{
 	echo "Aucun identifiant trouvé";
 }
 ?> 
