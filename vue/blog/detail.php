<?php
$title = TITREONGLET;
$header = NOMSITE;
$titre = " Blog :  " . $blog['titre'];

ob_start();

$dateCreation = $ObjectBlog->getDateTime($blog['dateCreation']);
if ($blog['dateModification'] != null){
    $dateModification = $ObjectBlog->getDateTime($blog['dateModification']);
}

?>
    <div class="detailBlog">
        <h1> <?=$blog['titre']?> </h1>
        <h2> <?=$blog['sousTitre']?> </h2>
        <?=$contenu?>
        <img src="photoBlog/<?= $blog['image'] ?>" alt="">
        <p>Fait le <?= $dateCreation[0] ?> à <?= $dateCreation[1] ?> </p>
        <p><?= isset($dateModification) ? "Modifié le " . $dateModification[0] . " à " . $dateModification[1] : "" ?></p>
    </div>
<?php
$contenu = ob_get_clean();
$footer = "&copy; SAE 3D01";
require "vue/gabarit.php";