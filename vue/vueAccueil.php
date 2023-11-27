<?php

$title = TITREONGLET;
$header = NOMSITE;
$titre = "Bienvenue à la spa";

ob_start();
if(isset($_SESSION['USER'])){
    echo('<p> Bienvenu '. $_SESSION['USER'] . '!');
}

$contenu = ob_get_clean();  
$footer = "&copy; SAE 3D01";


require "gabarit.php";