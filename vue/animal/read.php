<?php
$title = TITREONGLET;
$header = NOMSITE;
$titre = "Animaux";

ob_start();

if (isset($titleTrie) && $titleTrie != null){
    echo('<h2 class="title">'.$titleTrie.'</h2>');
}else{
    echo('<h2 class="title">Tri</h2>');
}
?>
    
    <form class="trie" action=<?=$_SERVER['PHP_SELF']."?action=animaux"?> method="POST">
        <div class="form_elt">
            <label for="">
                <span>Type</span>
                <select name="type" id="pet-select">   
                    <?php
                        echo("<option value='0'>--Séléctionner type--</option>");
                        foreach($types as $type){
                            echo("<option value=".$type['id_type'].">".$type['libelle']."</option>");
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
                        echo("<option value='0'>--Séléctionner spa--</option>");
                        foreach($allSPA as $spa){
                            echo("<option value=".$spa['id_spa'].">".$spa['nom']."</option>");
                        }
                    ?> 
                </select>
            </label>
        </div>
        <div class="form_elt">
            <label for="">
                <span>Localisations</span>
                <select name="localisation" id="pet-select">   
                    <?php
                        echo("<option value='0'>--Séléctionner localisation--</option>");
                        if(isset($_SESSION['USER'])){
                            echo("<option value=".$_SESSION['LOC'].">--Dans votre ville--</option>");
                        }
                        foreach($localisations as $localisation){
                            echo("<option value=".$localisation['localisation'].">".$localisation['localisation']."</option>");
                        }
                    ?> 
                </select>
            </label>
        </div>
        <input type="submit" class="valid" name="ok" value="valider">
        <a href='index.php?action=animaux'>Enlever filtre</a>
    </form>
    <div class="animals">
        <?php
        foreach($animals as $animal){
            ?>
                <div class="card">
                    <div class="nom">
                        <h2><?= $animal['nom'] ?></h2>
                    </div>
                    <div class="age">
                        <p><?= $animal['age'] ?> ans</p>
                    </div>
                    <div class="image">
                        
                        <img src="photoAnimal/<?=$animal['nomImg']?>" alt="">
                        <?php 
                        if (isset($_SESSION['USER'])){
                            ?>
                            <a href="index.php?action=favoris&&idAnimal=<?=$animal['id_animal']?>&&idUser=<?=$_SESSION['IDUSER']?>">
                                <?php
                                    $afficher = false;
                                    foreach($favoris as $favori){
                                        if ($favori['id_animal'] == $animal['id_animal']){
                                            $afficher = true;
                                        }
                                    }
                                    if ($afficher){
                                        echo('<i class="fa-solid fa-heart"></i>');
                                    }else{
                                        echo('<i class="fa-regular fa-heart"></i>');
                                    }
                                    
                                ?>
                            </a>
                            <?php 
                        }
                        ?>
                    </div>
                    <a href="index.php?action=animal&&idAnimal=<?=$animal['id_animal']?>">détail</a>
                </div>
            
            <?php
        }
        ?>
    </div>
<?php
$contenu = ob_get_clean();
$footer = "Sp-Hess";
require "vue/gabarit.php";