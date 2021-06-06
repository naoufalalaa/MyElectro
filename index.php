<?php 
include_once 'controllers/connector.php';
$page='Home';
include 'elements/head.php';
include 'elements/navbar.php';
$produits=$bdd->query('SELECT * FROM articles ORDER BY id desc');
$nbra=$produits->rowCount();
?>
<div class=" uk-card-body" align="center">
    <h1>Nos Produits</h1>
    <hr class="uk-divider-icon">
    <div class="uk-child-width-expand@m uk-text-center" uk-parallax="y:150px" uk-grid>
        <div>
            <div class="uk-padding uk-card uk-card-default">
                <div class="uk-padding uk-card-media-top">
                    <img src="assets/img/iphone.png" alt="">
                </div>
                <div class="uk-card-body">
                    <h3 class="uk-card-title">SmartPhone</h3>
                    <a class="uk-button uk-button-secondary uk-box-shadow-hover-xlarge" style="background-color:#535353" href="store.php?cat=Telephone">Discover</a>
                </div>
            </div>
        </div>
        <div>
            <div class="uk-padding uk-card uk-card-default">
                <div class="uk-padding uk-card-media-top">
                    <img src="assets/img/ipad.png" alt="">
                </div>
                <div class="uk-card-body">
                    <h3 class="uk-card-title">Tablette</h3>
                    <a class="uk-button uk-button-secondary uk-box-shadow-hover-xlarge" style="background-color:#535353" href="store.php?cat=tablette">Discover</a>
                </div>
            </div>
        </div>
        <div>
            <div class="uk-padding uk-card uk-card-default">
                <div class="uk-padding uk-card-media-top">
                    <img src="assets/img/imac.png" alt="">
                </div>
                <div class="uk-card-body">
                    <h3 class="uk-card-title">Ordinateur</h3>
                    <a class="uk-button uk-button-secondary uk-box-shadow-hover-xlarge" style="background-color:#535353" href="store.php?cat=ordinateur">Discover</a>
                </div>
            </div>
        </div>
        <div>
            <div class="uk-padding uk-card uk-card-default">
                <div class="uk-padding uk-card-media-top">
                    <img src="assets/img/airpods.png" alt="">
                </div>
                <div class="uk-card-body">
                    <h3 class="uk-card-title">Accessoire</h3>
                    <a class="uk-button uk-button-secondary uk-box-shadow-hover-xlarge" style="background-color:#535353" href="store.php?cat=accessoire">Discover</a>
                </div>
            </div>
        </div>
    </div>
</div>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f3f4f5" fill-opacity="1" d="M0,192L120,197.3C240,203,480,213,720,186.7C960,160,1200,96,1320,64L1440,32L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>
<div class=" uk-card-body" style="background-color:#F3F4F5" align="center">
    <h1>Last Products</h1>
    <hr class="uk-divider-icon">
    <?php if($nbra==0){?>
    <img src="assets/img/closed.png" class="uk-width-1-3@l uk-width-1-2@m" alt="closed">
    <?php }?>
    <?php if($nbra>0){?>
    <div class="uk-child-width-1-4@l uk-grid-match uk-child-width-1-3@m uk-child-width-1-2@s uk-text-center" uk-parallax="y:50px" uk-grid>
    <?php 
    $i=1;
    while($prod=$produits->fetch()){
        $i++;
    ?>
        <div>
            <div class=" uk-card uk-card-default">
                <div class=" uk-card-media-top" style="overflow:hidden;height:300px">
                <a href="article.php?id=<?=$prod['id'] ?>">
                    <img src="assets/articles/<?=$prod['id'] ?>.jpg" alt="">
                </a>
                </div>
                <div class="uk-card-body">
                    <h3 class="uk-card-title"><a href="article.php?id=<?=$prod['id'] ?>"><?=$prod['titre'] ?></a></h3>
                    <a class="uk-button uk-button-secondary uk-box-shadow-hover-xlarge" style="background-color:#535353" href="article.php?id=<?= $prod['id'] ?>"><strong>ACHETER</strong> <?=$prod['price'] ?> <i class="fas fa-wallet"></i></a>
                </div>
            </div>
        </div>


      
    <?php }?>
</div>
    <?php }?>
</div>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f3f4f5" fill-opacity="1" d="M0,192L120,197.3C240,203,480,213,720,186.7C960,160,1200,96,1320,64L1440,32L1440,0L1320,0C1200,0,960,0,720,0C480,0,240,0,120,0L0,0Z"></path></svg>
<?php
include 'elements/footer.php';
?>
