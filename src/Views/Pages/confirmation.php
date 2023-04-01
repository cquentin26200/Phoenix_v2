<?php
ob_start();
?>

<div class="confirmation">
    <?php foreach ($reservation as $reservations) : ?>
        <span>Récapituliatif de votre réservation pour les <?= $reservations->getnom_commande() ?></span>
        <div>
            <div class="w-50 info">
                <div>
                    <p>Participant(s)</p>
                    <p class="number"><?= $reservations->getparticipant() ?></p>
                </div>
                <div>
                    <p>Semaine(s)</p>
                    <p class="number"><?= $reservations->getsemaine() ?></p>
                </div>
            </div>
            <div class="w-50 total">
                <div>
                    <p>Commande</p>
                    <p class="number">1</p>
                </div>
                <div>
                    <p>Total</p>
                    <p><?= $reservations->getprix() ?> €</p>
                </div>
            </div>
        </div>
        <span>Bon séjour</span>
    <?php endforeach ?>
</div>
<?php
require VIEWS . "/includes/allTravel.php";
echo $allTravel;
$content = ob_get_clean();
require VIEWS . "layout.php";
?>