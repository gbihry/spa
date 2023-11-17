<?php

$title = TITREONGLET;
$header = NOMSITE;
$titre = "Administration";
$menu = MENU;

ob_start();

?>
<table border="1">
    <thead>
        <tr>
            <th>Type</th>
            <th>Supprimer</th>
            <th>Modifier</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($types as $type){
                ?>
                <tr>   
                    <td><?= $type['libelle'] ?></td>
                    <td><a href="index.php?action=supprimerType&&idType=<?=$type['id_type']?>">Supprimer</a></td>
                    <td><a href="index.php?action=modifierType&&idType=<?=$type['id_type']?>">Modifier</a></td>
                </tr>
                <?php
            }
        ?>
    </tbody>
</table>

<?php

echo ('<a href="index.php?action=ajouterType">Ajouter type</a>');
echo ('<a href="index.php?action=ajouterAnimal">Ajouter animal</a>');



$contenu = ob_get_clean();  
$footer = "&copy; SAE 3D01";


require "gabarit.php";