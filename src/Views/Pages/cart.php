<?php
ob_start()
?>
<div class="cart">
    <?php foreach ($reservation as $reservations) : ?>
        <?php if ($reservations->getid_user() == $_SESSION["user"]["ID_USER"]) : ?>
            <div class="info">
                <div>
                    <a href="/confirmation/show/<?= $reservations->getid_reservation() ?>">Commande</a>
                    <p class="number"><?= $reservations->getnom_commande() ?></p>
                </div>
                <div>
                    <p>Date d'enregistrement</p>
                    <p class="number"><?= $reservations->getdate() ?></p>
                </div>
            </div>
        <?php endif ?>
    <?php endforeach ?>
</div>
<form action="/cart/payment" method="post">
    <input type="submit" class="btn btn-primary" value="Poursuivre le payment">
</form>
<?php
$content = ob_get_clean();
require VIEWS . "layout.php";
?>