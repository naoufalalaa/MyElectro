<?php
include_once '../controllers/connector.php';
include 'controllers/redaction.php';
$page='Rédaction';
include 'elements/head.php';
include 'elements/navbar.php';
$produits=$bdd->query('SELECT * FROM articles');
$nbra=$produits->rowCount();
?>
<div align="center" class="container p-3 mb-2 bg-light text-dark" style="margin-top:20px">
<form class="needs-validation w-50" method="post"  enctype="multipart/form-data" novalidate>
<h1>ajouter un produit</h1>

  <div class="form-row">
    <div class="col-md-6 mb-3">
      <input name="titre" placeholder="Titre" type="text" class="form-control" id="validationCustom01" <?php if(isset($_POST['titre'])){?>value="<?=$_POST['titre']?>"<?php }?> required >
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <input name="description" placeholder="Description" type="text" class="form-control" id="validationCustom01" <?php if(isset($_POST['description'])){?>value="<?=$_POST['description']?>"<?php }?> required>
      <div class="valid-feedback">
        Looks good!
      </div>
  </div>
    </div>
  <div class="form-row">
    <div class="col-md-12 mb-3">
      <textarea name="contenu" class="form-control" id="validationCustom01"> <?php if(isset($_POST['contenu'])){?><?=$_POST['contenu']?><?php }else{echo 'Contenu';}?></textarea>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <input type="text" placeholder="Prix" name="price" class="form-control" id="validationCustom03" required>
      <div class="invalid-feedback">
        Please provide a valid price.
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <select name="categorie" class="custom-select" id="validationCustom04" required>
        <option selected disabled value="">Catégorie</option>
        <option value="telephone">Telephone</option>
        <option value="tablette">Tablette</option>
        <option value="ordinateur">Ordinateur</option>
        <option value="accesoire">Accesoire</option>
      </select>
      <div class="invalid-feedback">
        Please select a valid category.
      </div>
    </div>
  </div>
  <div class="form-group">
<div class="col-md-8 mb-3">
      <input type="file" name="image" class="form-control" required>
  </div>
  <?php 
  $i=1;
  while($i<=3){
  ?>
  <div class="col-md-8 mb-3">
      <input type="file" class="form-control" name="image<?=$i?>">

  </div>
  <?php $i++;}?>
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
  <input name='add' value="Ajouter Article" class="btn btn-primary" type="submit">
  <a href="index.php" class="btn btn-outline-danger">Annuler</a>
</form>
</div>




<div align="center" class="container p-3 mb-2 bg-light text-dark">


<table class="uk-table uk-table-justify uk-table-divider">
    <thead>
        <tr>
            <th>ID</th>
            <th class="uk-width-small">Article image</th>
            <th>Article titre</th>
            <th>Catégorie</th>
            <th>contenu</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $i=1;
    while($prod=$produits->fetch()){
        $i++;
    ?>
        <tr>
            <td><?= $prod['id'] ?></td>
            <td> <img  class="w-50" src="../assets/articles/<?=$prod['id'] ?>.jpg" alt=""></td>
            <td><?= $prod['titre'] ?></td>
            <td><?= $prod['categorie'] ?></td>
            <td><?= $prod['contenu'] ?></td>
            <td><a href="editproduct.php?edit=<?= $prod['id']  ?>"  class="btn btn-primary">Modifier</a></td>
            <td><a href="controllers/delete.php?id=<?= $prod['id'] ?>"  class="btn btn-outline-danger"><i class="far fa-trash-alt"></i>&nbsp;delete</a></td>

        </tr>
        <?php }?>

    </tbody>
</table>

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