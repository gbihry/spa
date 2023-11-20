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
    }

    public function getUtilisateurByID($idUser) {
        $req = ' 
        SELECT id_utilisateur, nom, prenom, pseudo, localisation
        FROM `utilisateur` 
        WHERE utilisateur.id_utilisateur = ?
        ';
        $res = $this->execReqPrep($req, array($idUser))[0];

        return $res;
    }

    public function getUtilisateurMDP($idUser) {
        $req = ' 
        SELECT motDePasse AS "mdp"
        FROM `utilisateur` 
        WHERE utilisateur.id_utilisateur = ?
        ';
        $res = $this->execReqPrep($req, array($idUser))[0];

        return $res;
    }

    public function editMDP($mdp, $idUser) {
        $req = ' 
        UPDATE utilisateur
        SET motDePasse = ?
        WHERE id_utilisateur = ?
        ';
        $res = $this->execReqPrep($req, array($mdp, $idUser));

        return $res;
    }

    public function editProfil($nom, $prenom, $pseudo, $localisation, $idUser) {
        $req = ' 
        UPDATE utilisateur
        SET nom = ?, prenom = ?, pseudo = ?, localisation = ?
        WHERE id_utilisateur = ?
        ';
        $res = $this->execReqPrep($req, array($nom, $prenom, $pseudo, $localisation, $idUser));

        return $res;
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