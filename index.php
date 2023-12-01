<?php
    session_start();
require "config/config.php";
require "controleur/controleur.php";
require "controleur/type.php";
require "controleur/utilisateur.php";
require "controleur/favoris.php";
require "controleur/animal.php";
require "controleur/spa.php";
require "controleur/connexion.php";


try {
    if (isset($_GET["action"])) {
        if (isset($_SESSION['USER'])){
            /************************************************
            *************** ROLE ADMIN **********************
            *************************************************/
            if ($_SESSION['ROLE'] == "ADMIN"){
                switch($_GET["action"]){
                    case "delog":
                        delog();
                        break;
        
                    /************************************************
                    *************** PROFIL ****************************
                    *************************************************/
                    
                    case "profil":
                        profil($_SESSION['IDUSER']);
                        break;
                    case "modifierProfil":
                        editProfil($_GET['idProfil']);
                        break;
                    case "modifierMDP":
                        editMDP($_GET['idProfil']);
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
                    case "animal":
                        animal($_GET['idAnimal']);
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
                    default : 
                        throw new Exception("Action non valide");
                        break;
                }
            /************************************************
            *************** ROLE USER ***********************
            *************************************************/
            }else{
                switch($_GET["action"]){
                    case "delog":
                        delog();
                        break;
        
                    /************************************************
                    *************** PROFIL ****************************
                    *************************************************/
                    
                    case "profil":
                        profil($_SESSION['IDUSER']);
                        break;
                    case "modifierProfil":
                        editProfil($_GET['idProfil']);
                        break;
                    case "modifierMDP":
                        editMDP($_GET['idProfil']);
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
                    case "animal":
                        animal($_GET['idAnimal']);
                        break;
                    default : 
                        throw new Exception("Action non valide");
                        break;
                }
            }
            
        /************************************************
        *************** SANS SESSION ********************
        *************************************************/
        }else{
            switch($_GET["action"]){
                case "animaux":
                    animals();
                    break;
                case "animal":
                    animal($_GET['idAnimal']);
                    break;
                case "signup":
                    signup();
                    break;
                case "login":
                    login();
                    break;
                default: 
                    header("Location: index.php");
                    break;
            }
        }
    }else{
        accueil();
    }
}catch (Exception $e) {
    erreur($e->getMessage()) ;
}
