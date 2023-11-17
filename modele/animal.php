<?php

require_once "modele/modele.php";

class Animal extends database {

    public function getAnimaux(){
        $req = ' 
        SELECT * 
        FROM `animal` 
        ';
        $res = $this->execReq($req);

        return $res;
    }

    public function getAnimal($idAnimal){
        $req = ' 
        SELECT * 
        FROM `animal` 
        WHERE animal.id_animal = ?
        ';
        $res = $this->execReqPrep($req, array($idAnimal))[0];

        return $res;
    }

    public function createAnimal($libelle){
        $req = ' 
        INSERT INTO
        type
        VALUES ("", ?)
        ';
        $res = $this->execReqPrep($req, array($libelle));

        return $res;
    }

    public function removeAnimal($idAnimal){
        $req = ' 
        DELETE 
        FROM type
        WHERE type.id_type = ?
        ';
        $res = $this->execReqPrep($req, array($idAnimal));

        return $res;
    }

    public function editAnimal($libelle, $idAnimal){
        $req = ' 
        UPDATE type 
        SET libelle = ?
        WHERE type.id_type = ?
        ';
        $res = $this->execReqPrep($req, array($libelle, $idAnimal));
        
        return $res;
    }
}