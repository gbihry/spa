<?php
$title = TITREONGLET;
$header = NOMSITE;
$titre = "S'inscrire";
$menu = MENU;

ob_start();

if(!isset($_SESSION['acces'])){
    ?>
    <form action=<?=$_SERVER['PHP_SELF']."?action=signup"?> method="POST">
        <div class="form_elt">
            <label for="">
                <span></span>
                <input type="text" name="nom" class="texte" id="" placeholder="indiquez votre nom">
            </label>
        </div>
        <div class="form_elt">
            <label for="">
                <span></span>
                <input type="text" name="prenom" class="texte" id="" placeholder="indiquez votre prenom">
            </label>
        </div>
        <div class="form_elt">
            <label for="">
                <span></span>
                <input type="text" name="pseudo" class="texte" id="" placeholder="indiquez votre pseudonyme">
            </label>
        </div>
        <div class="form_elt">
            <label for="">
                <span></span>
                <input type="text" name="localisation" class="texte" id="" placeholder="indiquez votre localisation">
            </label>
        </div>
        <div class="form_elt">
            <label for="">
                <span>Mot de passe</span>
                <input type="password" name="mdp" class="texte">
            </label>
        </div>
        <div class="form_elt">
            <label for="">
                <span>Vérifier mot de passe</span>
                <input type="password" name="mdp_verif" class="texte">
            </label>
        </div>
        <input type="submit" class="valid" name="ok" value="valider">
    </form>

    <?php
}

$contenu = ob_get_clean();
$footer = "&copy; SAE 3D01";
require "gabarit.php";