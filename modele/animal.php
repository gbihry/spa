<?php

require_once "modele/modele.php";

class Animal extends database {

    public function getAnimals(){
        $req = ' 
        SELECT id_animal, animal.nom, age, taille, poid, handicape, type.libelle AS "type", spa.nom AS "spaNom"
        FROM `animal` 
        JOIN type ON animal.id_type = type.id_type
        JOIN spa ON animal.id_spa = spa.id_spa
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

    public function createAnimal($nom, $age, $taille, $poid, $handicape, $idSPA, $idType){
        $req = ' 
        INSERT INTO
        animal
        VALUES ("", ?, ?, ?, ?, ?, ?, ?)
        ';
        $res = $this->execReqPrep($req, array($nom, $age, $taille, $poid, $handicape, $idSPA, $idType));

        return $res;
    }

    public function removeAnimal($idAnimal){
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