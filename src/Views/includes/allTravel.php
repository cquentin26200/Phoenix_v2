<?php
ob_start()
?>

<div class="allTravel">
    <?php $showCard = isset($_POST["page"]) ? $_POST["page"] * 6 : 6 ?>
    <?php $showAllCard = isset($_POST["page"]) ? ($_POST["page"] - 1) * 6 : 0 ?>
    <?php $card = isset($_POST["page"]) ? $_POST["page"] : 1 ?>
    <?php for ($i = 0; $i < $showCard; $i++) : ?>
        <?php if (isset($showAll[$i])) : ?>
            <?php if ($i >= $showAllCard) : ?>
                <form action="/reservation/<?= $showAll[$i]->getID_VOYAGE() ?>" method="post">
                    <img src="/assets/img/<?= $showAll[$i]->getIMAGE_VOYAGE() ?>" alt="">
                    <input type="hidden" name="id_voyage" value="<?= $showAll[$i]->getID_VOYAGE() ?>">
                    <input type="submit" value="">
                </form>
            <?php endif ?>
        <?php endif ?>
    <?php endfor ?>
</div>

<?php
$allTravel = ob_get_clean();
?>