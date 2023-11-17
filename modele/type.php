<?php

require_once "modele/modele.php";

class Type extends database {

    public function getTypes(){
        $req = ' 
        SELECT * 
        FROM `type` 
        ';
        $res = $this->execReq($req);

        return $res;
    }

    public function createType($libelle){
        $req = ' 
        INSERT INTO
        type
        VALUES ("", ?)
        ';
        $res = $this->execReqPrep($req, array($libelle));

        return $res;
    }

    public function removeType($idType){
        $req = ' 
        DELETE 
        FROM type
        WHERE type.id_type = ?
        ';
        $res = $this->execReqPrep($req, array($idType));

        return $res;
    }
}