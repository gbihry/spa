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
            $dateTime = $blog['dateCreation'];

            $date = explode("-", explode(" ", $dateTime)[0]);
            $year = $date[0];
            $month = $date[1];
            $day = $date[2];
            $date = $day . "/" . $month . "/" . $year;

            $time = explode(":", explode(" ", $dateTime)[1]);
            $hours = $time[0];
            $minutes = $time[1];
            $seconds = $time[2];
            $time = $hours . "h" . $minutes . "m" . $seconds . "s";

            ?>
            <div class="">
                <p>Titre : <?= $blog['titre'] ?></p>
                <p>Sous titre : <?= $blog['sousTitre'] ?></p>
                <img src="photoBlog/<?= $blog['image'] ?>" alt="">
                <p>Fait le <?= $date ?> à <?= $time ?> </p>
                <?php
                    if (isset($_SESSION['ROLE']) && $_SESSION['ROLE'] == "ADMIN") {
                ?>
                        <a onclick="modalVerif(this, '<?=$blog['titre']?>', 'blog', <?=$blog['id_blog']?>)">Supprimer</a>
                <?php
                    }
                ?>
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