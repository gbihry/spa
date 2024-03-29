<?php
$title = TITREONGLET;
$header = NOMSITE;
$titre = "";

ob_start();

if (isset($_SESSION['USER'])) {
    if (isset($verifChamp) && $verifChamp == false) {
        echo ('<p class="error">Veuillez remplir tous les champs</p>');
    }
    ?>

    <section class="edit_page_admin_section">
        <h1>Créer animal</h1>
        <form enctype="multipart/form-data" class="create_animals" action="index.php?action=ajouterAnimal" method="POST">
            <div class="form_elt">
                <label for="">
                    <span>Nom</span>
                    <input type="text" name="nom" class="texte" id="" placeholder="indiquez nom" required>
                </label>
            </div>
            <div class="form_elt">
                <label for="">
                    <span>Age</span>
                    <input type="number" name="age" min="0" class="texte" id="" placeholder="indiquez age" required>
                </label>
            </div>
            <div class="form_elt">
                <label for="">
                    <span>Taille (cm)</span>
                    <input type="number" name="taille" min="0" class="texte" id="" placeholder="indiquez taille" required>
                </label>
            </div>
            <div class="form_elt">
                <label for="">
                    <span>Poids (kg)</span>
                    <input type="number" name="poid" min="0" class="texte" id="" placeholder="indiquez poid" required>
                </label>
            </div>
            <div class="form_elt">
                <label for="">
                    <span>Handicap ?</span>
                    <input type="radio" id="contactChoice1" name="handicape" value="1" />
                    <label for="contactChoice1">Oui</label>

                    <input type="radio" id="contactChoice2" name="handicape" value="0" checked />
                    <label for="contactChoice2">Non</label>
                </label>
            </div>
            <div class="form_elt">
                <label for="">
                    <span>Type</span>
                    <select name="type" id="pet-select">
                        <?php
                        foreach ($types as $type) {
                            echo ("<option value=" . $type['id_type'] . ">" . $type['libelle'] . "</option>");
                        }
                        ?>
                    </select>
                </label>
            </div>
            <div class="form_elt">
                <label for="">
                    <span>SPA</span>
                    <select name="spa" id="pet-select">
                        <?php
                        foreach ($AllSPA as $spa) {
                            echo ("<option value=" . $spa['id_spa'] . ">" . $spa['nom'] . "</option>");
                        }
                        ?>
                    </select>
                </label>
            </div>
            <div class="form_elt">
                <input type="hidden" name="MAX_FILE_SIZE" value="5000000">
                <input type="file" class="files" class="texte" name="photoAnimal">
            </div>

            <input type="submit" class="valid valid_button" name="ok" value="Valider">
        </form>
    </section>

    <?php
}

$contenu = ob_get_clean();
$footer = "Sp-Hess";
require "vue/gabarit.php";