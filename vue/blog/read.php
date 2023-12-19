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
        <div class="blogs">
            <?php
            foreach ($blogs as $blog) {
                $dateCreation = $ObjectBlog->getDateTime($blog['dateCreation']);
                if ($blog['dateModification'] != null) {
                    $dateModification = $ObjectBlog->getDateTime($blog['dateModification']);
                }
                ?>
                <div>
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
                                <span>
                                    <?= $dateCreation[0] ?>
                                </span> à
                                <span>
                                    <?= $dateCreation[1] ?>
                                </span>
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
        <?php
        if (isset($_SESSION['ROLE']) && $_SESSION['ROLE'] == "ADMIN") {
            ?>
            <div class="admin_link_blog">
                <a class="supp_blog"
                    onclick="modalVerif(this, `<?= $blog['titre'] ?>`, 'blog', <?= $blog['id_blog'] ?>)">Supprimer</a>
                <a class="edit_blog" href="index.php?action=modifierBlog&&idBlog=<?= $blog['id_blog'] ?>">Modifier</a>
            </div>
            <?php
        }
        ?>
    </section>
    <?php
    if ($_SESSION['ROLE'] == "ADMIN")
        echo (' <a class="add_blog" href="index.php?action=ajouterBlog">
        
            <svg width="41" height="43" viewBox="0 0 41 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="Group 8">
                    <ellipse id="Ellipse 12" cx="20.2741" cy="21.4003" rx="20.2741" ry="21.4003"
                        transform="matrix(0.999988 -0.00492757 0.00396583 0.999992 0 0.199768)"
                        fill="#F7567C" />
                    <g id="&#240;&#159;&#166;&#134; icon &#34;chevron right&#34;">
                        <path id="Vector"
                            d="M18.6747 10.3827L14.6528 14.6639L21.4095 21.729L14.7063 28.8642L18.7603 33.1033L29.4855 21.6869L18.6747 10.3827Z"
                            fill="white" />
                    </g>
                </g>
            </svg>
            <p>Ajouter un blog</p>
        
    </a>');
    ?>
</section>

<?php
$contenu = ob_get_clean();
$footer = "Sp-Hess";
require "vue/gabarit.php";