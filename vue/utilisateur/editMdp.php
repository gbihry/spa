<?php
$title = TITREONGLET;
$header = NOMSITE;
$titre = "Modifier mot de passe";
$menu = MENU;

ob_start();

if(isset($_SESSION['USER'])){
    if(isset($verifActuelMdp) && isset($verifConfirmMdp)){
        if ($verifActuelMdp === false && $verifConfirmMdp === false){
            echo('<p class="error">Mot de passe actuel incorecte et confirmation du mot de passe incorect</p>');
        }else if ($verifConfirmMdp === false){
            echo('<p class="error">Confirmation du mot de passe incorecte</p>');
        }else {
            echo('<p class="error">Mot de passe actuel incorecte</p>');
            
        }
    }
    ?>
    <form action=<?=$_SERVER['PHP_SELF']."?action=modifierMDP&&idProfil=".$_GET['idProfil']?> method="POST">
        <div class="form_elt">
            <label for="">
                <span>Mot de passe actuel</span>
                <input type="password" name="mdpActuel" class="texte" placeholder="indiquez mot de passe actuel">
            </label>
        </div>
        <div class="form_elt">
            <label for="">
                <span>Nouveau mot de passe</span>
                <input type="password" name="newMdp" class="texte" placeholder="indiquez nouveau mot de passe">
            </label>
        </div>
        <div class="form_elt">
            <label for="">
                <span>Confirmer nouveau mot de passe</span>
                <input type="password" name="confNewMdp" class="texte" placeholder="vérifier nouveau mot de passe">
            </label>
        </div>
        <input type="submit" class="valid" name="ok" value="valider">
    </form>
    <?php
}

$contenu = ob_get_clean();
$footer = "&copy; SAE 3D01";
require "vue/gabarit.php";