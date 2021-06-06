<?php
include 'controllers/connector.php';
if(empty($_SESSION['id'])){
    header('location: index.php');
}else{
$pannier=$bdd->prepare('SELECT * FROM panier WHERE id_user=?');
$pannier->execute(array($_SESSION['id']));
$nbr=$pannier->rowCount();
}
?>