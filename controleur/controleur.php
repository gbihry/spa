<?php
// Affichage de la page d'accueil

require_once "modele/utilisateur.php";
require_once "modele/type.php";
require_once "modele/animal.php";
require_once "modele/spa.php";
require_once "modele/favoris.php";

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

/************************************************
*************************************************
*************** TYPE ****************************
*************************************************
*************************************************/

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

/************************************************
*************************************************
*************** PROFIL **************************
*************************************************
*************************************************/

function profil($idUser){
    $ObjectUtilisateur = new Utilisateur();
    $utilisateur = $ObjectUtilisateur->getUtilisateurByID($idUser);
    
    require "vue/utilisateur/read.php";
}

function editProfil($idUser){
    if ($_POST){
        $ObjectUtilisateur = new Utilisateur();

        $ObjectUtilisateur->editProfil(
            $_POST['nom'], 
            $_POST['prenom'], 
            $_POST['pseudo'], 
            $_POST['localisation'],
            $idUser
        );
        $utilisateur = $ObjectUtilisateur->getUtilisateurByID($idUser);

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


/************************************************
*************************************************
*************** FAVORIS **************************
*************************************************
*************************************************/

function favoris($idUser, $idAnimal){
    $ObjectFavoris = new Favoris();
    $ObjectFavoris->switchFavoris($idUser, $idAnimal);
    
    header('Location: index.php?action=animaux');
}

function userFavoris($idUser){
    $ObjectFavoris = new Favoris();
    $favoris = $ObjectFavoris->getFavoris($idUser);
    
    require "vue/favoris/read.php";
}

function removeFavoris($idUser, $idAnimal){
    $ObjectFavoris = new Favoris();
    $ObjectFavoris->switchFavoris($idUser, $idAnimal);
    
    header('Location: index.php?action=voirFavoris');
}

/************************************************
*************************************************
*************** ANIMAL **************************
*************************************************
*************************************************/

function animals(){

    if ($_POST){
        $ObjectAnimal = new Animal();
        $ObjectFavoris = new Favoris();
        $ObjectType = new Type();
        $ObjectSPA = new Spa();
        $titleTrie = null;
        if ($_POST['type'] != 0){
            $animals = $ObjectAnimal->filter("type", $_POST['type'] );
            $type = $ObjectType->getType($_POST['type'])['libelle'];
            $titleTrie = "Trie par type : " . $type;
        }
        if ($_POST['spa'] != 0){
            $animals = $ObjectAnimal->filter("spa", $_POST['spa']);
            $SPA = $ObjectSPA->getSPA($_POST['spa'])['nom'];
            $titleTrie = "Trie par spa : " . $SPA;
        }
        if ($_POST['localisation'] != 0){
            $animals = $ObjectAnimal->filter("localisation", $_POST['localisation']);
            $titleTrie = "Trie par localisation : " . $_POST['localisation'];
        }

        if ($_POST['type'] == 0 && $_POST['spa'] == 0 && $_POST['localisation'] == 0){
            $animals = $ObjectAnimal->getAnimals(); 
        };
        
        $favoris = $ObjectFavoris->getFavoris($_SESSION['IDUSER']);
        $types = $ObjectType->getTypes();
        $allSPA = $ObjectSPA->getAllSPA();
        $localisations = $ObjectSPA->getLocalisations();

        require "vue/animal/read.php";
    }else{
        $ObjectAnimal = new Animal();
        $ObjectFavoris = new Favoris();
        $ObjectType = new Type();
        $ObjectSPA = new Spa();

        $animals = $ObjectAnimal->getAnimals();
        $favoris = $ObjectFavoris->getFavoris($_SESSION['IDUSER']);
        $types = $ObjectType->getTypes();
        $allSPA = $ObjectSPA->getAllSPA();
        $localisations = $ObjectSPA->getLocalisations();

        require "vue/animal/read.php";
    }
}

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

function removeImage($idImage, $idAnimal){
    $animal = new Animal();

    $animal->removeImage($idImage, $idAnimal);
    $animals = $animal->getAnimals();
    
    header('Location: index.php?action=modifierAnimal&&idAnimal='.$idAnimal.'');
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
        $ObjectAnimal = new Animal();
        $type = new Type();
        $spa = new Spa();

        $types = $type->getTypes();
        $AllSPA = $spa->getAllSPA();

        $animal = $ObjectAnimal->getAnimal($idAnimal);
        $AllImgAnimal = $ObjectAnimal->getImagesAnimal($idAnimal);

        require "vue/animal/edit.php";
    }
}

function editOrdre($idAnimal){
    if($_POST){
        $ObjectAnimal = new Animal();


        for($i = 1; $i <= (count($_POST) - 1) / 2; $i++){
            $ordre = "ordre".$i;
            $idImage = "idImage".$i;

            $ObjectAnimal->updateRole($_POST[$ordre], $_POST[$idImage]);
        }
    }

    header('Location: index.php?action=modifierAnimal&&idAnimal='.$idAnimal.'');
}

function addImage($idAnimal){
    if ($_POST){
        $ObjectAnimal = new Animal();
        $animal = $ObjectAnimal->addImage($idAnimal);

        header('Location: index.php?action=modifierAnimal&&idAnimal='.$idAnimal.'');
    }else{
        $ObjectAnimal = new Animal();
        $type = new Type();
        $spa = new Spa();

        $types = $type->getTypes();
        $AllSPA = $spa->getAllSPA();

        $animal = $ObjectAnimal->getAnimal($idAnimal);
        $AllImgAnimal = $ObjectAnimal->getImagesAnimal($idAnimal);

        require "vue/animal/edit.php";
    }
}

/************************************************
*************************************************
*************** SPA *****************************
*************************************************
*************************************************/

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

/************************************************
*************************************************
*************** CONNEXION ***********************
*************************************************
*************************************************/

function login() {
    if ($_POST){
        $utilisateur = new Utilisateur();

        $pseudo = $_POST['pseudo'];
        $mdp = $_POST['mdp'];

        $user = $utilisateur->getUtilisateurByPseudo($pseudo);
        
        if (password_verify($mdp, $user['motDePasse'])){
            $_SESSION['IDUSER'] = $user['id_utilisateur'];
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