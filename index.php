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

            /************************************************
            *************** TYPE ****************************
            *************************************************/

            case "ajouterType":
                createType();
                break;
            case "supprimerType":
                removeType($_GET['idType']);
                break;
            case "modifierType":
                editType($_GET['idType']);
                break;

            /************************************************
            *************** FAVORIS *************************
            *************************************************/

            case "favoris":
                favoris($_GET['idUser'], $_GET['idAnimal']);
                break;

            case "voirFavoris":
                userFavoris($_SESSION['IDUSER']);
                break;
            case "supprimerFavoris":
                removeFavoris($_GET['idUser'], $_GET['idAnimal']);
                break;

            /************************************************
            *************** ANIMAL **************************
            *************************************************/
            case "animaux":
                animals();
                break;
            case "ajouterAnimal":
                createAnimal();
                break;
            case "supprimerAnimal":
                removeAnimal($_GET['idAnimal']);
                break;
            case "modifierAnimal":
                editAnimal($_GET['idAnimal']);
                break;
            case "ajouterImage":
                addImage($_GET['idAnimal']);
                break;
            case "supprimerImage":
                removeImage($_GET['idImage'], $_GET['idAnimal']);
                break;
            case "modifierOrdre":
                editOrdre($_GET['idAnimal']);
                break;

            /************************************************
            *************** SPA *****************************
            *************************************************/

            case "ajouterSPA":
                createSPA();
                break;
            case "supprimerSPA":
                removeSPA($_GET['idSPA']);
                break;
            case "modifierSPA":
                editSPA($_GET['idSPA']);
                break;
            
            case "admin":
                admin();
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
