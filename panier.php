<?php
include 'controllers/panier.php';
$page="panier";
include 'elements/head.php';
include 'elements/navbar.php';
?>
<div style="margin-top:100px" align="center">
<h3 align="center">Panier de <em><?=$user['prenom'] ?> <?=$user['nom'] ?></em></h3>
<hr>

<?php
$total=0;
$i=1;
$pannier=$bdd->query('SELECT * FROM panier WHERE id_user='.$_SESSION['id'].' AND commande=0 ORDER BY date_ajout');
while ($p=$pannier->fetch()) {
    $produit=$bdd->query('SELECT * FROM articles WHERE id='.$p['id_prod']);
    $prod=$produit->fetch();
    $total=$total+$p['prix']; 
    $i++;
?>
<div class="uk-width-2-3@m uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
    <div class="uk-card-media-left uk-cover-container">
        <img src="assets/articles/<?=$p['id_prod'] ?>.jpg" alt="" uk-cover>
        <canvas width="600" height="400"></canvas>
    </div>
    <div>
        <div class="uk-card-body">
            <h3 class="uk-card-title"><a href="article.php?id=<?=$prod['id']?>"><?=$prod['titre'] ?></a></h3>
            <p><?=$prod['contenu'] ?>.</p>
            <a href="minus.php?id_prod=<?=$prod['id'] ?>&id_pannier=<?=$p['id_pannier'] ?>" style='font-size:2rem;color: red;padding:10px'><i class="fas fa-minus-square"></i></a><input style="display:block" type="text" value="<?=$p['quantity'] ?>" disabled style='background-color:#F3F4F5 ;border-radius:10px;padding:10px; border:0'><a href="add.php?id_prod=<?=$prod['id'] ?>&id_pannier=<?=$p['id_pannier'] ?>" style='font-size:2rem;color: green;padding:10px'><i class="fas fa-plus-square"></i></a>
            <p>Prix Total produits: <em><?=$p['prix'] ?></em> dhs</p>
        </div>
    </div>
</div>

<?php }?>
</div>
<?php

?>
<a style="right:12px;position:fixed;bottom:12px;z-index:99999" class="btn btn-success uk-margin-right" href="commander.php?nrowsp=<?=$i ?>"><strong><?=$total ?></strong> <i class="fas fa-credit-card"></i></a>
<?php
include 'elements/footer.php';
?>