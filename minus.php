<?php
session_start();
if(empty($_SESSION['id'])){
   header('Location: index.php');
 }
 else{
$bdd = new PDO("mysql:host=127.0.0.1;dbname=myelectropro;charset=utf8", "root", "");
if(isset($_GET['id_prod']) AND !empty($_GET['id_prod']) AND isset($_GET['id_pannier'])) {
   $addid = htmlspecialchars($_GET['id_prod']);
   $id=$_SESSION['id'];
    $select=$bdd->prepare('SELECT * FROM panier WHERE id_pannier=? AND id_prod=? ');
    $select->execute(array($_GET['id_pannier'],$addid));
    $new=$select->fetch();
    $quant=$new['quantity'];
    $produit=$bdd->prepare('SELECT * FROM articles WHERE id=?');
    $produit->execute(array($addid));
    $prod=$produit->fetch();
    $new1=$quant-1;
    if($new1<1){
        $suppr = $bdd->prepare('DELETE FROM panier WHERE id_pannier = ?');
        $suppr->execute(array($_GET['id_pannier']));
    }
    $price=$prod['price']*$new1;
   $add = $bdd->prepare('UPDATE panier SET quantity=?, prix=? WHERE id_pannier=? AND id_prod = ? AND id_user=?');
   $add->execute(array($new1,$price,$_GET['id_pannier'],$addid,$id));
}
header('location: panier.php');
}
?>