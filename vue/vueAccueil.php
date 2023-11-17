<?php

$title = TITREONGLET;
$header = NOMSITE;
$titre = "Administration du magasin";
$menu = MENU;

ob_start();
if(isset($_SESSION['user'])){
    echo('<p> Bienvenu '. $_SESSION['user'] . '!');
}

$contenu = ob_get_clean();  
$footer = "&copy; SAE 3D01";


require "gabarit.php";