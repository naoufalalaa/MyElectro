<?php
include 'controllers/store.php';
$page='Store '.ucfirst($_GET['cat']);
include 'elements/head.php';
include 'elements/navbar.php';
?>
<div style="margin-top:100px;z-index:999">
<ul class="uk-breadcrumb uk-padding" style="margin-bottom: -50px;margin-top: -20px;">
    <li><a href="index.php">Home</a></li>
    <li><a href="Store.php">Store</a></li>
    <li><span><?=ucfirst($_GET['cat']) ?></span></li>
</ul>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f3f4f5" fill-opacity="1" d="M0,224L120,202.7C240,181,480,139,720,133.3C960,128,1200,160,1320,176L1440,192L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>

<div style="background-color:#f3f4f5" align="center">
<div class="uk-width-4-5">
<h2 align="center"><?=ucfirst($_GET['cat']) ?></h2>
<hr>
<?php if($nbra==0){?>
    <img src="assets/img/closed.png uk-width-1-3@l uk-width-1-2@m" alt="closed">
    <?php }?>
    <?php if($nbra>0){?>
    <div class="uk-grid-column-small uk-grid-row-large uk-child-width-1-3@m uk-child-width-1-2@s uk-text-center uk-grid-match" uk-parallax="y:50px" uk-grid>
    <?php 
    $i=1;
    while($prod=$produits->fetch()){
        $i++;
        $id=$prod['id'];
    ?>

        <div>
            <div class="uk-margin uk-card uk-card-default">
                <div class=" uk-card-media-top"style="overflow:hidden;height:300px">
                    <img src="assets/articles/<?=$prod['id'] ?>.jpg" alt="">
                </div>
                <div class="uk-card-body">
                    <h3 class="uk-card-title"><?=$prod['titre'] ?></h3>
                    <a class="uk-button uk-button-secondary uk-margin-small-bottom uk-margin-small-right" href="article.php?id=<?=$prod['id']?>">Consulter l'article</a>
                    <button class="uk-button uk-button-default uk-margin-small-right" type="button" uk-toggle="target: #modal-example">Commander</button>
                            <div id="modal-example" uk-modal>
                                <div class="uk-modal-dialog uk-modal-body">
                                    <h2 class="uk-modal-title"><?=$prod['titre'] ?></h2>
                                    <p><?=$prod['description'] ?>.</p>
                                    
                                        <form method="post">
                                            <input type="number" placeholder="Quantité" name="quantity<?=$id ?>" class="form-control" min="1" max="11" required>
                                            
                                            <div class="uk-modal-footer uk-text-right">
                                                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                                                <button class="btn btn-warning" name="add<?=$id ?>" type="submit">Add to card</button>
                                            </form>
                                            <?php
                                            $quantity='quantity'.$id;
                                            $op='add'.$id;
                                                if(isset($_POST[$op]) AND !empty($_POST[$quantity])){
                                                    $rowexist=$bdd->prepare('SELECT * FROM panier WHERE id_user=? AND commande=0 AND id_prod=?');
                                                    $rowexist->execute(array($_SESSION['id'],$id));
                                                    $quanty=$rowexist->fetch();
                                                    $count=$rowexist->rowCount();
                                                    $prix=$prod['price']*$_POST[$quantity];
                                                    if($count>0){
                                                        $select=$bdd->prepare('SELECT * FROM panier WHERE id_prod=? AND id_user=?');
                                                        $select->execute(array($prod['id_prod'],$_SESSION['id']));
                                                        $new=$select->fetch();
                                                        $quante=$new['quantity'];
                                                        $quant=$quante+$_POST[$quantity];
                                                        $prix=$prix+$new['prix'];
                                                        $update=$bdd->prepare('UPDATE panier SET quantity=?, prix=? WHERE id_prod=? AND id_user=?');
                                                        $update->execute(array($quant,$prix,$id,$_SESSION['id']));
                                                    }else{
                                                    $insert=$bdd->prepare('INSERT INTO panier (id_prod ,id_user ,quantity, prix ,date_ajout) VALUES (?,?,?,?,NOW())');
                                                    $insert->execute(array($id,$_SESSION['id'],$_POST[$quantity],$prix));
                                                }
                                                $message='<div class="alert alert-success" role="alert">
                                                <h4 class="alert-heading">Ajouté!</h4>
                                                <p>L\'article <strong>'.$prod['titre'].'</strong> a été ajouté.</p>
                                                <hr>
                                                <p class="mb-0">Merci de verifier votre Pannier.</p>
                                              </div>';
                                            }
                                            ?>                                    
                                </div>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    <?php }?>
</div>
    <?php }?>
    </div></div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f3f4f5" fill-opacity="1" d="M0,192L120,170.7C240,149,480,107,720,85.3C960,64,1200,64,1320,64L1440,64L1440,0L1320,0C1200,0,960,0,720,0C480,0,240,0,120,0L0,0Z"></path></svg>
        </div>
<?php
include 'elements/footer.php';
?>