<?php
$title = TITREONGLET;
$header = NOMSITE;
$titre = "Créer type";
$menu = MENU;

ob_start();

if(!isset($_SESSION['acces'])){
    ?>
    <form action=<?=$_SERVER['PHP_SELF']."?action=ajouterType"?> method="POST">
        <div class="form_elt">
            <label for="">
                <span>libelle</span>
                <input type="text" name="libelle" class="texte" id="" placeholder="indiquez nom type">
            </label>
        </div>
        <input type="submit" class="valid" name="ok" value="valider">
    </form>

    <?php
}

$contenu = ob_get_clean();
$footer = "&copy; SAE 3D01";
require "gabarit.php";