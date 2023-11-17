<?php
// Affichage de la page d'accueil

require_once "modele/utilisateur.php";

function accueil() {
    setcookie('page', '', time()-1);
    require "vue/vueAccueil.php";
}

function login() {
    if ($_POST){
        $utilisateur = new Utilisateur();
        $pseudo = $_POST['pseudo'];
        $mdp = $_POST['mdp'];

        $user = $utilisateur->getUtilisateurByPseudo($pseudo);

        if (crypt($mdp, $user['motDePasse'])){
            $_SESSION['user'] = $user['pseudo'];
            $_SESSION['role'] = $user['role'];
            $_SESSiON['loc'] = $user['localisation'];
        }
    }
    if(isset($_SESSION['user'])){
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

