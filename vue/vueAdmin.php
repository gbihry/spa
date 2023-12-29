<?php

$title = TITREONGLET;
$header = NOMSITE;
$titre = "";

ob_start();

?>
<section class="admin_section">
    <div class="hero">
        <img sizes="(max-width: 1400px) 100vw, 1400px" srcset="
            ./assets/admin_img/Admin_background/Admin_background_her9tf_c_scale,w_200.png 200w,
            ./assets/admin_img/Admin_background/Admin_background_her9tf_c_scale,w_343.png 343w,
            ./assets/admin_img/Admin_background/Admin_background_her9tf_c_scale,w_451.png 451w,
            ./assets/admin_img/Admin_background/Admin_background_her9tf_c_scale,w_544.png 544w,
            ./assets/admin_img/Admin_background/Admin_background_her9tf_c_scale,w_624.png 624w,
            ./assets/admin_img/Admin_background/Admin_background_her9tf_c_scale,w_699.png 699w,
            ./assets/admin_img/Admin_background/Admin_background_her9tf_c_scale,w_766.png 766w,
            ./assets/admin_img/Admin_background/Admin_background_her9tf_c_scale,w_837.png 837w,
            ./assets/admin_img/Admin_background/Admin_background_her9tf_c_scale,w_899.png 899w,
            ./assets/admin_img/Admin_background/Admin_background_her9tf_c_scale,w_956.png 956w,
            ./assets/admin_img/Admin_background/Admin_background_her9tf_c_scale,w_1008.png 1008w,
            ./assets/admin_img/Admin_background/Admin_background_her9tf_c_scale,w_1058.png 1058w,
            ./assets/admin_img/Admin_background/Admin_background_her9tf_c_scale,w_1106.png 1106w,
            ./assets/admin_img/Admin_background/Admin_background_her9tf_c_scale,w_1160.png 1160w,
            ./assets/admin_img/Admin_background/Admin_background_her9tf_c_scale,w_1204.png 1204w,
            ./assets/admin_img/Admin_background/Admin_background_her9tf_c_scale,w_1266.png 1266w,
            ./assets/admin_img/Admin_background/Admin_background_her9tf_c_scale,w_1309.png 1309w,
            ./assets/admin_img/Admin_background/Admin_background_her9tf_c_scale,w_1348.png 1348w,
            ./assets/admin_img/Admin_background/Admin_background_her9tf_c_scale,w_1375.png 1375w,
            ./assets/admin_img/Admin_background/Admin_background_her9tf_c_scale,w_1400.png 1400w" 
            src="Admin_background_her9tf_c_scale,w_1400.png" alt="">
        <h1>Voici le panel administrateur</h1>
        <span>Venez chez nous ou ça vous braque en légende petit chien de merde.</span>
    </div>
</section>

<section class="admin_panel">

    <div class="admin_panel_text">
        <h2>Panel Admin</h2>

        <p>Vous pouvez éditer ici toutes les données des animaux, des spa et des types</p>
    </div>

    <div class="panel_admin">

        <div class="table-admin">

            <div class="header_table_admin">
                <h1>Type</h1>
                <a href="index.php?action=ajouterType">Ajouter type</a>
            </div>

            <table>
                <tbody>
                    <?php
                    foreach ($types as $type) {
                        ?>

                        <tr>
                            <td class="type_admin">
                                <?= $type['libelle'] ?>
                            </td>
                            <td><a class="delete_button_admin"
                                    onclick="modalVerif(this, '<?= $type['libelle'] ?>', 'type', <?= $type['id_type'] ?>)">Supprimer</a>
                            </td>
                            <td><a class="change_button_admin"
                                    href="index.php?action=modifierType&&idType=<?= $type['id_type'] ?>">Modifier</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="table-admin">

            <div class="header_table_admin">
                <h1>SPA</h1>
                <a href="index.php?action=ajouterSPA">Ajouter spa</a>
            </div>

            <div class="table_admin">
                <table>

                    <tbody>
                        <?php
                        foreach ($AllSPA as $spa) {
                            ?>
                            <tr>
                                <td>
                                    <?= $spa['nom'] ?>
                                </td>
                                <td>
                                    <?= $spa['localisation'] ?>
                                </td>
                                <td><a class="delete_button_admin"
                                        onclick="modalVerif(this, '<?= $spa['nom'] ?>', 'SPA', <?= $spa['id_spa'] ?>)">Supprimer</a>
                                </td>
                                <td><a class="change_button_admin"
                                        href="index.php?action=modifierSPA&&idSPA=<?= $spa['id_spa'] ?>">Modifier</a></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="table-admin infos_animals_admin">

            <div class="header_table_admin">
                <h1>Animal</h1>
                <a href="index.php?action=ajouterAnimal">Ajouter animal</a>
            </div>

            <table>
                <thead>
                    <tr class="header_table_items">
                        <th class="hidden"></th>
                        <th>Nom</th>
                        <th>Âge</th>
                        <th>Taille</th>
                        <th>Poid</th>
                        <th>Handicape</th>
                        <th>SPA</th>
                        <th>Type</th>
                        <th>Arrivé le</th>
                        <th>Supprimer</th>
                        <th>Modifier</th>
                    </tr>
                </thead>

                <div class="animals_container_admin">
                    <?php
                    foreach ($animals as $animal) {
                        $animal['dateArrivee'] = $ObjectAnimal->getDate($animal['dateArrivee']);
                        ?>
                        <tr>
                            <td><img class="imgAnimal" src='photoAnimal/<?= $animal['nomImg'] ?>' alt=""></td>
                            <td>
                                <?= $animal['nom'] ?>
                            </td>
                            <td>
                                <?= $animal['age'] ?>
                            </td>
                            <td>
                                <?= $animal['taille'] ?> m
                            </td>
                            <td>
                                <?= $animal['poid'] ?> kg
                            </td>
                            <td>
                                <?= $animal['handicape'] == 1 ? "Oui" : "Non" ?>
                            </td>
                            <td>
                                <?= $animal['spaNom'] ?>
                            </td>
                            <td>
                                <?= $animal['type'] ?>
                            </td>
                            <td>
                                <?= $animal['dateArrivee'] ?>
                            </td>

                            <td><a
                                    onclick="modalVerif(this, '<?= $animal['nom'] ?>', 'animal', <?= $animal['id_animal'] ?>)">Supprimer</a>
                            </td>
                            <td><a href="index.php?action=modifierAnimal&&idAnimal=<?= $animal['id_animal'] ?>">Modifier</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </div>

            </table>
        </div>

    </div>
</section>
<?php


$contenu = ob_get_clean();
$footer = "Sp-Hess";


require "gabarit.php";