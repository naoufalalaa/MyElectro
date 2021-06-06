<?php
include 'controllers/connector.php';
if(isset($_SESSION['id'])){
    if(isset($_GET['id'])){
        $getid=$_GET['id'];
        $pp=$bdd->query('SELECT * FROM articles WHERE id='.$_GET['id']);
        $pr=$pp->fetch();
        $prix=$pr['price'];
        $exist=$bdd->prepare("SELECT * FROM panier WHERE id_prod=? AND id_user=?");
        $exist->execute(array($_GET['id'],$_SESSION['id']));
        $ee=$exist->rowCount();
        if($ee==0){
            $q=1;
        $add=$bdd->prepare('INSERT INTO panier (id_prod,id_user,quantity,prix,date_ajout) VALUES (?,?,?,?,NOW())');
        $add->execute(array($_GET['id'],$_SESSION['id'],$q,$prix));}
        else{
            $pro=$exist->fetch();
            $quantity=$pro['quantity']+1;
            $update=$bdd->prepare('UPDATE panier SET quantity=? WHERE id-prod=? AND id_user=?');
            $update->execute(array($quantity, $getid, $_SESSION['id']));
        }
        header('location: article.php?id='.$getid);
    }else{
        die();
    }
}else{
    header('location: connect.php');
}
?>