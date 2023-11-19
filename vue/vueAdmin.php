<?php

$title = TITREONGLET;
$header = NOMSITE;
$titre = "Administration";
$menu = MENU;

ob_start();

?>
<div class="admin">
    <div class="table-admin">
        <a href="index.php?action=ajouterType">Ajouter type</a>
        <h1>Type</h1>
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
    </div>
    <div class="table-admin">
        <a href="index.php?action=ajouterSPA">Ajouter spa</a>
        <h1>SPA</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Localisation</th>
                    <th>Supprimer</th>
                    <th>Modifier</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($AllSPA as $spa){
                        ?>
                        <tr>
                            <td><?= $spa['nom'] ?></td>
                            <td><?= $spa['localisation'] ?></td>
                            <td><a href="index.php?action=supprimerSPA&&idSPA=<?=$spa['id_spa']?>">Supprimer</a></td>
                            <td><a href="index.php?action=modifierSPA&&idSPA=<?=$spa['id_spa']?>">Modifier</a></td>
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="table-admin">
        <a href="index.php?action=ajouterAnimal">Ajouter animal</a>
        <h1>Animal</h1>
        <table border="1">
            <thead>
                <tr>
                    <th class="hidden"></th>
                    <th>Nom</th>
                    <th>Âge</th>
                    <th>Taille</th>
                    <th>Poid</th>
                    <th>Handicape</th>
                    <th>SPA</th>
                    <th>Type</th>
                    <th>Supprimer</th>
                    <th>Modifier</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($animals as $animal){
                        ?>
                        <tr>
                            <td><img class="imgAnimal" src='photoAnimal/<?= $animal['nomImg'] ?>' alt=""></td>
                            <td><?= $animal['nom'] ?></td>
                            <td><?= $animal['age'] ?></td>
                            <td><?= $animal['taille'] ?> m</td>
                            <td><?= $animal['poid'] ?> kg</td>
                            <td><?= $animal['handicape'] == 1 ? "Oui" : "Non" ?></td>
                            <td><?= $animal['spaNom'] ?></td>
                            <td><?= $animal['type'] ?></td>
                            

                            <td><a href="index.php?action=supprimerAnimal&&idAnimal=<?=$animal['id_animal']?>">Supprimer</a></td>
                            <td><a href="index.php?action=modifierAnimal&&idAnimal=<?=$animal['id_animal']?>">Modifier</a></td>
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php


$contenu = ob_get_clean();  
$footer = "&copy; SAE 3D01";


require "gabarit.php";