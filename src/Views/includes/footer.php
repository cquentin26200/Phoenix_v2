<?php
ob_start();
?>
<form action="/catalogue" method="post">
    <nav>
        <ul>
            <li><button name="type" value="vacation"><i class="fa-sharp fas fa-solid fa-umbrella-beach"></i><span>Vos vacances de rêve ..</span></button></li>
            <li><button name="type" value="Plage"><i class="fa-solid fas fa-sun"></i><span>Plage</span></button></li>
            <li><button name="type" value="Urbaine"><i class="fa-sharp fas fa-solid fa-city"></i><span>Urbaine</span></button></li>
            <li><button name="type" value="Croisière"><i class="fa-sharp fas fa-solid fa-ship"></i><span>Croisière</span></button></li>
            <li><button name="type" value="Montagne"><i class="fa-solid fas fa-image"></i><span>Montagne</span></button></li>
            <li><button name="type" value="Prix"><i class="fa-solid fas fa-euro-sign"></i><span>A prix tout doux</span></button></li>
        </ul>
    </nav>
</form>
<?php
$footer = ob_get_clean();
?>