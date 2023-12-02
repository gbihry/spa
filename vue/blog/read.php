<?php
$title = TITREONGLET;
$header = NOMSITE;
$titre = "Blogs";

ob_start();
?>
    <div class="blogs">
        <?php
        foreach($blogs as $blog){
            ?>
            <div class="">
                <p>Titre : <?= $blog['titre'] ?></p>
                <p>Sous titre : <?= $blog['sousTitre'] ?></p>
                <img src="photoBlog/<?= $blog['image'] ?>" alt="">
                <p>Date de création : <?= $blog['dateCreation'] ?></p>
            </div>
            <?php
        }
        ?>
    </div>
<?php
$contenu = ob_get_clean();
$footer = "&copy; SAE 3D01";
require "vue/gabarit.php";