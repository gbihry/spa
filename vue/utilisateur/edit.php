<?php
$title = TITREONGLET;
$header = NOMSITE;
$titre = "Modifier profil";
$menu = MENU;

ob_start();

if(isset($_SESSION['USER'])){
    ?>
    <form action=<?=$_SERVER['PHP_SELF']."?action=modifierProfil&&idProfil=".$_GET['idProfil']?> method="POST">
        <div class="form_elt">
            <label for="">
                <span>Nom</span>
                <input type="text" name="nom" value="<?= $utilisateur['nom'] ?>" class="texte" placeholder="indiquez nom">
            </label>
        </div>
        <div class="form_elt">
            <label for="">
                <span>Prenom</span>
                <input type="text" name="prenom" value="<?= $utilisateur['prenom'] ?>" class="texte" placeholder="indiquez prenom">
            </label>
        </div>
        <div class="form_elt">
            <label for="">
                <span>Pseudo</span>
                <input type="text" name="pseudo" value="<?= $utilisateur['pseudo'] ?>" class="texte" placeholder="indiquez pseudo">
            </label>
        </div>
        <div class="form_elt">
            <label for="">
                <span>Localisation</span>
                <input type="text" name="localisation" value="<?= $utilisateur['localisation'] ?>" class="texte" placeholder="indiquez localisation">
            </label>
        </div>
        <input type="submit" class="valid" name="ok" value="valider">
    </form>
    <?php
}

$contenu = ob_get_clean();
$footer = "&copy; SAE 3D01";
require "vue/gabarit.php";