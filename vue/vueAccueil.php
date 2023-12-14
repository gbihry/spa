<?php

$title = TITREONGLET;
$header = NOMSITE;
$titre = "Bienvenue à la spa";

ob_start();
?>
<section>
Salut
</section>

<?php
$contenu = ob_get_clean();  
$footer = "&copy; SAE 3D01";


require "gabarit.php";