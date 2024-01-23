<?php
$title = TITREONGLET;
$header = NOMSITE;
$titre = "";

ob_start();

$dateArrivee = $ObjectAnimal->getDate($animal['dateArrivee']);
?>

<section class="edit_page_admin_section">
    <h2><?="Plus d'infos sur :" . $animal['nom']?></h2>
    <div class="detail">
        <p>Nom :
           <span> <?= $animal['nom'] ?> 
        </p>
        <p>Age :
           <span> <?= $animal['age'] ?> </span>
        </p>
        <p>Taille :
           <span> <?= $animal['taille'] ?></span>
        </p>
        <p>Poids :
           <span> <?= $animal['poid'] ?></span>
        </p>
        <p>Handicapé :
           <span> <?= $animal['handicape'] == 1 ? "Oui" : "Non" ?></span>
        </p>
        <p>Arrivé le
           <span> <?= $dateArrivee ?></span>
        </p>
        <h2>Photo(s) :</h2>
        <?php
        foreach ($imagesAnimal as $imageAnimal) {
            ?>
            <img src="photoAnimal/<?= $imageAnimal['nomImg'] ?>" alt="">
            <?php
        }
        ?>
    </div>
</section>
<?php
$contenu = ob_get_clean();
$footer = "Sp-Hess";
require "vue/gabarit.php";