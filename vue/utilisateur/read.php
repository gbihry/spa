<?php
$title = TITREONGLET;
$header = NOMSITE;
$titre = "";

ob_start();
?>
<div class="background_user_interface"></div>
<section class="user_interface">

    <div class="hero">
        <h1>Votre profil</h1>
        <span>Voici vos informations, vous pouvez les mettres à jour ou les consulter.</span>
    </div>


    <div class="user_right">
        <h2>Vos informations</h2>
        <div class="user_infos">

            <div>
                <p><span>Prénom :</span>
                    <?= $utilisateur['nom'] ?>
                </p>
            </div>

            <div>
                <p> <span>Nom :</span> </br>
                    <?= $utilisateur['prenom'] ?>
                </p>
            </div>
            <div>
                <p> <span>Pseudo : </span>
                    <?= $utilisateur['pseudo'] ?>
                </p>
            </div>

            <div>
                <p> <span>Localisation :</span>
                    <?= $utilisateur['localisation'] ?>
                </p>
            </div>

            <div class="user_edit_link">
                <a href="index.php?action=modifierProfil&&idProfil=<?= $utilisateur['id_utilisateur'] ?>">Modifier
                    profil</a>
                <a href="index.php?action=modifierMDP&&idProfil=<?= $utilisateur['id_utilisateur'] ?>">Modifier mot de
                    passe</a>
            </div>
        </div>
    </div>

</section>
<?php
$contenu = ob_get_clean();
$footer = "&copy; SAE 3D01";
require "vue/gabarit.php";