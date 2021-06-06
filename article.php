<?php
include_once 'controllers/connector.php';
$page='Article';
include 'elements/head.php';
include 'elements/navbar.php';
if(isset($_GET['id']) AND !empty($_GET['id'])) {
   $get_id = htmlspecialchars($_GET['id']);
   $article = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
   $article->execute(array($get_id));
   if($article->rowCount() == 1) {
      $article = $article->fetch();
      $titre = $article['titre'];    
      $price = $article['price'];
      $description = $article['description'];
      $contenu = $article['contenu'];
   } else {
      die('Cet article n\'existe pas !');
   }
} else {
   die('Erreur');
}
if(isset($_POST['commander'])){
    $insert=$bdd->prepare('INSERT INTO commande ( prod,nom,prenom,email,adresse,quantity,date_commande ) VALUES ( ?,?,?,?,?,?,NOW() )');
    $insert->execute(array($_GET['id'],$_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['adresse'],$_POST['quantity']));
    $message='<div class="alert alert-primary" role="alert">
    Merci de nous avoir fait confiance. Votre commande est validé.
  </div>';
}
$produits=$bdd->query('SELECT * FROM articles  ORDER BY id desc limit 5');
$nbra=$produits->rowCount();

?>

</div>
<div align="center" style="margin-top:200px;">

<div class="uk-child-width-expand@m uk-width-5-6@m"  uk-grid>

<div class="uk-width-3-4@m">
        <div class="uk-card uk-card-default uk-width-3-4@m">
            <div class="uk-card-media-top">
            <div uk-slideshow="ratio:1:1">
            <div uk-lightbox>
    <ul class="uk-slideshow-items">
    <?php
    $filename='assets/articles/'.$_GET['id'].'.jpg';
    if(file_exists($filename)){?>
        <li>
            <a href="assets/articles/<?=$_GET['id'] ?>.jpg"><img src="assets/articles/<?=$_GET['id'] ?>.jpg" alt="" uk-cover>
            </a>
        </li>
    <?php }?>
    <?php
    $i=1;
    while($i<=3){
    $filename='assets/articles/'.$_GET['id'].'p'.$i.'.jpg';
    if(file_exists($filename)){?>
        <li>
            <a href="assets/articles/<?=$_GET['id'] ?>p<?=$i?>.jpg"><img src="assets/articles/<?=$_GET['id'] ?>p<?=$i?>.jpg" alt="" uk-cover>
            </a>
        </li>
    <?php }$i++;}?>
    </ul>
    
</div>
            
            </div>
            </div>
            <div class="uk-card-body" align="left">
                <h3 class="uk-card-title"><?=$titre?></h3>
                <small><?=$description?>.</small>
                <p><?=$contenu?>.</p>
                <?php 
                if(empty($_SESSION['id'])){?>
                <a class="uk-button uk-button-secondary" href="#modal-sections" uk-toggle><i class="fas fa-shopping-cart"></i> Commader <em><?=$price?> dhs</em></a>
                <?php }else{?>
                <a class="uk-button uk-button-default" href="ajouterpanier.php?id=<?=$_GET['id'] ?>"><i class="fas fa-shopping-basket"></i> Ajouter au panier </a>
                <?php }?>
    <div id="modal-sections" uk-modal>

            <div class="uk-modal-dialog">

                <button class="uk-modal-close-default" type="button" uk-close></button>
        <form class="needs-validation" method="post" novalidate>
                <div class="uk-modal-header">
                    <h2 class="uk-modal-title"><?=$titre?> : <?=$article['categorie'] ?></h2>
                </div>
                <div class="uk-modal-body">
                    <p><?=$description?>.</p>
                    <hr>
                    <div class="form-row">
            <div class="col-md-6 mb-3">
            <input type="text" class="form-control" name="prenom" placeholder="Prénom" id="validationCustom01" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            </div>
            <div class="col-md-6 mb-3">
            <input type="text" class="form-control"  name="nom" placeholder="Nom" id="validationCustom02" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
            <input type="email" class="form-control" name="email" placeholder="E-mail" id="validationCustom03" required>
            <div class="invalid-feedback">
                Please provide a valid city.
            </div>
            </div>
            <div class="col-md-6 mb-3">
            <input type="text" class="form-control" name="adresse" placeholder="Adresse" id="validationCustom03" required>
            <div class="invalid-feedback">
                Please provide a valid city.
            </div>
            </div>
            
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
            <input type="number" class="form-control" name="quantity" placeholder="Quantité" id="validationCustom03" required>
            <div class="invalid-feedback">
                Please provide a valid city.
            </div>
            </div>
            
            
        </div>
        <div class="form-group">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
            <label class="form-check-label" for="invalidCheck">
                Agree to terms and conditions
            </label>
            <div class="invalid-feedback">
                You must agree before submitting.
            </div>
            </div>
        </div>
        



                </div>
                <div class="uk-modal-footer uk-text-right">
                    <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                    <input class="uk-button uk-button-primary" name="commander" value="Passer la commande" type="submit">
                </div>
            </div>
        </div>
                    </div>
                </div>
            </div>
            </form>
<div class="uk-width-1-4@m uk-width-1-3@s uk-width-1-2" align="left">
<h5>Les articles récents</h5>
<hr class="uk-divider-small">
        <div>
        <?php
        while($prod=$produits->fetch()){
        ?>
            <div class="uk-card uk-card-default uk-margin">
                <div class="uk-card-media-top">
                    <a href="article.php?id=<?=$prod['id'] ?>">
                        <img src="assets/articles/<?=$prod['id'] ?>.jpg" alt="">
                    </a>
                </div>
                <div class="uk-card-body">
                <a href="article.php?id=<?=$prod['id'] ?>">
                    <h6><?=$prod['titre'] ?></h6>
                </a>
                    <small><?=$prod['price'] ?> Dh</small>
                </div>
            </div>
        <?php }?>
        </div>
    </div>
    </div>
                
</div>


<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
   
    
<?php
include 'elements/footer.php';
?>
