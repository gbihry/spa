<?php
$title = TITREONGLET;
$header = NOMSITE;
$titre = "";

ob_start();

if (isset($_SESSION['USER'])) {
    ?>
    <div class="background_user_interface"></div>
    <section class="edit_page_admin_section">
        <h1>Modifier animal</h1>
        <form action=<?= $_SERVER['PHP_SELF'] . "?action=modifierAnimal&&idAnimal=" . $_GET['idAnimal'] . "" ?> method="POST">
            <div class="form_elt">
                <label for="">
                    <span>Nom</span>
                    <input type="text" name="nom" value="<?= $animal['nom'] ?>" class="texte" id=""
                        placeholder="indiquez nom" required>
                </label>
            </div>
            <div class="form_elt">
                <label for="">
                    <span>Age</span>
                    <input type="number" name="age" min="0" value="<?= $animal['age'] ?>" class="texte" id=""
                        placeholder="indiquez age" required>
                </label>
            </div>
            <div class="form_elt">
                <label for="">
                    <span>Taille (cm)</span>
                    <input type="number" name="taille" min="0" value="<?= $animal['taille'] ?>" class="texte" id=""
                        placeholder="indiquez taille" required>
                </label>
            </div>
            <div class="form_elt">
                <label for="">
                    <span>Poid (kg)</span>
                    <input type="number" name="poid" min="0" value="<?= $animal['poid'] ?>" class="texte" id=""
                        placeholder="indiquez poid" required>
                </label>
            </div>
            <div class="form_elt">
                <label for="">
                    <span>Handicape ?</span>
                    <input type="radio" id="contactChoice1" <?= $animal['handicape'] == 1 ? "checked" : "" ?> name="handicape"
                        value="1" />
                    <label for="contactChoice1">Oui</label>

                    <input type="radio" id="contactChoice2" <?= $animal['handicape'] == 0 ? "checked" : "" ?> name="handicape"
                        value="0" />
                    <label for="contactChoice2">Non</label>
                </label>
            </div>
            <div class="form_elt">
                <label for="">
                    <span>Type</span>
                    <select name="type" id="pet-select">
                        <?php
                        foreach ($types as $type) {
                            $animal['id_type'] == $type['id_type'] ? $verif = "selected" : $verif = "";

                            echo ("<option value=" . $type['id_type'] . " " . $verif . ">" . $type['libelle'] . "</option>");
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
                            $animal['id_spa'] == $spa['id_spa'] ? $verif = "selected" : $verif = "";

                            echo ("<option value=" . $spa['id_spa'] . " " . $verif . ">" . $spa['nom'] . "</option>");
                        }
                        ?>
                    </select>
                </label>
            </div>
            <input type="submit" class="valid valid_button" name="ok" value="Valider informations">
        </form>
        <p>Photo :</p>
        <form action=<?= $_SERVER['PHP_SELF'] . "?action=modifierOrdre&&idAnimal=" . $_GET['idAnimal'] . "" ?> method="POST">
            <div class="editOrdre">
                <?php
                $ordre = 1;
                $max = count($AllImgAnimal);
                foreach ($AllImgAnimal as $imgAnimal) {
                    ?>
                    <div class="editImg">
                        <a
                            onclick="modalVerif(this, '<?= $type['libelle'] ?>', 'image', [<?= $_GET['idAnimal'] ?>,<?= $imgAnimal['id_image'] ?>])">Supprimer</a>
                        <img class="imgAnimal" src="photoAnimal/<?= $imgAnimal['nomImg'] ?>" alt="">
                        <input type="hidden" name="idImage<?= $ordre ?>" value="<?= $imgAnimal['id_image'] ?>">
                        <label for="">
                            <span>Ordre</span>
                            <input type="number" max=<?= $max ?> min="1" value="<?= $imgAnimal['ordre'] ?>" class="texte"
                                name="ordre<?= $ordre ?>">
                        </label>
                    </div>
                    <?php
                    $ordre++;
                }
                ?>
            </div>
            <input type="submit" class="valid valid_button" name="ok" value="Valider ordre">
        </form>

        <form action=<?= $_SERVER['PHP_SELF'] . "?action=ajouterImage&&idAnimal=" . $_GET['idAnimal'] . "" ?> method="POST"
            enctype="multipart/form-data">
            <div class="form_elt">
                <p>Ajouter photo</p>
                <input type="hidden" name="MAX_FILE_SIZE" value="5000000">
                <input type="file" class="texte" name="photoAnimal" required>
            </div>
            <input type="submit" class="valid valid_button" name="ok" value="ajouter photo">
        </form>
    </section>
    <?php
}

$contenu = ob_get_clean();
$footer = "Sp-Hess";
require "vue/gabarit.php";