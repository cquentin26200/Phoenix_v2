<?php
ob_start();
?>
<div class="card-g">
    <?php foreach ($travel as $travels) : ?>
        <div class="card">
            <img src="assets/img/<?= $travels->getIMAGE_VOYAGE() ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-title"><?= $travels->getLIBELLE_VOYAGE() ?></p>
                <p class="card-text"><?= $travels->getDESC_VOYAGE() ?></p>
                <form action="reservation/<?= $travels->getID_VOYAGE() ?>" method="get">
                    <input class="btn btn-primary" type="submit" value="Réserver maintenant !">
                </form>
            </div>
        </div>
    <?php endforeach ?>
</div>
<?php
require "includes/allTravel.php";
echo $allTravel;
$content = ob_get_clean();
require VIEWS . "layout.php";
?>