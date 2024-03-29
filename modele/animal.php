<?php

require_once "modele/modele.php";

class Animal extends database {

    public function getAnimals(){
        $req = ' 
        SELECT animal.id_animal, animal.nom, age, taille, poid, handicape, dateArrivee, type.libelle AS "type", spa.nom AS "spaNom", 
               (SELECT uniqid_img FROM image WHERE animal.id_animal = image.id_animal AND image.ordre = 1 LIMIT 1 ) AS nomImg
        FROM animal 
        JOIN type ON animal.id_type = type.id_type
        JOIN spa ON animal.id_spa = spa.id_spa
        ';
        $res = $this->execReq($req);

        return $res;
    }

    public function getAnimalsHome(){
        $req = ' 
        SELECT animal.id_animal, animal.nom, age, taille, poid, handicape, dateArrivee, type.libelle AS "type", spa.nom AS "spaNom", uniqid_img AS "nomImg", image.ordre
        FROM `animal` 
        JOIN type ON animal.id_type = type.id_type
        JOIN spa ON animal.id_spa = spa.id_spa
        JOIN image on animal.id_animal = image.id_animal
        WHERE image.ordre = 1
        ORDER BY dateArrivee DESC
        LIMIT 3
        ';
        $res = $this->execReq($req);

        return $res;
    }

    public function getAnimal($idAnimal){
        $req = ' 
        SELECT id_animal, animal.nom, age, taille, poid, handicape,dateArrivee, spa.id_spa, type.id_type
        FROM `animal` 
        JOIN type ON animal.id_type = type.id_type
        JOIN spa ON animal.id_spa = spa.id_spa
        WHERE animal.id_animal = ?
        ';
        $res = $this->execReqPrep($req, array($idAnimal))[0];

        return $res;
    }

