<?php
$title = TITREONGLET;
$showHeader = false;
$titre = "";

ob_start();

if (!isset($_SESSION['acces'])) {
    if (isset($verifChamp) && $verifChamp == false) {
        echo ('<p class="error">Veuillez remplir tous les champs</p>');
    } else if (isset($verifLogin) && $verifLogin == false) {
        echo ('<p class="error">Pseudonyme ou mot de passe incorect</p>');
    }
    ?>

    <main class="login_section">
        <div class="login_left">
            <img src="./assets/login_img/login_background.png" alt="">
        </div>

        <div class="login_right">
            <h1>Connexion</h1>
            <form action=<?= $_SERVER['PHP_SELF'] . "?action=login" ?> method="POST">
                <div class="form_elt">
                    <label for="">
                        <span>Pseudonyme</span>
                        <input type="text" name="pseudo" class="texte" id="" placeholder="indiquez votre pseudonyme"
                            required>
                    </label>
                </div>
                <div class="form_elt">
                    <label for="">
                        <span>Mot de passe</span>
                        <input type="password" name="mdp" class="texte" required>
                    </label>
                </div>
                <input type="submit" class="valid button_valid" name="ok" value="Valider">
            </form>
            <div class="lien_signup">
            <p>Pas de compte ? <a class="lien" href="index.php?action=signup">S'inscrire</a></p>
            </div>
            <a class="lien" href="index.php">Retour</a>
        </div>
    </main>
    <div class="halo_div"></div>
    <div class="halo_div2"></div>
    <?php
}

$contenu = ob_get_clean();
$footer = "Sp-Hess";
$showFooter = false;
require "gabarit.php";