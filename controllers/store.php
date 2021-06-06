<?php
include 'connector.php';

if(isset($_GET['cat'])){
$produits=$bdd->prepare('SELECT * FROM articles WHERE categorie= ? ORDER BY date_ajout desc');
$produits->execute(array($_GET['cat']));
}else{
$produits=$bdd->query('SELECT * FROM articles ORDER BY date_ajout desc');
}
$nbra=$produits->rowCount();

?>