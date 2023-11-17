<?php
$title = TITREONGLET;
$header = NOMSITE;
$titre = "Modifier type";
$menu = MENU;

ob_start();

if(isset($_SESSION['USER'])){
    ?>
    <form action=<?=$_SERVER['PHP_SELF']."?action=modifierType&&idType=".$_GET['idType']?> method="POST">
        <div class="form_elt">
            <label for="">
                <span>libelle</span>
                <input type="text" name="libelle" value="<?= $libelle ?>" class="texte" id="" placeholder="indiquez nom type">
            </label>
        </div>
        <input type="submit" class="valid" name="ok" value="valider">
    </form>

    <?php
}

$contenu = ob_get_clean();
$footer = "&copy; SAE 3D01";
require "vue/gabarit.php";