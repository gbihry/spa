<?php

require_once "modele/utilisateur.php";

function login() {
    if ($_POST){
        if ($_POST['pseudo'] != '' &&
            $_POST['mdp'] != ''
        ){
            $ObjectUtilisateur = new Utilisateur();

            $pseudo = $_POST['pseudo'];
            $mdp = $_POST['mdp'];

            $user = $ObjectUtilisateur->getUtilisateurByPseudo($pseudo);

            if ($user){
                $user = $user[0];
                if (password_verify($mdp, $user['motDePasse'])){
                    $_SESSION['IDUSER'] = $user['id_utilisateur'];
                    $_SESSION['USER'] = $user['pseudo'];
                    $_SESSION['ROLE'] = $user['role'];
                    $_SESSiON['LOC'] = $user['localisation'];
                }
            }else{
                $verifLogin = false;
            }
        }else{
            $verifChamp = false;
        }
    }
    if(isset($_SESSION['USER'])){
        require "vue/vueAccueil.php";
    }else{
        require "vue/vuectlAcces.php";
    }
}

function signup() {
    if ($_POST){
        if ($_POST['nom'] != '' &&
            $_POST['prenom'] != '' &&
            $_POST['pseudo'] != '' &&
            $_POST['localisation'] != '' &&
            $_POST['mdp'] != '' &&
            $_POST['mdp_verif'] != ''
        ){
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $localisation = htmlspecialchars($_POST['localisation']);
            $mdp = $_POST['mdp'];
            $mdp_verif = $_POST['mdp_verif'];

            if ($mdp === $mdp_verif){
                $mdp = password_hash($_POST['mdp'], PASSWORD_BCRYPT);
                $mdp_verif = password_hash($_POST['mdp_verif'], PASSWORD_BCRYPT);

                $ObjectUtilisateur = new Utilisateur();

                $utilisateur = $ObjectUtilisateur->getUtilisateurByPseudo($pseudo);

                if(isset($utilisateur[0])){
                    $verifPseudo = false;
                }else{
                    $ObjectUtilisateur->createUser($nom, $prenom, $pseudo, $localisation, $mdp);
                    header('Location: index.php?action=login');
                }
            }else{
                $verifMDP = false;
            }
        }else{
            $verifChamp = false;
        }

    }
    if(isset($_SESSION['acces'])){
        require "vue/vueAccueil.php";
    }else{
        require "vue/vueSignUp.php";
    }
}

function delog() {
    session_destroy();
    session_start();
    require "vue/vuectlAcces.php";
}
