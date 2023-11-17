<?php
// Affichage de la page d'accueil

require_once "modele/utilisateur.php";
require_once "modele/type.php";

function accueil() {
    setcookie('page', '', time()-1);
    require "vue/vueAccueil.php";
}

function admin(){
    $type = new Type();
    $types = $type->getTypes();
    require "vue/vueAdmin.php";
}

function ajouterType(){
    if($_POST){
        $type = new Type();
        $type->createType($_POST['libelle']);
        $types = $type->getTypes();

        require "vue/vueAdmin.php";
    }else{
        require "vue/vueType.php";
    }
    
}

function removeType($idType){
    $type = new Type();
    $type->removeType($idType);
    $types = $type->getTypes();
    
    require "vue/vueAdmin.php";
    
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

