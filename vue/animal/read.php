<?php
$title = TITREONGLET;
$header = NOMSITE;
$titre = "";

ob_start();

// if (isset($titleTrie) && $titleTrie != null){
//     echo('<h2 class="title">'.$titleTrie.'</h2>');
// }else{
//     echo('<h2 class="title">Tri</h2>');
// }
?>
<section class="animaux_hero">

    <div class="hero">
        <img sizes="(max-width: 1400px) 100vw, 1400px" srcset="
            ./assets/animaux_page/background_animaux/background_animaux_mgesgl_c_scale,w_200.png 200w,
            ./assets/animaux_page/background_animaux/background_animaux_mgesgl_c_scale,w_443.png 443w,
            ./assets/animaux_page/background_animaux/background_animaux_mgesgl_c_scale,w_613.png 613w,
            ./assets/animaux_page/background_animaux/background_animaux_mgesgl_c_scale,w_736.png 736w,
            ./assets/animaux_page/background_animaux/background_animaux_mgesgl_c_scale,w_855.png 855w,
            ./assets/animaux_page/background_animaux/background_animaux_mgesgl_c_scale,w_966.png 966w,
            ./assets/animaux_page/background_animaux/background_animaux_mgesgl_c_scale,w_1040.png 1040w,
            ./assets/animaux_page/background_animaux/background_animaux_mgesgl_c_scale,w_1139.png 1139w,
            ./assets/animaux_page/background_animaux/background_animaux_mgesgl_c_scale,w_1168.png 1168w,
            ./assets/animaux_page/background_animaux/background_animaux_mgesgl_c_scale,w_1326.png 1326w,
            ./assets/animaux_page/background_animaux/background_animaux_mgesgl_c_scale,w_1400.png 1400w"
            src="background_animaux_mgesgl_c_scale,w_1400.png" alt="image d'écran de la page animal">
        <h1>Choisissez votre compagnon</h1>
        <span>Venez chez nous ou ça vous braque en légende petit chien de merde.</span>
    </div>
</section>


<section class="animaux_trie">
    <h1>Voici tous nos pensionnaires</h1>
    <form class="trie" action=<?= $_SERVER['PHP_SELF'] . "?action=animaux" ?> method="POST">
        <div class="form_elt">
            <label for="">
                <span>Type</span>
                <select name="type" id="pet-select">
                    <?php
                    echo ("<option value='0'>--Séléctionner type--</option>");
                    foreach ($types as $type) {
                        echo ("<option value=" . $type['id_type'] . ">" . $type['libelle'] . "</option>");
                    }
                    ?>
                </select>
            </label>
        </div>
        <div class="form_elt">
            <label for="">
                <span>SPA</span>
                <select name="spa" id="pet-select">
                    <?php
                    echo ("<option value='0'>--Séléctionner spa--</option>");
                    foreach ($allSPA as $spa) {
                        echo ("<option value=" . $spa['id_spa'] . ">" . $spa['nom'] . "</option>");
                    }
                    ?>
                </select>
            </label>
        </div>
        <div class="form_elt">
            <label for="">
                <span>Localisations</span>
                <select name="localisation" id="pet-select">
                    <?php
                    echo ("<option value='0'>--Séléctionner localisation--</option>");
                    if (isset($_SESSION['USER'])) {
                        echo ("<option value=" . $_SESSION['LOC'] . ">--Dans votre ville--</option>");
                    }
                    foreach ($localisations as $localisation) {
                        echo ("<option value=" . $localisation['localisation'] . ">" . $localisation['localisation'] . "</option>");
                    }
                    ?>
                </select>
            </label>
        </div>
        <input type="submit" class="valid valid_button" name="ok" value="Valider">
        <a class="remove_filter" href='index.php?action=animaux'>Enlever filtre</a>
    </form>
    <div class="animals">
        <?php
        foreach ($animals as $animal) {
            ?>
            <div class="card">
                <div class="nom">
                    <h2>
                        <?= $animal['nom'] ?>
                    </h2>
                </div>
                <div class="age">
                    <p>
                        <?= $animal['age'] ?> ans
                    </p>
                </div>
                <div class="image">
                    <img src="photoAnimal/<?= $animal['nomImg'] ?>" alt="">
                    <?php
                    if (isset($_SESSION['USER'])) {
                        ?>
                        <a
                            href="index.php?action=favoris&&idAnimal=<?= $animal['id_animal'] ?>&&idUser=<?= $_SESSION['IDUSER'] ?>">
                            <?php
                            $afficher = false;
                            foreach ($favoris as $favori) {
                                if ($favori['id_animal'] == $animal['id_animal']) {
                                    $afficher = true;
                                }
                            }
                            if ($afficher) {
                                echo ('<i class="fa-solid fa-heart"></i>');
                            } else {
                                echo ('<i class="fa-regular fa-heart"></i>');
                            }

                            ?>
                        </a>
                        <?php
                    }
                    ?>
                </div>
                <a class="detail_link" href="index.php?action=animal&&idAnimal=<?= $animal['id_animal'] ?>">Détail</a>
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