<?php
include 'controllers/sign.php';
$page='Sign in';
include 'elements/head.php';
include 'elements/navbar.php';
?>
<div align="center" style="top: 152px; position: relative">
<h2>Sign in</h2>
<hr class="uk-divider-icon">
    <form class="needs-validation w-50" method="post" enctype="multipart/form-data" novalidate>
        <div class="form-row">
        <div class="">
          <input name="avatar" placeholder="Avatar" type="File" id="validationCustom03">
        </div>
        
      </div>
      <div class="form-row">
        <div class="col-md-6 mb-3">
          <input name="nom" placeholder="Nom" type="text" class="form-control" id="validationCustom01" <?php if(isset($_POST['nom'])){?>value="<?=$_POST['nom']?>"<?php }?> required>
          <div class="valid-feedback">
            Looks good!
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <input name="prenom" placeholder="Prénom" type="text" class="form-control" id="validationCustom02" <?php if(isset($_POST['prenom'])){?>value="<?=$_POST['prenom']?>"<?php }?> required>
          <div class="valid-feedback">
            Looks good!
          </div>
        </div>
        
      </div>
        <div class="form-row">
        <div class="col-md-6 mb-3">
          <input name="email" placeholder="E-mail" type="email" <?php if(isset($_POST['email'])){?>value="<?=$_POST['email']?>"<?php }?> class="form-control" id="validationCustom03" required>
          <div class="invalid-feedback">
            Please provide a valid city.
          </div>
        </div>
            <div class="col-md-6 mb-3">
          <input name="password" placeholder="Password" type="password" class="form-control" id="validationCustom03" required>
          <div class="invalid-feedback">
            Please provide a valid city.
          </div>
        </div>
 
        
      </div>
      <div class="form-row">
        <div class="col-md-6 mb-3">
          <input name="age" placeholder="Age" type="number" class="form-control" id="validationCustom03" required>
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
      <input value="Sign in" name="sign" class="btn btn-light" type="submit">
    </form>
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