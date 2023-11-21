<?php
$title = TITREONGLET;
$header = NOMSITE;
$titre = "Créer SPA";
$menu = MENU;

ob_start();

if(isset($_SESSION['USER'])){
    ?>
    <form action=<?=$_SERVER['PHP_SELF']."?action=ajouterSPA"?> method="POST">
        <div class="form_elt">
            <label for="">
                <span>Nom</span>
                <input type="text" name="nom" class="texte" id="" placeholder="indiquez nom spa" required>
            </label>
        </div>
        <div class="form_elt">
            <label for="">
                <span>Localisation</span>
                <input type="text" name="localisation" class="texte" id="" placeholder="indiquez localisation spa" required>
            </label>
        </div>
        <input type="submit" class="valid" name="ok" value="valider">
    </form>

    <?php
}

$contenu = ob_get_clean();
$footer = "&copy; SAE 3D01";
require "vue/gabarit.php";