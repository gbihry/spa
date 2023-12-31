<?php

require_once "modele/modele.php";
require_once "modele/animal.php";
require_once "modele/favoris.php";

class Spa extends database {

    public function getAllSPA(){
        $req = ' 
        SELECT * 
        FROM `spa` 
        ';
        $res = $this->execReq($req);

        return $res;
    }

    public function getSPA($idSpa){
        $req = ' 
        SELECT nom, localisation
        FROM `spa` 
        WHERE spa.id_spa = ?
        ';
        $res = $this->execReqPrep($req, array($idSpa))[0];

        return $res;
    }

    public function getLocalisations(){
        $req = ' 
        SELECT localisation
        FROM `spa` 
        ';
        $res = $this->execReq($req);

        return $res;
    }

    public function createSPA($nom, $localisation){
        $req = ' 
        INSERT INTO
        spa
        (nom, localisation)
        VALUES (?, ?)
        ';
        $res = $this->execReqPrep($req, array($nom, $localisation));

        return $res;
    }

    public function removeSPA($idSpa){
        $ObjectAnimal = new Animal();
        $ObjectFavoris = new Favoris();

        $ObjectFavoris->removeAllFavorisBySPA($idSpa);
        $ObjectAnimal->removeAllAnimalBySPA($idSpa);
        
        $req = ' 
        DELETE 
        FROM spa
        WHERE spa.id_spa = ?
        ';
        $res = $this->execReqPrep($req, array($idSpa));

        return $res;
    }

    public function editSPA($nom, $localisation, $idSpa ){
        $req = ' 
        UPDATE spa 
        SET nom = ?, localisation = ?
        WHERE spa.id_spa = ?
        ';
        $res = $this->execReqPrep($req, array($nom, $localisation, $idSpa));

        return $res;
    }
}