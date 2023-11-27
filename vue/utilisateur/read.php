<?php

$title = TITREONGLET;
$header = NOMSITE;
$titre = "Profil";

ob_start();
?>
    <a href="index.php?action=modifierProfil&&idProfil=<?=$utilisateur['id_utilisateur']?>">Modifier profil</a>
    <a href="index.php?action=modifierMDP&&idProfil=<?=$utilisateur['id_utilisateur']?>">Modifier mot de passe</a>
    <p>Nom : <?=$utilisateur['nom']?></p>
    <p>Prénom : <?=$utilisateur['prenom']?></p>
    <p>Pseudo : <?=$utilisateur['pseudo']?></p>
    <p>Pseudo : <?=$utilisateur['localisation']?></p>
<?php
$contenu = ob_get_clean();  
$footer = "&copy; SAE 3D01";

require "vue/gabarit.php";