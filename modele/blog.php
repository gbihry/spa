<?php
require_once "modele/modele.php";
class Blog extends database
{
    public function getBlogs(){
        $req = ' 
           SELECT *
           FROM blog
           ';
        $res = $this->execReq($req);

        return $res;
    }

    public function getBlogsHome(){
        $req = ' 
           SELECT *
           FROM blog
           ORDER BY dateCreation
           LIMIT 3
           ';
        $res = $this->execReq($req);

        return $res;
    }

    public function getBlog($idBlog){
        $req = ' 
           SELECT *
           FROM blog
           WHERE id_blog = ?
           ';
        $res = $this->execReqPrep($req, array($idBlog))[0];

        return $res;
    }

    public function removeBlog($idBlog){
        $nomImg = $this->getBlog($idBlog)['image'];

        if ($nomImg != "default.jpg"){
            unlink("photoBlog/".$nomImg);
        }

        $req = '
            DELETE 
            FROM blog
            WHERE id_blog = ?
        ';

        $res = $this->execReqPrep($req, array($idBlog));

        return $res;
    }

    public function editBlog($titre, $sousTitre, $contenu, $idBlog){
        $dateCreation = $this->getBlog($idBlog)['dateCreation'];
        $dateModification = date("Y-m-d H:i:s");

        $nomFichier = $this->getBlog($idBlog)['image'];

        if ($_FILES['photoBlog']['tmp_name'] && $nomFichier != "default.jpg"){
            unlink('photoBlog/' . $nomFichier);
        }

        if ($_FILES['photoBlog']['tmp_name']) {
            if (!$_FILES['photoBlog']['error'] == 0) {
                throw new Exception("Erreur de transfert");
            }
            // Test si la taille du fichier uploadé est conforme
            if (!$_FILES['photoBlog']['size'] >= 5000000) {
                throw new Exception("Fichier trop volumineux");
            }

            // Test si l'extension du fichier uploadé est autorisée
            $infosfichier = new SplFileInfo($_FILES['photoBlog']['name']);
            $extension_upload = $infosfichier->getExtension();
            $extensions_autorisees = array('jpg', 'png');
            $dir = dirname($_SERVER['SCRIPT_FILENAME']);
            if (!in_array($extension_upload, $extensions_autorisees)) {
                throw new Exception("Mauvaise extension");
            }
            $uniqid = uniqid();
            $nomFichier = $uniqid . "." . $extension_upload;
            // Stockage définitif du fichier photo dans le dossier uploads
            if (is_dir($dir . "/photoBlog")) {
                move_uploaded_file($_FILES['photoBlog']['tmp_name'], "photoBlog/" . $nomFichier);
            } else {
                mkdir($dir . '/photoBlog');
            }
        }

        $req = ' 
        UPDATE blog 
        SET titre = ?, sousTitre = ?, contenu = ?, image = ?, dateCreation = ?, dateModification = ?
        WHERE blog.id_blog = ?
        ';

        $res = $this->execReqPrep($req, array($titre, $sousTitre, $contenu, $nomFichier, $dateCreation, $dateModification, $idBlog));

        return $res;

    }

    public function createBlog($titre, $sousTitre, $contenu){
        $nomFichier = "default.jpg";
        $dateCreation = date("Y-m-d H:i:s");
        if ($_FILES['photoBlog']['tmp_name']) {
            if (!$_FILES['photoBlog']['error'] == 0) {
                throw new Exception("Erreur de transfert");
            }
            // Test si la taille du fichier uploadé est conforme
            if (!$_FILES['photoBlog']['size'] >= 5000000) {
                throw new Exception("Fichier trop volumineux");
            }

            // Test si l'extension du fichier uploadé est autorisée
            $infosfichier = new SplFileInfo($_FILES['photoBlog']['name']);
            $extension_upload = $infosfichier->getExtension();
            $extensions_autorisees = array('jpg', 'png');
            $dir = dirname($_SERVER['SCRIPT_FILENAME']);
            if (!in_array($extension_upload, $extensions_autorisees)) {
                throw new Exception("Mauvaise extension");
            }
            $uniqid = uniqid();
            $nomFichier = $uniqid . "." . $extension_upload;
            // Stockage définitif du fichier photo dans le dossier uploads
            if (is_dir($dir . "/photoBlog")) {
                move_uploaded_file($_FILES['photoBlog']['tmp_name'], "photoBlog/" . $nomFichier);
            } else {
                mkdir($dir . '/photoBlog');
            }
        }

        $req = ' 
        INSERT INTO
        blog
        (titre, sousTitre, contenu, image, dateCreation)
        VALUES (?, ?, ?, ?, ?)
        ';
        $res = $this->execReqPrep($req, array($titre, $sousTitre, $contenu, $nomFichier, $dateCreation));

        return $res;
    }

    public function getDateTime($dateAction){

        $date = explode("-", explode(" ", $dateAction)[0]);
        $year = $date[0];
        $month = $date[1];
        $day = $date[2];
        $date = $day . "/" . $month . "/" . $year;

        $time = explode(":", explode(" ", $dateAction)[1]);
        $hours = $time[0];
        $minutes = $time[1];
        $seconds = $time[2];
        $time = $hours . "h" . $minutes . "m" . $seconds . "s";

        return [$date, $time];
    }
}