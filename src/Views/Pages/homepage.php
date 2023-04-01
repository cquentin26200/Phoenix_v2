<?php
ob_start();
?>
<a href="catalogue" class="btn ">Choisir mon séjour tout de suite</a>
<?php
$content = ob_get_clean();
$id = "homepage";
require VIEWS . "layout.php";
?>