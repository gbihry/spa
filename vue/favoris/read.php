<?php
$title = TITREONGLET;
$header = NOMSITE;
$titre = "";

ob_start();
?>

<section class="hero">
    <img sizes="(max-width: 1400px) 100vw, 1400px" srcset="
        ./assets/favoris_img/favoris_background/favoris_background_b13ea8_c_scale,w_200.png 200w,
        ./assets/favoris_img/favoris_background/favoris_background_b13ea8_c_scale,w_382.png 382w,
        ./assets/favoris_img/favoris_background/favoris_background_b13ea8_c_scale,w_516.png 516w,
        ./assets/favoris_img/favoris_background/favoris_background_b13ea8_c_scale,w_626.png 626w,
        ./assets/favoris_img/favoris_background/favoris_background_b13ea8_c_scale,w_728.png 728w,
        ./assets/favoris_img/favoris_background/favoris_background_b13ea8_c_scale,w_816.png 816w,
        ./assets/favoris_img/favoris_background/favoris_background_b13ea8_c_scale,w_905.png 905w,
        ./assets/favoris_img/favoris_background/favoris_background_b13ea8_c_scale,w_979.png 979w,
        ./assets/favoris_img/favoris_background/favoris_background_b13ea8_c_scale,w_1050.png 1050w,
        ./assets/favoris_img/favoris_background/favoris_background_b13ea8_c_scale,w_1126.png 1126w,
        ./assets/favoris_img/favoris_background/favoris_background_b13ea8_c_scale,w_1196.png 1196w,
        ./assets/favoris_img/favoris_background/favoris_background_b13ea8_c_scale,w_1261.png 1261w,
        ./assets/favoris_img/favoris_background/favoris_background_b13ea8_c_scale,w_1328.png 1328w,
        ./assets/favoris_img/favoris_background/favoris_background_b13ea8_c_scale,w_1393.png 1393w,
        ./assets/favoris_img/favoris_background/favoris_background_b13ea8_c_scale,w_1400.png 1400w"
        src="favoris_background_b13ea8_c_scale,w_1400.png" alt="image d'écran de la page favoris">
    <h1>Vos favoris</h1>
    <span>Ici vous trouvez tous vos chouchous mis en favoris</span>
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
                <a class="detail_link" href="index.php?action=animal&&idAnimal=<?= $favori['id_animal'] ?>">détail</a>
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