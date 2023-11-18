<?php

require_once "modele/modele.php";

class Animal extends database {

    public function getAnimals(){
        $req = ' 
        SELECT animal.id_animal, animal.nom, age, taille, poid, handicape, type.libelle AS "type", spa.nom AS "spaNom"
        FROM `animal` 
        JOIN type ON animal.id_type = type.id_type
        JOIN spa ON animal.id_spa = spa.id_spa
        JOIN image on animal.id_animal = image.id_animal
        ';
        $res = $this->execReq($req);

        return $res;
    }

    public function getAnimal($idAnimal){
        $req = ' 
        SELECT id_animal, animal.nom, age, taille, poid, handicape, spa.id_spa, type.id_type
        FROM `animal` 
        JOIN type ON animal.id_type = type.id_type
        JOIN spa ON animal.id_spa = spa.id_spa
        WHERE animal.id_animal = ?
        ';
        $res = $this->execReqPrep($req, array($idAnimal))[0];

        return $res;
    }

    public function getAnimalByName($nomAnimal){
        $req = ' 
        SELECT id_animal
        FROM `animal` 
        WHERE animal.nom = ?
        ';
        $res = $this->execReqPrep($req, array($nomAnimal))[0];

        return $res;
    }

    public function createAnimal($nom, $age, $taille, $poid, $handicape, $idSPA, $idType){
        // Test s'il n'y a pas d'erreur
        $nomFichier = "default.jpg";
        if ($_FILES['photoAnimal']['tmp_name']){
            if ($_FILES['photoAnimal']['error'] == 0)
            {
                // Test si la taille du fichier uploadé est conforme
                if ($_FILES['photoAnimal']['size'] <= 5000000)
                {
                    // Test si l'extension du fichier uploadé est autorisée
                    $infosfichier = new SplFileInfo($_FILES['photoAnimal']['name']);
                    $extension_upload = $infosfichier->getExtension();
                    $extensions_autorisees = array('jpg', 'png');
                    $dir = dirname($_SERVER['SCRIPT_FILENAME']);
                    if (in_array($extension_upload, $extensions_autorisees))
                    {
                        $nomFichier = base64_encode($_FILES['photoAnimal']['name']).".".$extension_upload;
                        // Stockage définitif du fichier photo dans le dossier uploads
                        if (is_dir($dir."/photoAnimal")){
                            move_uploaded_file($_FILES['photoAnimal']['tmp_name'], "photoAnimal/".$nomFichier);
                        }else{
                            mkdir($dir.'/photoAnimal');
                        }
                    }else{
                        throw new Exception("Mauvaise extension");
                    }
                }else{
                    throw new Exception("Fichier trop volumineux");
                }
            }else {
                throw new Exception("Erreur de transfert");
            }
        }
        
        $req = ' 
        INSERT INTO
        animal
        VALUES ("", ?, ?, ?, ?, ?, ?, ?)
        ';
        $res = $this->execReqPrep($req, array($nom, $age, $taille, $poid, $handicape, $idSPA, $idType));

        $idAnimal = $this->getAnimalByName($nom)['id_animal'];

        $req = ' 
        INSERT INTO
        image
        VALUES ("", ?, 0, ?)
        ';
        $res = $this->execReqPrep($req, array($nomFichier, $idAnimal));

        return $res;
    }

    public function getFileName($idAnimal){
        $req = ' 
        SELECT base64_img AS "nomImg"
        FROM `image` 
        WHERE image.id_animal = ?
        ';

        $res = $this->execReqPrep($req, array($idAnimal))[0];

        return $res;
    }

    public function removeAnimal($idAnimal){

        $nomImg = $this->getFileName($idAnimal)['nomImg'];

        if ($nomImg != "default.jpg"){
            var_dump("test");
            unlink("photoAnimal/".$nomImg);
        }
        
        $req = ' 
        DELETE 
        FROM image
        WHERE image.id_animal = ?
        ';

        $res = $this->execReqPrep($req, array($idAnimal));

        $req = ' 
        DELETE 
        FROM animal
        WHERE animal.id_animal = ?
        ';
        $res = $this->execReqPrep($req, array($idAnimal));

        return $res;
    }

    public function editAnimal($nom, $age, $taille, $poid, $handicape, $type, $spa, $idAnimal){
        $req = ' 
        UPDATE animal 
        SET nom = ?, age = ?, taille = ?, poid = ?, handicape = ?, id_spa = ?, id_type = ?
        WHERE animal.id_animal = ?
        ';
        $res = $this->execReqPrep($req, array($nom, $age, $taille, $poid, $handicape, $spa, $type, $idAnimal));
        
        return $res;
    }

}