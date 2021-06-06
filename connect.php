<?php
include 'controllers/connect.php';
$page='Connect';
include 'elements/head.php';
include 'elements/navbar.php';
if(isset($error)){
    echo $error;
}
?>

<div style="top: 152px; position: relative;z-index:999">
<form method="post" class="needs-validation" align="center" novalidate>
<h2 class="mb-4 uk-padding-small">Login</h2>
<hr class="uk-divider-icon">

  <div class="form-row mb-4 d-flex justify-content-center">
    <div class="col-md-3">
      <input name="email" type="email" class="form-control" id="validationCustom01" placeholder="E-mail" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-3">
      <input name="password" type="password" class="form-control" id="validationCustom02" placeholder="Password"  required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  </div>
  
  <div class="d-flex justify-content-center">
  <input value="Login" name="login" class="btn btn-light my-4 btn-block col-md-3 d-flex justify-content-center" style="background-color:#e6e6e6" type="submit">
  </div>
   <!-- Social register -->
   <p>or contact us on:</p>

<a href="#" class="mx-2" role="button"><i style="color: indigo" class="fab fa-facebook-f"></i></a>
<a href="#" class="mx-2" role="button"><i style="color: orange" class="fab fa-twitter"></i></a>
<a href="#" class="mx-2" role="button"><i style="color: #355699" class="fab fa-linkedin-in"></i></a>
<a href="#" class="mx-2" role="button"><i style="color: green" class="fab fa-github"></i></a>

<hr>

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
</script></div>
<?php
include 'elements/footer.php';
?>