<?php
session_start();
if(empty($_SESSION['id']) OR isset($_SESSION['cat'])){
    header('location: connect.php');
}
else{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=myelectropro', 'root', '');
        $pannier=$bdd->prepare('SELECT * FROM panier WHERE id_user=? AND commande=0');
        $pannier->execute(array($_SESSION['id']));
        while($pan=$pannier->fetch()){
        $num=$pan['id_pannier'];
        $isert=$bdd->prepare('INSERT INTO commandes (id_panier,id_user,montant,date_commande) VALUES (?,?,?,NOW())');
        $isert->execute(array($num,$_SESSION['id'],$pan['prix']));
        $update=$bdd->prepare('UPDATE panier SET commande=1 WHERE id_pannier=?');
        $update->execute(array($pan['id_pannier']));
        }
        header('location: panier.php');
  

}
?>