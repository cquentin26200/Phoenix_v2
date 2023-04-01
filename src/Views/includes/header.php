<?php
ob_start();
?>
<nav class="nav-fluid">
    <ul>
        <li><a href="/"><img src="/assets/img/phoenix_logo.png" alt=""></a></li>
        <li><a href="/">Poenix</a></li>
        <li><a href="/catalogue">Choisir une destination</a></li>
        <li><a href="/cart">Payer</a></li>
    </ul>
    <div>
        <?php if (isset($_SESSION["user"]["ID_USER"])) { ?>
            <a href='/Logout'>Logout</a>
        <?php } ?>
        <?php if (isset($_SESSION["user"]["Admin"]) && $_SESSION["user"]["Admin"] == 1) { ?>
            <a href='/admin'>admin</a>
        <?php } ?>
    </div>
</nav>
<?php if (isset($_SESSION["user"]["ID_USER"])) : ?>
    <div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/assets/img/caraibes1.jpg" class="d-block" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/assets/img/maldives.jpg" class="d-block" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/assets/img/maurice.jpg" class="d-block" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
<?php endif ?>
<?php
$header = ob_get_clean();
?>