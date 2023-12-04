<?php
$title = TITREONGLET;
$header = NOMSITE;
$titre = "Blogs";

ob_start();
?>
    <?php
        if (isset($_SESSION['ROLE']) && $_SESSION['ROLE'] == "ADMIN"){
            echo("<a href='index.php?action=ajouterBlog'>Créer blog</a>");
        }
    ?>
    <div class="blogs">
        <?php
        foreach($blogs as $blog){
            $dateCreation = $ObjectBlog->getDateTime($blog['dateCreation']);
            if ($blog['dateModification'] != null){
                $dateModification = $ObjectBlog->getDateTime($blog['dateModification']);
            }
            ?>
            <div class=""><?php
                if (isset($_SESSION['ROLE']) && $_SESSION['ROLE'] == "ADMIN") {
                    ?>
                    <a onclick="modalVerif(this, `<?=$blog['titre']?>`, 'blog', <?=$blog['id_blog']?>)">Supprimer</a>
                    <a href="index.php?action=modifierBlog&&idBlog=<?=$blog['id_blog']?>">Modifier</a>
                    <?php
                }
                ?>

                <p>Titre : <?= $blog['titre'] ?></p>
                <p>Sous titre : <?= $blog['sousTitre'] ?></p>
                <img src="photoBlog/<?= $blog['image'] ?>" alt="">
                <p>Fait le <?= $dateCreation[0] ?> à <?= $dateCreation[1] ?> </p>
                <p><?= isset($dateModification) ? "Modifié le " . $dateModification[0] . " à " . $dateModification[1] : "" ?></p>
                <a href="index.php?action=blog&&idBlog=<?= $blog['id_blog'] ?>">Voir le blog</a>
            </div>
            <?php
        }
        ?>
    </div>
<?php
$contenu = ob_get_clean();
$footer = "&copy; SAE 3D01";
require "vue/gabarit.php";