    public function getImagesAnimal($idAnimal){
        $req = ' 
        SELECT id_image,uniqid_img AS "nomImg", ordre
        FROM `image` 
        JOIN animal ON image.id_animal = animal.id_animal
        WHERE image.id_animal = ?
        ORDER BY ordre
        ';
        $res = $this->execReqPrep($req, array($idAnimal));

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

    public function addImage($idAnimal){
        // Test s'il n'y a pas d'erreur
        if (!$_FILES['photoAnimal']['tmp_name']){
            throw new Exception("Pas d'image");
        }
        if (!$_FILES['photoAnimal']['error'] == 0)
        {
            throw new Exception("Erreur de transfert");
        }
        // Test si la taille du fichier uploadé est conforme
        if (!$_FILES['photoAnimal']['size'] >= 5000000)
        {
            throw new Exception("Fichier trop volumineux");
        }

        // Test si l'extension du fichier uploadé est autorisée
        $infosfichier = new SplFileInfo($_FILES['photoAnimal']['name']);
        $extension_upload = $infosfichier->getExtension();
        $extensions_autorisees = array('jpg', 'png');
        $dir = dirname($_SERVER['SCRIPT_FILENAME']);
        if (!in_array($extension_upload, $extensions_autorisees))
        {
            throw new Exception("Mauvaise extension");
        }
        $uniqid = uniqid();
        $nomFichier = $uniqid.".".$extension_upload;
        // Stockage définitif du fichier photo dans le dossier uploads
        if (is_dir($dir."/photoAnimal")){
            move_uploaded_file($_FILES['photoAnimal']['tmp_name'], "photoAnimal/".$nomFichier);
        }else{
            mkdir($dir.'/photoAnimal');
        }

        $allImage = $this->getImagesAnimal($idAnimal);

        $ordre = 1;
        
        foreach($allImage as $image){
            $ordre += 1;
        }
        if($allImage[0]['nomImg'] == "default.jpg"){
            $req = ' 
                UPDATE image 
                SET uniqid_img = ?
                WHERE image.id_animal = ?
            ';

            $res = $this->execReqPrep($req, array($nomFichier, $idAnimal));
        }else{
            $req = ' 
            INSERT INTO
            image
            (uniqid_img, ordre, id_animal)
            VALUES (?, ?, ?)
            ';

            $res = $this->execReqPrep($req, array($nomFichier, $ordre, $idAnimal));
        }
        return $res;
    }



    public function createAnimal($nom, $age, $taille, $poid, $handicape, $idSPA, $idType){
        // Test s'il n'y a pas d'erreur
        $nomFichier = "default.jpg";
        $dateArrivee = date("Y-m-d H:i:s");
        if ($_FILES['photoAnimal']['tmp_name']) {
            if (!$_FILES['photoAnimal']['error'] == 0) {
                throw new Exception("Erreur de transfert");
            }
            // Test si la taille du fichier uploadé est conforme
            if (!$_FILES['photoAnimal']['size'] >= 5000000) {
                throw new Exception("Fichier trop volumineux");
            }

            // Test si l'extension du fichier uploadé est autorisée
            $infosfichier = new SplFileInfo($_FILES['photoAnimal']['name']);
            $extension_upload = $infosfichier->getExtension();
            $extensions_autorisees = array('jpg', 'png');
            $dir = dirname($_SERVER['SCRIPT_FILENAME']);
            if (!in_array($extension_upload, $extensions_autorisees)) {
                throw new Exception("Mauvaise extension");
            }
            $uniqid = uniqid();
            $nomFichier = $uniqid . "." . $extension_upload;
            // Stockage définitif du fichier photo dans le dossier uploads
            if (is_dir($dir . "/photoAnimal")) {
                move_uploaded_file($_FILES['photoAnimal']['tmp_name'], "photoAnimal/" . $nomFichier);
            } else {
                mkdir($dir . '/photoAnimal');
            }
        }
        
        $req = ' 
        INSERT INTO
        animal
        (nom, age, taille, poid, handicape, dateArrivee, id_spa, id_type)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ';
        $res = $this->execReqPrep($req, array($nom, $age, $taille, $poid, $handicape, $dateArrivee, $idSPA, $idType));

        $req = ' 
        SELECT max(id_animal) as "idAnimal"
        FROM animal
        ';
        $idAnimal = $this->execReq($req)[0]["idAnimal"];

        $req = ' 
        INSERT INTO
        image
        (uniqid_img, ordre, id_animal)
        VALUES (?, 1, ?)
        ';
        $res = $this->execReqPrep($req, array($nomFichier, $idAnimal));

        return $res;
    }

    public function getFileName($idAnimal){
        $req = ' 
        SELECT uniqid_img AS "nomImg"
        FROM `image` 
        WHERE image.id_animal = ?
        ';

        $res = $this->execReqPrep($req, array($idAnimal))[0];

        return $res;
    }

    public function getFileNameByIdImg($idImage){
        $req = ' 
        SELECT uniqid_img AS "nomImg"
        FROM `image` 
        WHERE image.id_image = ?
        ';

        $res = $this->execReqPrep($req, array($idImage))[0];

        return $res;
    }

    public function removeImage($idImage, $idAnimal){ 
        $allImg = $this->getImagesAnimal($idAnimal);
        $nomImg = $this->getFileNameByIdImg($idImage)['nomImg'];

        if ($nomImg != "default.jpg"){
            unlink("photoAnimal/".$nomImg);
        }

        if (count($allImg) == 1){
            $req = ' 
            UPDATE image
            SET uniqid_img = "default.jpg"
            WHERE image.id_image = ?
            ';
        }else{
            $req = ' 
            DELETE 
            FROM image
            WHERE image.id_image = ?
            ';
        }
        

        $res = $this->execReqPrep($req, array($idImage));
    }

    public function removeAllImageAnimal($idAnimal){ 
        $allImages = $this->getImagesAnimal($idAnimal);

        foreach($allImages as $image){
            if ($image['nomImg'] != "default.jpg"){
                unlink("photoAnimal/".$image['nomImg']);
            }
        } 
        $req = ' 
            DELETE 
            FROM image
            WHERE image.id_animal = ?
            ';
            
        $res = $this->execReqPrep($req, array($idAnimal));
    }


    public function getAllAnimalByType($idType){ 
        $req = ' 
            SELECT *
            FROM animal
            JOIN type ON animal.id_type = type.id_type
            WHERE animal.id_type = ?
        ';
            
        $res = $this->execReqPrep($req, array($idType));
    
        return $res;
    }

    public function getAllAnimalBySPA($idSPA){ 
        $req = ' 
            SELECT *
            FROM animal
            JOIN spa ON animal.id_spa = spa.id_spa
            WHERE animal.id_spa = ?
        ';
            
        $res = $this->execReqPrep($req, array($idSPA));
    
        return $res;
    }

    public function removeAllAnimalByType($idType){
        $allAnimals = $this->getAllAnimalByType($idType);
        if ($allAnimals){
            foreach ($allAnimals as $animal){
                $this->removeAllImageAnimal($animal['id_animal']);
    
                $req = ' 
                    DELETE 
                    FROM animal
                    WHERE animal.id_animal = ?
                ';
            
                $res = $this->execReqPrep($req, array($animal['id_animal']));
            }
            return $res;
        }
    }

    public function removeAllAnimalBySPA($idSPA){
        $allAnimals = $this->getAllAnimalBySPA($idSPA);
        if ($allAnimals){
            foreach ($allAnimals as $animal){
                $this->removeAllImageAnimal($animal['id_animal']);
                
                $req = ' 
                    DELETE 
                    FROM animal
                    WHERE animal.id_animal = ?
                ';
            
                $res = $this->execReqPrep($req, array($animal['id_animal']));
            }
            return $res;
        }
    }

    public function removeAnimalFavoris($idAnimal){

        $req = ' 
        DELETE 
        FROM favoris
        WHERE favoris.id_animal = ?
        ';
        
        $res = $this->execReqPrep($req, array($idAnimal));

        return $res;
    }

    public function removeAnimal($idAnimal){
        $this->removeAllImageAnimal($idAnimal);
        $this->removeAnimalFavoris($idAnimal);

        $req = ' 
        DELETE 
        FROM animal
        WHERE animal.id_animal = ?
        ';
        
        $res = $this->execReqPrep($req, array($idAnimal));

        return $res;
    }

    public function editAnimal($nom, $age, $taille, $poid, $handicape, $spa, $type, $idAnimal){
        $dateArrivee = $this->getAnimal($idAnimal)['dateArrivee'];
        $req = ' 
        UPDATE animal 
        SET nom = ?, age = ?, taille = ?, poid = ?, handicape = ?, dateArrivee = ?, id_spa = ?, id_type = ?
        WHERE animal.id_animal = ?
        ';
        $res = $this->execReqPrep($req, array($nom, $age, $taille, $poid, $handicape, $dateArrivee, $spa, $type, $idAnimal));
        
        return $res;
    }

    public function updateRole($role, $idImage){
        $req = ' 
        UPDATE image
        SET ordre = ?
        WHERE image.id_image = ?
        ';
        $res = $this->execReqPrep($req, array($role, $idImage));
        
        return $res;
    }

    // FILTER //

    public function filter($type, $value){
        $req = ' 
        SELECT animal.id_animal, animal.nom, age, taille, poid, handicape, type.libelle AS "type", spa.nom AS "spaNom", uniqid_img AS "nomImg", image.ordre
        FROM `animal` 
        JOIN type ON animal.id_type = type.id_type
        JOIN spa ON animal.id_spa = spa.id_spa
        JOIN image on animal.id_animal = image.id_animal
        WHERE image.ordre = 1
        ';
        switch($type){
            case "type":
                $req = $req . 'AND animal.id_type = ?';
                break;
            case "spa":
                $req = $req .  'AND animal.id_spa = ?';
                break;
            case "localisation":
                $req = $req . 'AND spa.localisation = ?';
                break;
        }

        $res = $this->execReqPrep($req, array($value));

        return $res;
    }

    public function getDate($date){
        $dateArrivee = explode("-",$date);
        $year = $dateArrivee[0];
        $month = $dateArrivee[1];
        $day = $dateArrivee[2];
        $dateArrivee = $day . "/" . $month . "/" . $year;

        return $dateArrivee;
    }
}