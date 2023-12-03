<?php
$title = TITREONGLET;
$header = NOMSITE;
$titre = " Blog :  " . $blog['titre'];

ob_start();
?>
    <div class="detailBlog">
        <h1> <?=$blog['titre']?> </h1>
        <h2> <?=$blog['sousTitre']?> </h2>
        <?=$contenu?>
        <img src="photoBlog/<?= $blog['image'] ?>" alt="">
        <p>Créer le <?= $date ?> à <?= $time ?></p>
    </div>
<?php
$contenu = ob_get_clean();
$footer = "&copy; SAE 3D01";
require "vue/gabarit.php";