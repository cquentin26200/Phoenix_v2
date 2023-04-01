<?php
ob_start();
?>
<section class="reservation">
    <?php $_POST["page"] = 1 ?>
    <form action="/confirmation/add/" method="post" class="g-3 card formulaire">
        <h1>Je complète mes informations de réservation</h1>
        <div class="reservation__infos_form">
            <!-- Email de confirmation -->
            <div>
                <label for="staticEmail" class="visually-hidden">Email</label>
                <input type="text" name="email_voyage" class="form-control reservation__infos_form__email_confirm" id="staticEmail" placeholder="Email de confirmation">
            </div>
            <!-- Temps de voyage -->
            <div class="reservation__centrer">
                <div>
                    <label for="temps" class="visually-hidden">Temps</label>
                    <input type="number" class="form-control" name="semaine" id="temps" placeholder="Je pars combien de semaines ?">
                </div>
                <!-- Nombre de personnes -->
                <div>
                    <label for="quantite" class="visually-hidden">Password</label>
                    <input type="number" name="participant" class="form-control" id="quantite" placeholder="Nombre de vacanciers">
                </div>
            </div>
            <?php if (isset($error)) : ?>
                <p class="error">Veuillez remplir tous les champs correctement</p>
            <?php endif ?>
            <div>
                <button type="submit" class="btn btn-primary submit">Confirmer ma réservation</button>
            </div>
        </div>
        <?php foreach ($travel as $travels) : ?>
            <input type="hidden" name="id_reservation" value="<?= $travels->getID_VOYAGE() ?>">
            <input type="hidden" name="prix" value="<?= $travels->getPRIX_VOYAGE() ?>">
            <input type="hidden" name="libelle" value="<?= $travels->getLIBELLE_VOYAGE() ?>">
        <?php endforeach ?>
    </form>
    <div class="presentation">
        <?php foreach ($travel as $travels) : ?>
            <img src="/assets/img/<?= $travels->getIMAGE_VOYAGE() ?>" class="reservation__card-img-top card-img-top" alt="Image de l'hotel">
            <div class="card-body">
                <p class="card-title"><?= $travels->getLIBELLE_VOYAGE() ?></p>
                <p class="card-text">1 semaine / personne : <?= $travels->getPRIX_VOYAGE() ?> €</p>
            </div>
        <?php endforeach ?>
    </div>
</section>

<?php
require VIEWS . "/includes/allTravel.php";
echo $allTravel;
$content = ob_get_clean();
require VIEWS . "layout.php";
?>