<?php
$title = TITREONGLET;
$showHeader = true;
$titre = "Demande d'authentification";

ob_start();

if(!isset($_SESSION['acces'])){
    if (isset($verifChamp) && $verifChamp == false){
        echo('<p class="error">Veuillez remplir tous les champs</p>');
    }else if (isset($verifLogin) && $verifLogin == false){
        echo('<p class="error">Pseudonyme ou mot de passe incorect</p>');
    }
    ?>
    <form action=<?=$_SERVER['PHP_SELF']."?action=login"?> method="POST">
        <div class="form_elt">
            <label for="">
                <span>Pseudonyme</span>
                <input type="text" name="pseudo" class="texte" id="" placeholder="indiquez votre pseudonyme" required>
            </label>
        </div>
        <div class="form_elt">
            <label for="">
                <span>Mot de passe</span>
                <input type="password" name="mdp" class="texte" required>
            </label>
        </div>
        <input type="submit" class="valid" name="ok" value="valider">
    </form>
    <p>Pas de compte ? <a class="lien" href="index.php?action=signup">S'inscrire</a></p>
    <a class="lien" href="index.php">Retour</a>
    <?php
}

$contenu = ob_get_clean();
$footer = "Sp-Hess";
require "gabarit.php";