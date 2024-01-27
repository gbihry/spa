<?php
$title = TITREONGLET;
$header = NOMSITE;
$titre = "";

ob_start();

?>

<section class="mentions_section">
    <div class="mentions_legal">
        <h2>Mentions légales</h2>

        <div>
            <span>Conditions d’utilisation : </span><br>
            Le site accessible par les url suivants : sp-hess.fr (url provisoire) est exploité dans le respect de la
            législation
            française. L'utilisation de ce site est régie par les présentes conditions générales. En utilisant le site,
            vous
            reconnaissez avoir pris connaissance de ces conditions et les avoir acceptées.<br>
        </div>

        <div>
            <span>Collecte et traitement des données personnelles :</span><br>
            SP-HESS s'engage à respecter la confidentialité des données personnelles collectées (mots de passe,
            adresses,
            adresses emails, numéros de téléphone, noms, prénoms, adresses IP). Ces informations sont recueillies dans
            le
            but de
            fournir les services proposés par le site et ne seront pas cédées à des tiers sans votre consentement.
            Conformément à la loi « informatique et libertés » du 6 janvier 1978 modifiée en 2004, vous bénéficiez d’un
            droit
            d’accès et de rectification aux informations qui vous concernent, que vous pouvez exercer en vous adressant
            à
            contact@sp-hess.fr.<br>
        </div>


        <div>
            <span>Propriété intellectuelle :</span><br>
            Tous les contenus présents sur le site de SP-HESS, incluant, sans s'y limiter, les graphismes, images,
            textes,
            vidéos, animations, sons, logos, gifs et icônes ainsi que leur mise en forme sont la propriété exclusive de
            la
            société à l'exception des marques, logos ou contenus appartenant à d'autres sociétés partenaires ou auteurs.
            La reproduction, la modification, la distribution ou toute autre utilisation du contenu du site, autre que
            pour
            un
            usage personnel et non commercial, est strictement interdite sans l'autorisation écrite préalable de
            SP-HESS.<br>
        </div>

        <div>
            <span>Liens hypertextes :</span><br>
            Les sites internet de SP-HESS peuvent offrir des liens vers d’autres sites internet ou d’autres ressources
            disponibles sur Internet. SP-HESS ne dispose d'aucun moyen pour contrôler les sites en connexion avec ses
            sites
            internet. SP-HESS ne répond pas de la disponibilité de tels sites et sources externes, ni ne la garantit.
            Elle
            ne
            peut être tenue pour responsable de tout dommage, de quelque nature que ce soit, résultant du contenu de ces
            sites
            ou sources externes.<br>
        </div>

        <div>
            <span>Éditeur du Site :</span><br>
            <ul>
                <li>Nom de l'Organisation : SP-HESS</li>
                <li>Forme juridique : Association</li>
                <li>Adresse du siège : 47 Rue de la Sinne, Mulhouse 68100</li>
                <li>Téléphone : 06 01 02 03 04</li>
                <li>E-mail : contact@sp-hess.fr</li>
                <li>Directeur de la publication : BIHRY Guillaume, REITZER Thibaud, BLASER Marvin</li>
            </ul><br>
        </div>


        <div>
            <span>Hébergement :</span><br>
            <ul>
                <li>Nom de l'hébergeur : WinSCP</li>
                <li>Adresse de l'hébergeur : 61 rue Albert Camus, Mulhouse 68100</li>
                <li>Téléphone de l'hébergeur : 03 89 33 74 00</li>
            </ul>
        </div>

    </div>

    <a class="back" href="index.php?action=signup">Retour</a>

</section>

<?php


$contenu = ob_get_clean();
$footer = "Sp-Hess";
require "vue/gabarit.php";