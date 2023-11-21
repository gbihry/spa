<?php

abstract class database {
    private $bdd;

    protected function execReq($req) {
        return $this->connexionBDD()->query($req)->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function execReqPrep($req, $data){
        $reponse = $this->connexionBDD()->prepare($req);
        $reponse->execute($data);
        return $reponse->fetchAll(PDO::FETCH_ASSOC);
    }

    private function connexionBDD() {
        if(!isset($this->bdd)){
            try { // Connexion à la base de données
                $options=array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
                $this->bdd=new PDO('mysql:host='.DBHOST.';dbname='.DBNAME, DBUSER, DBPWD, $options);
            }      
            catch(Exception $err) { // Erreur lors de la connexion à la BDD
                throw new Exception("Connexion à la BDD"); //.$err->getMessage());
            }

        }
        return $this->bdd;
    }
}


