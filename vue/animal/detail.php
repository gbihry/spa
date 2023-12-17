<?php
$title = TITREONGLET;
$header = NOMSITE;
$titre = "Détail de l'animal " . $animal['nom'];

ob_start();

$dateArrivee = $ObjectAnimal->getDate($animal['dateArrivee']);
?>
    <div class="detail">
        <p>Nom : <?=$animal['nom']?></p>
        <p>Age : <?=$animal['age']?></p>
        <p>Taille : <?=$animal['taille']?></p>
        <p>Poid : <?=$animal['poid']?></p>
        <p>Handicapé : <?= $animal['handicape'] == 1 ? "Oui" : "Non" ?></p>
        <p>Arrivée le <?= $dateArrivee ?></p>
        <h2>Photo :</h2>
        <?php
            foreach($imagesAnimal as $imageAnimal){
                ?>  
                    <img src="photoAnimal/<?=$imageAnimal['nomImg']?>" alt="">
                <?php
            }
        ?>
    </div>
<?php
$contenu = ob_get_clean();
$footer = "Sp-Hess";
require "vue/gabarit.php";