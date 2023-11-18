<?php
// Affichage de la page d'accueil

require_once "modele/utilisateur.php";
require_once "modele/type.php";
require_once "modele/animal.php";
require_once "modele/spa.php";

function accueil() {
    setcookie('page', '', time()-1);
    require "vue/vueAccueil.php";
}

function admin(){
    $type = new Type();
    $spa = new Spa();
    $animal = new Animal();

    $types = $type->getTypes();
    $AllSPA = $spa->getAllSPA();
    $animals = $animal->getAnimals();

    require "vue/vueAdmin.php";
}

// TYPE

function createType(){
    if($_POST){
        $type = new Type();

        $type->createType(
            $_POST['libelle']
        );
        $types = $type->getTypes();

        header('Location: index.php?action=admin');
    }else{
        require "vue/type/create.php";
    }
    
}

function removeType($idType){
    $type = new Type();

    $type->removeType($idType);
    $types = $type->getTypes();
    
    header('Location: index.php?action=admin');
    
}

function editType($idType){
    if ($_POST){
        $type = new Type();

        $type->editType(
            $_POST['libelle'], 
            $idType
        );
        $types = $type->getTypes();
        
        header('Location: index.php?action=admin');
    }else{
        $type = new Type();

        $libelle = $type->getType($idType)['libelle'];
        require "vue/type/edit.php";
    }
}

// ANIMAL

function createAnimal(){
    if($_POST){
        $animal = new Animal();
        $type = new Type();
        
        $animal->createAnimal(
            $_POST['nom'], 
            $_POST['age'], 
            $_POST['taille'],
            $_POST['poid'],
            $_POST['handicape'],
            $_POST['spa'],
            $_POST['type']
        );
        $types = $type->getTypes();

        header('Location: index.php?action=admin');
    }else{
        $type = new Type();
        $spa = new Spa();

        $types = $type->getTypes();
        $AllSPA = $spa->getAllSPA();
        require "vue/animal/create.php";
    }
}

function removeAnimal($idAnimal){
    $animal = new Animal();

    $animal->removeAnimal($idAnimal);
    $animals = $animal->getAnimals();
    
    header('Location: index.php?action=admin');
    
}

function editAnimal($idAnimal){
    if ($_POST){
        $animal = new Animal();
        $animal->editAnimal(
            $_POST['nom'], 
            $_POST['age'], 
            $_POST['taille'], 
            $_POST['poid'], 
            $_POST['handicape'], 
            $_POST['type'], 
            $_POST['spa'], 
            $idAnimal
        );
        $animals = $animal->getAnimals();

        header('Location: index.php?action=admin');
    }else{
        $animal = new Animal();
        $type = new Type();
        $spa = new Spa();

        $types = $type->getTypes();
        $AllSPA = $spa->getAllSPA();

        $animal = $animal->getAnimal($idAnimal);

        require "vue/animal/edit.php";
    }
}

//SPA
function createSPA(){
    if($_POST){
        $spa = new Spa();

        $spa->createSPA(
            $_POST['nom'], 
            $_POST['localisation']
        );
        $AllSPA = $spa->getAllSPA();

        header('Location: index.php?action=admin');
    }else{
        require "vue/spa/create.php";
    }
    
}

function removeSPA($idSpa){
    $spa = new Spa();

    $spa->removeSPA($idSpa);
    $AllSPA = $spa->getAllSPA();
    
    header('Location: index.php?action=admin');
    
}

function editSPA($idSpa){
    if ($_POST){
        $spa = new Spa();

        $spa->editSPA(
            $_POST['nom'], 
            $_POST['localisation'], 
            $idSpa
        );
        $AllSPA = $spa->getAllSPA();
        
        header('Location: index.php?action=admin');
    }else{
        $spa = new Spa();

        $spa = $spa->getSPA($idSpa);
        require "vue/spa/edit.php";
    }
}



function login() {
    if ($_POST){
        $utilisateur = new Utilisateur();

        $pseudo = $_POST['pseudo'];
        $mdp = $_POST['mdp'];

        $user = $utilisateur->getUtilisateurByPseudo($pseudo);

        if (crypt($mdp, $user['motDePasse'])){
            $_SESSION['USER'] = $user['pseudo'];
            $_SESSION['ROLE'] = $user['role'];
            $_SESSiON['LOC'] = $user['localisation'];
        }
    }
    if(isset($_SESSION['USER'])){
        if (isset($_COOKIE['page'])){
            header('Location: index.php'.$_COOKIE['page']);
        }else{
            require "vue/vueAccueil.php";
        }
    }else{
        require "vue/vuectlAcces.php";
    }
} 

function signup() {
    if ($_POST){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $pseudo = $_POST['pseudo'];
        $localisation = $_POST['localisation'];

        $mdp = $_POST['mdp'];
        $mdp_verif = $_POST['mdp_verif'];
        if ($mdp === $mdp_verif){
            $mdp = password_hash($_POST['mdp'], PASSWORD_BCRYPT);
            $mdp_verif = password_hash($_POST['mdp_verif'], PASSWORD_BCRYPT);

            $utilisateur = new Utilisateur();

            $utilisateur->createUser($nom, $prenom, $pseudo, $localisation, $mdp);
        }
        header('Location: index.php?action=login');
    }
    if(isset($_SESSION['acces'])){
        if (isset($_COOKIE['page'])){
            header('Location: index.php'.$_COOKIE['page']);
        }else{
            require "vue/vueAccueil.php";
        }
    }else{
        require "vue/vueSignUp.php";
    }
} 

function delog() {
    setcookie(session_name(), '', time()-1);
    session_destroy();
    session_start();
    require "vue/vuectlAcces.php";
} 

function erreur($message) {
    require "vue/vueErreur.php";
}

