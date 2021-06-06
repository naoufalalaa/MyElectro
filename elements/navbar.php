<?php
if(isset($_SESSION['id'])){
$userinfo=$bdd->query('SELECT * FROM membre WHERE id='.$_SESSION['id']);
$user=$userinfo->fetch();}
?><?php
if($page=='Home'){
?>
<div class="uk-position-relative" style="z-index:1">

<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="ratio:7:3;autoplay:true">

    <ul class="uk-slideshow-items">
        <li>
            <img src="assets/img/main.jpg" alt="" uk-cover>
        </li>
        <li>
            <img src="assets/img/main2.jpg" alt="" uk-cover>
        </li>
        <li>
            <img src="assets/img/main1.jpg" alt="" uk-cover>
        </li>
    </ul>

    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

</div>
<?php }?>
    <div class="uk-position-top">
        <nav class="uk-navbar-container uk-navbar-transparent uk-visible@l" uk-navbar="mode: click">
        <svg style="z-index:0;position:absolute; <?php 
if($page=='Home'){?>
    top:-20px ;<?php }?> left:0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill=" <?php 
if($page=='Home'){?>#fff<?php }else{echo"#F8F8F8";}?>" fill-opacity="0.9" d="M0,96L80,101.3C160,107,320,117,480,112C640,107,800,85,960,101.3C1120,117,1280,171,1360,197.3L1440,224L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path></svg>
            <div class="uk-navbar-center">
                <img src="assets/img/logo.png" width="120px" alt="">
            </div>
            <div class="uk-navbar-left" style="z-index:100">

                <ul class="uk-navbar-nav">
                    <li><a href="index.php"><i class="fas fa-home"></i>&nbsp;&nbsp;Acceuil</a></li>
                    <li>
                        <a href="#"><i class="fas fa-mobile"></i>&nbsp;&nbsp;Appareils</a>
                        <div class="uk-navbar-dropdown" uk-dropdown="offset: 0;mode:click">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li><a href="store.php?cat=Telephone"><i class="fas fa-mobile-alt"></i>&nbsp;&nbsp;SmartPhone</a></li>
                                <li><a href="store.php?cat=tablette"><i class="fas fa-tablet-alt"></i>&nbsp;&nbsp;Tablette</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="store.php?cat=ordinateur"><i class="fas fa-desktop"></i>&nbsp;&nbsp;Ordinateur</a></li>
                    <li><a href="store.php?cat=accessoire"><i class="fas fa-keyboard"></i>&nbsp;&nbsp;Accessoire</a></li>
                </ul>

            </div>

            <div class="uk-navbar-right"  style="z-index:100">

                <ul class="uk-navbar-nav">
    <?php 
    if(empty($_SESSION['id'])){?>
                    <li><a href="connect.php"><i class="fas fa-user-circle"></i>&nbsp;&nbsp;Se connecter</a></li>
                    
                    <li><a href="sign.php"><i class="fas fa-sign-in-alt"></i>&nbsp;&nbsp;S'inscrire</a></li>
    <?php }elseif(isset($_SESSION['statut'])){?>
                    <li>
                        <a href="#"><img src="assets/avatar/<?=$user['id'] ?>.jpg" style="border-radius: 50%;width:40px">
                        &nbsp;&nbsp;<?=$user['nom'] ?> <?=$user['prenom'] ?>&nbsp;&nbsp;<i class="fas fa-angle-down"></i></a>
                        <div class="uk-navbar-dropdown" uk-dropdown="offset: 0;mode:click">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li><a href="<?php
                                if($_SESSION['statut']==='membre'){?>profil.php?id=<?=$_SESSION['id'] ?><?php }else{?>admin/profil.php?id=<?=$_SESSION['id'] ?>
                                    <?php }?>"><i class="fas fa-user-circle"></i>&nbsp;&nbsp;My profile</a></li>
                                <?php
                                if($_SESSION['statut']==='membre'){?>
                                <li><a href="panier.php"><i class="fas fa-shopping-basket"></i>&nbsp;&nbsp;Mon Panier</a></li>
                                <?php }?>
                                <li><a href="controllers/deconnexion.php"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Déconnexion</a></li>
                            </ul>
                        </div>
                    </li>
    <?php }?>
                </ul>

            </div>

        </nav>
</div>
        <nav class="uk-navbar uk-navbar-transparent uk-navbar-container uk-hidden@l">
            <svg style="z-index:0;position:absolute; top:0px ; left:0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f3f4f5" fill-opacity="1" d="M0,96L80,101.3C160,107,320,117,480,112C640,107,800,85,960,101.3C1120,117,1280,171,1360,197.3L1440,224L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path></svg>

            <div class="uk-navbar-left" style="z-index:1;">
                <a class="uk-navbar-toggle"  uk-toggle="target: #offcanvas-nav-primary" href="#">
                    <span uk-navbar-toggle-icon></span> <span class="uk-margin-small-left">Menu</span>
                </a>
            </div>
            <div class="uk-navbar-right" style="z-index:1;">
            <img src="assets/img/logo.png" width="100px" alt="">
            </div>
        </nav>


<div id="offcanvas-nav-primary" uk-offcanvas="overlay: true">
    <div class="uk-offcanvas-bar uk-flex uk-flex-column">
    <img src="assets/img/logo.png" width="250px" alt="">
        <ul class="uk-nav uk-nav-default">
            <li><a href="index.php"><i class="fas fa-home"></i>&nbsp;&nbsp;Acceuil</a></li>
            <li class="uk-parent">
                <a href="#"><i class="fas fa-mobile"></i>&nbsp;&nbsp;Appareils</a>
                <ul class="uk-nav-sub">
                    <li><a href="store.php?cat=Telephone"><i class="fas fa-mobile-alt"></i>&nbsp;&nbsp;SmartPhone</a></li>
                    <li><a href="store.php?cat=tablette"><i class="fas fa-tablet-alt"></i>&nbsp;&nbsp;Tablette</a></li>
                </ul>
            </li>
            <li><a href="store.php?cat=ordinateur"><i class="fas fa-desktop"></i>&nbsp;&nbsp;Ordinateur</a></li>
            <li><a href="store.php?cat=accessoire"><i class="fas fa-keyboard"></i>&nbsp;&nbsp;Accessoire</a></li>
            <li><a href="contact.php"><i class="fas fa-envelope"></i>&nbsp;&nbsp;contact</a></li>
            
            <li class="uk-nav-divider"></li>
            <?php
            if(empty($_SESSION['id'])){?>
                    <li><a href="connect.php"><i class="fas fa-user-circle"></i>&nbsp;&nbsp;Se connecter</a></li>
                    
                    <li><a href="sign.php"><i class="fas fa-sign-in-alt"></i>&nbsp;&nbsp;S'inscrire</a></li>
            <?php }elseif(isset($_SESSION['statut'])){?>
                <li>
                        <a href="#">
                        <img src="assets/avatar/<?=$user['id'] ?>.jpg" style="border-radius: 50%;width:40px">
                        <?=$user['nom'] ?> <?=$user['prenom'] ?>&nbsp;&nbsp;<i class="fas fa-angle-down"></i></a>
                        <ul class="uk-nav-sub">
                            <li><a href="<?php
                                if($_SESSION['statut']==='membre'){?>profil.php?id=<?=$_SESSION['id'] ?><?php }else{?>admin/profil.php?id=<?=$_SESSION['id'] ?>
                                    <?php }?>"><i class="fas fa-user-circle"></i>&nbsp;&nbsp;My profile</a></li>
                                <?php
                                if($_SESSION['statut']==='membre'){?>
                                <li><a href="panier.php"><i class="fas fa-shopping-basket"></i>&nbsp;&nbsp;Panier</a></li>
                                <?php }?>
                                <li><a href="controllers/deconnexion.php"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Déconnexion</a></li>
                        </ul>
                    
                        </li>
            <?php }?>   
        </ul>

    </div>
</div>
    </div>
    </div>
