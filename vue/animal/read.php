<?php
$title = TITREONGLET;
$header = NOMSITE;
$titre = "Animaux";
$menu = MENU;

ob_start();
?>
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
                    </div>
                </div>
            <?php
        }
        ?>
    </div>
<?php
$contenu = ob_get_clean();
$footer = "&copy; SAE 3D01";
require "vue/gabarit.php";