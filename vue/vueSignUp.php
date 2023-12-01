<?php
$title = TITREONGLET;
$header = NOMSITE;
$titre = "S'inscrire";

$showHeader = false;

ob_start();

if(!isset($_SESSION['acces'])){
    if (isset($verifChamp) && $verifChamp == false){
        echo('<p class="error">Veuillez remplir tous les champs</p>');
    }else if (isset($verifPseudo) && $verifPseudo == false){
        echo('<p class="error">Pseudonyme déjà existant</p>');
    }else if (isset($verifMDP) && $verifMDP == false){
        echo('<p class="error">Les deux mot de passes ne correspondent pas</p>');
    }
    ?>
    <form action=<?=$_SERVER['PHP_SELF']."?action=signup"?> method="POST">
        <div class="form_elt">
            <label for="">
                <span>Nom</span>
                <input type="text" name="nom" class="texte" id="" placeholder="indiquez votre nom" required>
            </label>
        </div>
        <div class="form_elt">
            <label for="">
                <span>Prenom</span>
                <input type="text" name="prenom" class="texte" id="" placeholder="indiquez votre prenom" required>
            </label>
        </div>
        <div class="form_elt">
            <label for="">
                <span>Pseudonyme</span>
                <input type="text" name="pseudo" class="texte" id="" placeholder="indiquez votre pseudonyme" required>
            </label>
        </div>
        <div class="form_elt">
            <label for="">
                <span>Localisation</span>
                <input type="text" name="localisation" class="texte" id="" placeholder="indiquez votre localisation" required>
            </label>
        </div>
        <div class="form_elt">
            <label for="">
                <span>Mot de passe</span>
                <input type="password" name="mdp" class="texte" required>
            </label>
        </div>
        <div class="form_elt">
            <label for="">
                <span>Vérifier mot de passe</span>
                <input type="password" name="mdp_verif" class="texte" required>
            </label>
        </div>
        <input type="submit" class="valid" name="ok" value="valider">
    </form>

    <p>Vous avez déjà un compte ? <a class="lien" href="index.php?action=login">Se connecter</a></p>
    <?php
}

$contenu = ob_get_clean();
$footer = "&copy; SAE 3D01";
require "gabarit.php";