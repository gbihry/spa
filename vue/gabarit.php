
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link href="style/style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f460dffe13.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div><a href="index.php"><h1><?= $header ?></h1></a></div>
        <div class="menu">
            <?php
            if(!isset($_SESSION['USER'])){
                echo('<a class="lien" href="index.php?action=login">Connexion</a>');
                echo('<a class="lien" href="index.php?action=signup">S\'inscrire</a>');
                echo('<a class="lien" href="index.php?action=animaux">Voir animaux</a>');
            }else{
                if ($_SESSION['ROLE'] == "ADMIN"){
                    echo('<a class="lien" href="index.php?action=admin">Administration</a>');
                }
                echo('<a class="lien" href="index.php?action=animaux">Voir animaux</a>');
                echo('<a class="lien" href="index.php?action=voirFavoris">Voir favoris</a>');
                echo('<a class="lien" href="index.php?action=profil"><i class="fa-solid fa-user"></i></a>');
                echo('<a class="lien" href="index.php?action=delog">Quitter</a>');
            }
            ?>
        </div>
    </header>
    <main>
        <h2><?= $titre ?></h2>
        <?= $contenu ?>
    </main>
    <footer>
        <?= $footer ?>
    </footer>
</body>
</html>