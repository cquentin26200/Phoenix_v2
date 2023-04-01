<?php
ob_start();

if (isset($_SESSION["user"]["ID_USER"])) {
  header('Location:/');
}
?>

<section class="formLogin">
  <h1>S'identifier</h1>
  <div class="separateur"></div>
  <form action="/login/" class="needs-validation" method="post">

    <div class="col-sm-6">
      <div class="input-group input-group-lg p-2">
        <label for="username" class="input-group-text"><i class="fas fa-user-tie"></i></label>
        <input type="text" name="username" class="d-inline form-control p-2" value="<?php echo old("username"); ?>" placeholder="Email">
      </div>
      <span class="h4 pb-2 mb-4 text-danger border-bottom border-danger"><?php echo error("username"); ?></span>


      <div class="input-group input-group-lg p-2">
        <label for="password" class="input-group-text"><i class="fas fa-key"></i></label>
        <input id="inputPassword" type="password" name="password" class="d-inline form-control p-2" value="<?php echo old("password"); ?>" placeholder="Mot de passe">
        <button id="btnPassword" class="viewPassword" type="button" name="button"><i class="far fa-eye"></i></button>
      </div>
      <span class="error"><?php echo error("password"); ?></span>
    </div>
    <button type="submit" class="btn btn-primary mel">
      S'identifier
    </button>

  </form>
  <div class="more">
    <p>Vous n'avez pas de compte ? <a href="/register">Inscrivez-vous !</a></p>
  </div>
</section>

<script>
  var btnPass = document.getElementById("btnPassword");
  var inputPass = document.getElementById("inputPassword");
  btnPass.onclick = function() {
    if (inputPass.type === "password") {
      inputPass.type = "text";
    } else {
      inputPass.type = "password";
    }
  };
</script>

<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
