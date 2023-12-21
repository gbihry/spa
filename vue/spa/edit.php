<?php
$title = TITREONGLET;
$header = NOMSITE;
$titre = "";

ob_start();

if(isset($_SESSION['USER'])){
    ?>
    <section class="edit_page_admin_section">
    <div class="background_user_interface"></div>
    <h1>Modifier la SPA</h1>
    <form action=<?=$_SERVER['PHP_SELF']."?action=modifierSPA&&idSPA=".$_GET['idSPA']?> method="POST">
        <div class="form_elt">
            <label for="">
                <span>Nom</span>
                <input type="text" name="nom" value="<?= $spa['nom'] ?>" class="texte" placeholder="indiquez nom SPA">
            </label>
        </div>
        <div class="form_elt">
            <label for="">
                <span>Localisation</span>
                <input type="text" name="localisation" value="<?= $spa['localisation'] ?>" class="texte" placeholder="indiquez localisation SPA">
            </label>
        </div>
        <input type="submit" class="valid valid_button" name="ok" value="valider">
    </form>
    </section>

    <?php
}

$contenu = ob_get_clean();
$footer = "Sp-Hess";
require "vue/gabarit.php";