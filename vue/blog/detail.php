<?php
$title = TITREONGLET;
$header = NOMSITE;
$titre = "";

ob_start();

$dateCreation = $ObjectBlog->getDateTime($blog['dateCreation']);
if ($blog['dateModification'] != null) {
    $dateModification = $ObjectBlog->getDateTime($blog['dateModification']);
}

?>

<section class="edit_page_admin_section">
    <div class="detailBlog">
        <h1>
            <?= $blog['titre'] ?>
        </h1>
        <h2>
            <?= $blog['sousTitre'] ?>
        </h2>
        <?= $contenu ?>
        <img src="photoBlog/<?= $blog['image'] ?>" alt="">
        <p>Fait le
            <?= $dateCreation[0] ?> à
            <?= $dateCreation[1] ?>
        </p>
        <p>
            <?= isset($dateModification) ? "Modifié le " . $dateModification[0] . " à " . $dateModification[1] : "" ?>
        </p>
    </div>
</section>
<?php
$contenu = ob_get_clean();
$footer = "Sp-Hess";
require "vue/gabarit.php";