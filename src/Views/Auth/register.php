<?php
ob_start();

if (isset($_SESSION["user"]["ID_USER"])) {
  header('Location:/');
}
?>

<section class="formRegister">
  <h1>S'inscrire</h1>
  <div class="separateur"></div>
  <form action="/register/" method="post">

    <div class="input-group input-group-lg p-2">
      <label for="username" class="input-group-text"><i class="fas fa-user-tie"></i></label>
      <input type="text" name="username" class="d-inline form-control p-2" value="<?php echo old("username"); ?>" placeholder="Email">
    </div>
    <span class="error"><?php echo error("username"); ?></span>

    <div class="input-group input-group-lg p-2">
      <label for="password" class="input-group-text"><i class="fas fa-key"></i></label>
      <input type="password" name="password" id="inputPassword" class="d-inline form-control p-2" value="<?php echo old("password"); ?>" placeholder="Mot de passe">
      <button id="btnPassword" class="viewPassword" type="button" name="button"><i class="far fa-eye"></i></button>
    </div>
    <span class="error"><?php echo error("password"); ?></span>

    <div class="input-group input-group-lg p-2">
      <label for="passwordConfirm" class="input-group-text"><i class="fas fa-key"></i></label>
      <input type="password" name="passwordConfirm" id="inputPasswordConfirm" class="d-inline form-control p-2" value="<?php echo old("passwordConfirm"); ?>" placeholder="Mot de passe confirmation">
      <button id="btnPasswordConfirm" class="viewPassword" type="button" name="button"><i class="far fa-eye"></i></button>
    </div>
    <span class="error"><?php echo error("passwordConfirm"); ?></span>
    <span class="error"><?php echo error("confirm"); ?></span>

    <button type="submit" name="button" class="btn p-3 btn-primary">S'inscrire</button>
  </form>

  <div class="more">
    <p>Vous avez déjà un compte ? <a href="/login">Identifiez-vous !</a></p>
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

  var btnPassConf = document.getElementById("btnPasswordConfirm");
  var inputPassConf = document.getElementById("inputPasswordConfirm");
  btnPassConf.onclick = function() {
    if (inputPassConf.type === "password") {
      inputPassConf.type = "text";
    } else {
      inputPassConf.type = "password";
    }
  };
</script>

<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
