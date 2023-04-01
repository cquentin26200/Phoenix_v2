<?php ob_start() ?>
<form class="payment" method="post" action="/confirm/payment">
    <div class="mb-3">
        <label for="phone" class="form-label">Telephone</label>
        <input type="tel"  class="form-control" name="phone" id="phone" placeholder="+33 6">
    </div>
    <div class="mb-3">
        <label for="num_cart" class="form-label">Numéro de carte</label>
        <input type="password"  class="form-control" name="num_cart" id="num_cart" placeholder="**** **** **** ****">
    </div>
    <div class="mb-3">
        <label for="address_fac" class="form-label">Adresse de facturation</label>
        <input type="text" class="form-control" name="adress_fac" id="address_fac" placeholder="**** **** **** ****">
    </div>
    <div class="mb-3">
        <label for="condition" class="form-label">Condition d'utilisation</label>
        <input type="checkbox" name="check" class="form-check-input" id="condition">
    </div>
    <?php if (isset($error)) : ?>
        <p class="error">Veuillez remplir correctement les champs</p>
    <?php endif ?>
    <input type="submit" class="btn btn-primary" value="Confirmer">
</form>
<?php
$content = ob_get_clean();
require VIEWS . "layout.php";
?>