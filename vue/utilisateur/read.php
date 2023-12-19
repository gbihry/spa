<?php
$title = TITREONGLET;
$header = NOMSITE;
$titre = "";

ob_start();
?>
<div class="background_user_interface"></div>
<section class="user_interface">
    <a href="index.php?action=modifierProfil&&idProfil=<?=$utilisateur['id_utilisateur']?>">Modifier profil</a>
    <a href="index.php?action=modifierMDP&&idProfil=<?=$utilisateur['id_utilisateur']?>">Modifier mot de passe</a>
    <p>Nom : <?=$utilisateur['nom']?></p>
    <p>Prénom : <?=$utilisateur['prenom']?></p>
    <p>Pseudo : <?=$utilisateur['pseudo']?></p>
    <p>Pseudo : <?=$utilisateur['localisation']?></p>
</section>
<?php
$contenu = ob_get_clean();  
$footer = "&copy; SAE 3D01";
require "vue/gabarit.php";