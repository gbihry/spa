<?php
$title = TITREONGLET;
$header = NOMSITE;
$titre = "";

ob_start();

if (isset($_SESSION['USER'])) {
    ?>

    <section class="edit_page_admin_section">
        <h1>Créer un type</h1>
        <form action=<?= $_SERVER['PHP_SELF'] . "?action=ajouterType" ?> method="POST">
            <div class="form_elt">
                <label for="">
                    <span>Libelle</span>
                    <input type="text" name="libelle" class="texte" id="" placeholder="indiquez nom type" required>
                </label>
            </div>
            <input type="submit" class="valid valid_button" name="ok" value="valider">
        </form>
    </section>
    <?php
}

$contenu = ob_get_clean();
$footer = "Sp-Hess";
require "vue/gabarit.php";