
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link href="style/style.css" rel="stylesheet">
</head>
<body>
    <header>
        <div><a href="index.php"><h1><?= $header ?></h1></a></div>
        <div class="menu">
            <?php
            echo($menu);
            if(!isset($_SESSION['user'])){
                echo('<a class="lien" href="index.php?action=login">Connexion</a>');
                echo('<a class="lien" href="index.php?action=signup">S\'inscrire</a>');
            }else{
                echo('<a class="lien" href="index.php?action=admin">Administration</a>');
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