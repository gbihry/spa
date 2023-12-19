<?php
$title = TITREONGLET;
$header = NOMSITE;
$titre = "";

ob_start();
?>
<img class="favoris_background" src="./assets/favoris_img/favoris_background.png" alt="">
<section class="hero">
    <h1>Vos favoris</h1>
    <span>Ici vous trouvez tout vos chouchous mis en favoris</span>
</section>

<section class="favoris_section">

    <div class="favoris_text">
        <h2>Voici tous vos favoris</h2>
        <span>Il s’agit de tous nos animaux étant le plus susceptible de devenir votre compagnon</span>
    </div>

    <div class="animals">
        <?php
        foreach ($favoris as $favori) {
            ?>
            <div class="card">
                <div class="nom">
                    <h2>
                        <?= $favori['nom'] ?>
                    </h2>
                </div>
                <div class="age">
                    <p>
                        <?= $favori['age'] ?> ans
                    </p>
                </div>
                <div class="image">
                    <img src="photoAnimal/<?= $favori['nomImg'] ?>" alt="">
                    <a
                        href="index.php?action=supprimerFavoris&&idAnimal=<?= $favori['id_animal'] ?>&&idUser=<?= $_SESSION['IDUSER'] ?>"><i
                            class="fa-solid fa-heart"></i></a>
                </div>
                <a href="index.php?action=animal&&idAnimal=<?= $favori['id_animal'] ?>">détail</a>
            </div>
            <?php
        }
        ?>
    </div>
</section>
<?php
$contenu = ob_get_clean();
$footer = "Sp-Hess";
require "vue/gabarit.php";