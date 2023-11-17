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

/* 

Listez la propriété et les méthodes de la classe database :

- propriété bdd
- execReq 
- execReqPrep
- connexionBDD

ce test sert à vérifier que la variable $bdd existe bien, puisqu'elle est protégé, elle n'existe que dans ce fichier donc
cela permet de vérifier qu'on a bien les droits d'accès à ce fichier pour accéder à la bdd et pour éviter d'instancier à chaque fois
la variable bdd

si on enlevait ce test on aurait des problèmes d'optimisation vu qu'a chaque fois on se reconnecte à la bdd

elles sont privées car connexionBDD sert à initialiser la variable bdd qui sont privée et qui sont utilisé que pour les fonctions
de ce fichier

ces méthodes sont protégé car elles seront utilisé que par les enfants, les méthodes protected sont des méthodes pour les héritages



*/


