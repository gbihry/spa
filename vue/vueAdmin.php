<?php

$title = TITREONGLET;
$header = NOMSITE;
$titre = "Administration";
$menu = MENU;

ob_start();

foreach($types as $type){
    echo(
        '
            <div class="type">
                <p>'.$type['libelle'].'</p>
                <a href="index.php?action=supprimerType&&idType='.$type['id_type'].'">Supprimer</a>
            </div>
        '
    );
}

echo ('<a href="index.php?action=ajouterType">Ajouter type</a>');
echo ('<a href="index.php?action=ajouterType">Ajouter animal</a>');



$contenu = ob_get_clean();  
$footer = "&copy; SAE 3D01";


require "gabarit.php";