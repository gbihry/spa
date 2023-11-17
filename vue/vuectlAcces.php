<?php
$title = TITREONGLET;
$header = NOMSITE;
$titre = "Demande d'authentification";
$menu = MENU;

ob_start();

if(!isset($_SESSION['acces'])){
    ?>
    <form action=<?=$_SERVER['PHP_SELF']."?action=login"?> method="POST">
        <div class="form_elt">
            <label for="">
                <span>Pseudonyme</span>
                <input type="text" name="pseudo" class="texte" id="" placeholder="indiquez votre pseudonyme">
            </label>
        </div>
        <div class="form_elt">
            <label for="">
                <span>Mot de passe</span>
                <input type="password" name="mdp" class="texte">
            </label>
        </div>
        <input type="submit" class="valid" name="ok" value="valider">
    </form>

    <?php
}

$contenu = ob_get_clean();
$footer = "&copy; SAE 3D01";
require "gabarit.php";