<?php
ob_start();
?>
<div class="card-g">
    <?php $showCard = isset($_POST["page"]) ? $_POST["page"] * 6 : 6 ?>
    <?php $showAllCard = isset($_POST["page"]) ? ($_POST["page"] - 1) * 6 : 0 ?>
    <?php $card = isset($_POST["page"]) ? $_POST["page"] : 1 ?>
    <?php for ($i = 0; $i < $showCard; $i++) : ?>
        <?php if (isset($showAll[$i])) : ?>
            <?php if ($i >= $showAllCard) : ?>
                <div class="card">
                    <img src="/assets/img/<?= $showAll[$i]->getIMAGE_VOYAGE() ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-title"><?= $showAll[$i]->getLIBELLE_VOYAGE() ?></p>
                        <p class="card-text"><?= $showAll[$i]->getDESC_VOYAGE() ?></p>
                        <form action="/reservation/<?= $showAll[$i]->getID_VOYAGE() ?>" class="reserv" method="post">
                            <input type="hidden" name="id_voyage" value="<?= $showAll[$i]->getID_VOYAGE() ?>">
                            <input class="btn btn-primary" type="submit" value="Réserver maintenant !">
                            <input type="hidden" name='page' value="<?= $_POST["page"] ?? "" ?>">
                        </form>
                    </div>
                </div>
            <?php endif ?>
        <?php endif ?>
    <?php endfor ?>
</div>
<form action="/catalogue/" method="post">
    <input type="hidden" name='type' value="<?= $filter ?>">
    <nav aria-label="Page navigation example" class="nav-pagination">
        <ul class="pagination">
            <?php if ($card > 1) : ?>
                <button name="page" class="page-link prev" value="<?= $_POST["page"] - 1 ?>">Previous</button>
            <?php endif ?>
            <?php for ($i = 1; $i <= ceil(count($showAll) / 6); $i++) : ?>
                <?php if ($i != 1) : ?>
                    <button name="page" class="page-link nbr" value="<?= $i ?>"><?= $i ?></button>
                <?php endif ?>
            <?php endfor ?>
            <?php if ($card != ceil(count($showAll) / 6)) : ?>
                <button name="page" class="page-link next" value="<?= $card + 1 ?>">Next</button>
            <?php endif ?>
        </ul>
    </nav>
</form>
<?php
require VIEWS . "includes/allTravel.php";
echo $allTravel;
$content = ob_get_clean();
require VIEWS . "layout.php";
?>