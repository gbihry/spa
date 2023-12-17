<?php
$title = TITREONGLET;
$header = NOMSITE;
$titre = "Modifier blog";

ob_start();

if(isset($_SESSION['USER'])){
    ?>
    <form enctype="multipart/form-data" action=<?=$_SERVER['PHP_SELF']."?action=modifierBlog&&idBlog=".$_GET['idBlog']?> method="POST">
        <div class="form_elt">
            <label for="">
                <span>Titre</span>
                <input type="text" name="titre" class="texte" id="" placeholder="Titre" value="<?=$blog['titre']?>" required>
            </label>
        </div>
        <div class="form_elt">
            <label for="">
                <span>Sous titre</span>
                <input type="text" name="sousTitre" class="texte" id="" placeholder="Sous titre" value="<?=$blog['sousTitre']?>" required>
            </label>
        </div>
        <p>Pour mettre du texte en gras : mettre votre partie en gras entre deux étoiles ( ** ), exemple : **je suis en gras**</p>
        <p>Pour faire un autre paragraphe : mettre un slash à la fin de votre ligne ( / ), exemple : ce texte sera la fin de mon paragraphe /</p>
        <div class="form_elt">
            <label for="">
                <span>Contenu</span>
                <textarea name="contenu" class="texte" id="" placeholder="Le contenu de votre blog" rows="5" cols="33" required><?=$blog['contenu']?></textarea>
            </label>
        </div>
        <img src="photoBlog/<?=$blog['image']?>" alt="">
        <div class="form_elt">
            <input type="hidden" name="MAX_FILE_SIZE" value="5000000">
            <input type="file" class="texte" name="photoBlog">
        </div>
        <input type="submit" class="valid" name="ok" value="valider">
    </form>

    <?php
}

$contenu = ob_get_clean();
$footer = "Sp-Hess";
require "vue/gabarit.php";