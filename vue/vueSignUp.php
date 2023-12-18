<?php
$title = TITREONGLET;
$header = NOMSITE;
$titre = "";

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
<main class="signup_section">
    <div class="left_signup">
        <img src="./assets/login_img/login_background.png" alt="">
    </div>

    <div class="right_signup">
        <h1>S'inscrire</h1>
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
        <input type="submit" class="valid button_valid" name="ok" value="Valider">
    </form>

    <p>Vous avez déjà un compte ? <a class="lien" href="index.php?action=login">Se connecter</a></p>
    <a class="lien" href="index.php">Retour</a>
    </div>
    </main>
    <div class="halo_div"></div>
    <div class="halo_div2"></div>
    <?php
}

$contenu = ob_get_clean();
$showFooter= false;
$footer = "Sp-Hess";
require "gabarit.php";