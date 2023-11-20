<?php
$title = TITREONGLET;
$header = NOMSITE;
$titre = "Vos favoris";
$menu = MENU;

ob_start();
?>
    <div class="animals">
        <?php
        foreach($favoris as $favori){
            ?>
                <div class="card">
                    <div class="nom">
                        <h2><?= $favori['nom'] ?></h2>
                    </div>
                    <div class="age">
                        <p><?= $favori['age'] ?> ans</p>
                    </div>
                    <div class="image">
                        <img src="photoAnimal/<?=$favori['nomImg']?>" alt="">
                        <a href="index.php?action=supprimerFavoris&&idAnimal=<?=$favori['id_animal']?>&&idUser=<?=$_SESSION['IDUSER']?>"><i class="fa-solid fa-heart"></i></a>
                    </div>
                </div>
            <?php
        }
        ?>
    </div>
<?php
$contenu = ob_get_clean();
$footer = "&copy; SAE 3D01";
require "vue/gabarit.php";