<?php

require_once "modele/modele.php";
require_once "modele/animal.php";
require_once "modele/favoris.php";

class Type extends database {

    public function getTypes(){
        $req = ' 
        SELECT * 
        FROM `type` 
        ';
        $res = $this->execReq($req);

        return $res;
    }

    public function getType($idType){
        $req = ' 
        SELECT libelle 
        FROM `type` 
        WHERE type.id_type = ?
        ';
        $res = $this->execReqPrep($req, array($idType))[0];

        return $res;
    }

    public function createType($libelle){
        $req = ' 
        INSERT INTO
        type
        (libelle)
        VALUES (?)
        ';
        $res = $this->execReqPrep($req, array($libelle));

        return $res;
    }

    public function removeType($idType){
        $ObjectAnimal = new Animal();
        $ObjectFavoris = new Favoris();

        $ObjectFavoris->removeAllFavorisByType($idType);
        $ObjectAnimal->removeAllAnimalByType($idType);
        
        $req = ' 
        DELETE 
        FROM type
        WHERE type.id_type = ?
        ';
        $res = $this->execReqPrep($req, array($idType));

        return $res;
        
    }

    public function editType($libelle, $idType ){
        $req = ' 
        UPDATE type 
        SET libelle = ?
        WHERE type.id_type = ?
        ';
        $res = $this->execReqPrep($req, array($libelle, $idType));

        return $res;
    }
}