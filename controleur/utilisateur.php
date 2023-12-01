<?php
require_once "modele/utilisateur.php";

function profil($idUser){
    $ObjectUtilisateur = new Utilisateur();
    $utilisateur = $ObjectUtilisateur->getUtilisateurByID($idUser);

    require "vue/utilisateur/read.php";
}

function editProfil($idUser){
    if ($_POST){
        $ObjectUtilisateur = new Utilisateur();

        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $localisation = htmlspecialchars($_POST['localisation']);

        $ObjectUtilisateur->editProfil(
            $nom,
            $prenom,
            $pseudo,
            $localisation,
            $idUser
        );
        $utilisateur = $ObjectUtilisateur->getUtilisateurByID($idUser);

        $_SESSION["USER"] = $pseudo;

        header('Location: index.php?action=profil');
    }else{
        $ObjectUtilisateur = new Utilisateur();
        $utilisateur = $ObjectUtilisateur->getUtilisateurByID($idUser);

        require "vue/utilisateur/edit.php";
    }

}

function editMDP($idUser){
    if ($_POST){
        $verifActuelMdp = false;
        $verifConfirmMdp = false;
        $ObjectUtilisateur = new Utilisateur();
        $utilisateur = $ObjectUtilisateur->getUtilisateurMDP($idUser);

        if(password_verify($_POST['mdpActuel'], $utilisateur['mdp'])){
            $verifActuelMdp = true;
        }
        if ($_POST['newMdp'] == $_POST['confNewMdp']){
            $verifConfirmMdp = true;
        }

        if ($verifActuelMdp === true && $verifConfirmMdp === true){
            $mdp = password_hash($_POST['newMdp'], PASSWORD_BCRYPT);
            $ObjectUtilisateur->editMDP($mdp, $idUser);

            header('Location: index.php?action=profil');
        }else{
            require "vue/utilisateur/editMdp.php";
        }
    }else{
        $ObjectUtilisateur = new Utilisateur();
        $utilisateur = $ObjectUtilisateur->getUtilisateurByID($idUser);

        require "vue/utilisateur/editMdp.php";
    }
}