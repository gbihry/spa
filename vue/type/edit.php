<?php
$title = TITREONGLET;
$header = NOMSITE;

$titre = "";

ob_start();

if(isset($_SESSION['USER'])){
    ?>

    <section class="edit_page_admin_section">
    <h1>Modifier type</h1>
    <form action=<?=$_SERVER['PHP_SELF']."?action=modifierType&&idType=".$_GET['idType']?> method="POST">
        <div class="form_elt">
            <label for="">
                <span>Libelle</span>
                <input type="text" name="libelle" value="<?= $libelle ?>" class="texte" placeholder="indiquez nom type">
            </label>
        </div>
        <input type="submit" class="valid valid_button" name="ok" value="Valider">
        
    </form>
    </section>
    <?php
}

$contenu = ob_get_clean();
$footer = "Sp-Hess";
require "vue/gabarit.php";