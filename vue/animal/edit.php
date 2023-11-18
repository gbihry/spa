<?php
$title = TITREONGLET;
$header = NOMSITE;
$titre = "Modifier animal";
$menu = MENU;

ob_start();

if(isset($_SESSION['USER'])){
    ?>
    <form action=<?=$_SERVER['PHP_SELF']."?action=modifierAnimal&&idAnimal=".$_GET['idAnimal'].""?> method="POST">
        <div class="form_elt">
            <label for="">
                <span>Nom</span>
                <input type="text" name="nom" value="<?= $animal['nom'] ?>" class="texte" id="" placeholder="indiquez nom">
            </label>
        </div>
        <div class="form_elt">
            <label for="">
                <span>Age</span>
                <input type="number" name="age" value="<?= $animal['age'] ?>" class="texte" id="" placeholder="indiquez age">
            </label>
        </div>
        <div class="form_elt">
            <label for="">
                <span>Taille</span>
                <input type="text" name="taille" value="<?= $animal['taille'] ?>" class="texte" id="" placeholder="indiquez taille">
            </label>
        </div>
        <div class="form_elt">
            <label for="">
                <span>Poid</span>
                <input type="text" name="poid" value="<?= $animal['poid'] ?>" class="texte" id="" placeholder="indiquez poid">
            </label>
        </div>
        <div class="form_elt">
            <label for="">
                <span>Handicape ?</span>
                <input type="radio" id="contactChoice1" <?= $animal['handicape'] == 1 ? "checked" : "" ?> name="handicape" value="1"/>
                <label for="contactChoice1">Oui</label>

                <input type="radio" id="contactChoice2" <?= $animal['handicape'] == 0 ? "checked" : "" ?> name="handicape" value="0"/>
                <label for="contactChoice2">Non</label>
            </label>
        </div>
        <div class="form_elt">
            <label for="">
                <span>Type</span>
                <select name="type" id="pet-select">   
                    <?php
                        foreach($types as $type){
                            $animal['id_type'] == $type['id_type'] ? $verif = "selected" : $verif = "";

                            echo("<option value=".$type['id_type']." ".$verif.">".$type['libelle']."</option>");
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
                        foreach($AllSPA as $spa){
                            $animal['id_spa'] == $spa['id_spa'] ? $verif = "selected" : $verif = "";

                            echo("<option value=".$spa['id_spa']." ".$verif.">".$spa['nom']."</option>");
                        }
                    ?> 
                </select>
            </label>
        </div>
        <input type="submit" class="valid" name="ok" value="valider">
    </form>

    <?php
}

$contenu = ob_get_clean();
$footer = "&copy; SAE 3D01";
require "vue/gabarit.php";