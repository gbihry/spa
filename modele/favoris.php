<?php

require_once "modele/modele.php";

class Favoris extends database {

    public function switchFavoris($idUser, $idAnimal) {
        if ($this->getFavorisByAnimal($idAnimal, $idUser)){
            $req = ' 
            DELETE FROM favoris
            WHERE id_utilisateur = ?
            AND id_animal = ?
            ';
        }else{
            $req = ' 
            INSERT INTO
            favoris
            VALUES (?, ?)
            ';
        }
        $res = $this->execReqPrep($req, array($idUser, $idAnimal));

        return $res;
    }

    public function getFavoris($idUser){
        $req = ' 
        SELECT favoris.id_animal, animal.id_animal, animal.nom, age, taille, poid, handicape, type.libelle AS "type", spa.nom AS "spaNom", uniqid_img AS "nomImg", image.ordre
        FROM `animal` 
        JOIN type ON animal.id_type = type.id_type
        JOIN spa ON animal.id_spa = spa.id_spa
        JOIN image on animal.id_animal = image.id_animal
        JOIN favoris on animal.id_animal = favoris.id_animal    
        WHERE image.ordre = 1
        AND favoris.id_utilisateur = ?
        ';

        $res = $this->execReqPrep($req, array($idUser));

        return $res;
    }

    public function getFavorisByAnimal($idAnimal, $idUser){
        $req = ' 
        SELECT id_animal
        FROM favoris
        where favoris.id_animal = ?
        AND favoris.id_utilisateur = ?
        ';

        $res = $this->execReqPrep($req, array($idAnimal, $idUser));

        return $res;
    }

}