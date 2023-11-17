<?php
    session_start();
require "config/config.php";
require "controleur/controleur.php";


try {
    if (isset($_GET["action"])) {
        switch($_GET["action"]){
            case "delog":
                delog();
                break;
            case "login":
                login();
                break;
            case "signup":
                signup();
                break;
            default : 
                throw new Exception("Action non valide");
                break;
        }
    }else{
        accueil();
    }
}catch (Exception $e) {
    erreur($e->getMessage()) ;
}
