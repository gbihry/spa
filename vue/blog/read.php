<?php
$title = TITREONGLET;
$header = NOMSITE;
$titre = "";

ob_start();
?>

<section class="blog_section">
    <img class="blog_background" src="./assets/blog_img/blog_background.png" alt="">

    <div class="hero">
        <h1>Découvrez nos blogs sur la vie animal</h1>
        <span>Des informations sur le refuge ou plus généralement sur les SPA de France</span>
    </div>

    <section class="blog_read">
        <?php
        if (isset($_SESSION['ROLE']) && $_SESSION['ROLE'] == "ADMIN") {
            echo ("<a href='index.php?action=ajouterBlog'>Créer blog</a>");
        }
        ?>
        <div class="blogs">
            <?php
            foreach ($blogs as $blog) {
                $dateCreation = $ObjectBlog->getDateTime($blog['dateCreation']);
                if ($blog['dateModification'] != null) {
                    $dateModification = $ObjectBlog->getDateTime($blog['dateModification']);
                }
                ?>
                <div class="">
                    <?php
                    if (isset($_SESSION['ROLE']) && $_SESSION['ROLE'] == "ADMIN") {
                        ?>
                        <a onclick="modalVerif(this, `<?= $blog['titre'] ?>`, 'blog', <?= $blog['id_blog'] ?>)">Supprimer</a>
                        <a href="index.php?action=modifierBlog&&idBlog=<?= $blog['id_blog'] ?>">Modifier</a>
                        <?php
                    }
                    ?>

                    <h2>
                        <?= $blog['titre'] ?>
                    </h2>
                    <h3>
                        <?= $blog['sousTitre'] ?>
                    </h3>
                    <div class="blog_info">
                        <img src="photoBlog/<?= $blog['image'] ?>" alt="">
                        <div class="blog_info_text">
                            <p>Fait le
                              <span><?= $dateCreation[0] ?></span> à
                               <span><?= $dateCreation[1] ?></span>
                            </p>
                            <p>
                                <?= isset($dateModification) ? "Modifié le " . $dateModification[0] . " à " . $dateModification[1] : "" ?>
                            </p>
                            <a href="index.php?action=blog&&idBlog=<?= $blog['id_blog'] ?>">Voir le blog</a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </section>
</section>
<?php
$contenu = ob_get_clean();
$footer = "Sp-Hess";
require "vue/gabarit.php";