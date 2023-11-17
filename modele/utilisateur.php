<?php

require_once "modele/modele.php";

class Utilisateur extends database {

    public function getUtilisateurByPseudo($pseudo) {
        $req = ' 
        SELECT * 
        FROM `utilisateur` 
        WHERE utilisateur.pseudo = ?
        ';
        $res = $this->execReqPrep($req, array($pseudo))[0];

        return $res;

        if($res->rowCount() == 1){
            return $res;
        }
        else{   
            throw new Exception("Aucun client ne correspond à l'identifiant $idUtilisateur"); 
        }

    }

    public function createUser($nom, $prenom, $pseudo, $localisation, $mdp){
        $req = ' 
        INSERT INTO 
        utilisateur
        VALUES 
        ("" ,?, ?, ?, ?, ?, "USER")
        ';
        $res = $this->execReqPrep($req, array($nom, $prenom, $pseudo, $mdp, $localisation));

        return $res;
    }
}