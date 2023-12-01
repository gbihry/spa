<?php

require_once "modele/type.php";
require_once "modele/animal.php";
require_once "modele/spa.php";
require_once "modele/favoris.php";
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

        if (isset($_SESSION['USER'])){
            $favoris = $ObjectFavoris->getFavoris($_SESSION['IDUSER']);
        }

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


        if (isset($_SESSION['USER'])){
            $favoris = $ObjectFavoris->getFavoris($_SESSION['IDUSER']);
        }

        $types = $ObjectType->getTypes();
        $allSPA = $ObjectSPA->getAllSPA();
        $localisations = $ObjectSPA->getLocalisations();

        require "vue/animal/read.php";
    }
}

function animal($idAnimal){
    $ObjectAnimal = new Animal();

    $animal = $ObjectAnimal->getAnimal($idAnimal);
    $imagesAnimal = $ObjectAnimal->getImagesAnimal($idAnimal);

    require "vue/animal/detail.php";
}

function createAnimal(){
    if($_POST){
        if ($_POST['nom'] != '' &&
            $_POST['age'] != '' &&
            $_POST['taille'] != '' &&
            $_POST['poid'] != '' &&
            $_POST['handicape'] != '' &&
            $_POST['spa'] != '' &&
            $_POST['type'] != ''
        ){
            $ObjectAnimal = new Animal();
            $ObjectType = new Type();

            $nom = htmlspecialchars($_POST['nom']);
            $age = htmlspecialchars($_POST['age']);
            $taille = htmlspecialchars($_POST['taille']);
            $poid = htmlspecialchars($_POST['poid']);
            $handicape = htmlspecialchars($_POST['handicape']);
            $spa = htmlspecialchars($_POST['spa']);
            $type = htmlspecialchars($_POST['type']);

            $ObjectAnimal->createAnimal(
                $nom,
                $age,
                $taille,
                $poid,
                $handicape,
                $spa,
                $type
            );
            $types = $ObjectType->getTypes();

            header('Location: index.php?action=admin');
        }else{
            $ObjectType = new Type();
            $ObjectSPA = new Spa();

            $types = $ObjectType->getTypes();
            $AllSPA = $ObjectSPA->getAllSPA();
            $verifChamp = false;
            require "vue/animal/create.php";
        }
    }else{
        $ObjectType = new Type();
        $ObjectSPA = new Spa();

        $types = $ObjectType->getTypes();
        $AllSPA = $ObjectSPA->getAllSPA();
        require "vue/animal/create.php";
    }
}

function removeAnimal($idAnimal){
    $ObjectAnimal = new Animal();

    $ObjectAnimal->removeAnimal($idAnimal);
    $animals = $ObjectAnimal->getAnimals();

    header('Location: index.php?action=admin');

}

function removeImage($idImage, $idAnimal){
    $ObjectAnimal = new Animal();

    $ObjectAnimal->removeImage($idImage, $idAnimal);
    $animals = $ObjectAnimal->getAnimals();

    header('Location: index.php?action=modifierAnimal&&idAnimal='.$idAnimal.'');
}

function editAnimal($idAnimal){
    if ($_POST){
        $ObjectAnimal = new Animal();

        $nom = htmlspecialchars($_POST['nom']);
        $age = htmlspecialchars($_POST['age']);
        $taille = htmlspecialchars($_POST['taille']);
        $poid = htmlspecialchars($_POST['poid']);
        $handicape = htmlspecialchars($_POST['handicape']);
        $spa = htmlspecialchars($_POST['spa']);
        $type = htmlspecialchars($_POST['type']);

        $ObjectAnimal->editAnimal(
            $nom,
            $age,
            $taille,
            $poid,
            $handicape,
            $spa,
            $type,
            $idAnimal
        );
        $animals = $ObjectAnimal->getAnimals();

        header('Location: index.php?action=admin');
    }else{
        $ObjectAnimal = new Animal();
        $ObjectType = new Type();
        $ObjectSPA = new Spa();

        $types = $ObjectType->getTypes();
        $AllSPA = $ObjectSPA->getAllSPA();

        $animal = $ObjectAnimal->getAnimal($idAnimal);
        $AllImgAnimal = $ObjectAnimal->getImagesAnimal($idAnimal);

        require "vue/animal/edit.php";
    }
}

function editOrdre($idAnimal){
    if($_POST){
        $ObjectAnimal = new Animal();

        var_dump($_POST);

        /*
         * var_dump($_POST) =
         * 'idImage1' => string '104' (length=3)
         * 'ordre1' => string '2' (length=1)
         * 'idImage2' => string '108' (length=3)
         * 'ordre2' => string '1' (length=1)
         * 'ok' => string 'Valider ordre' (length=13)
         *
         * $_POST = idImage, ordre et submit
         * Pour chaque image nous avons idImage + 1 et ordre + 1
         * - 1 pour enlever le submit et faire en sort que count($_POST) soit un nombre pair
         * /2 car par exemple nous avons deux images ça nous fera deux idImage et deux ordre donc 4 / 2 = 2
         * On fait aussi diviser /2 car on modifie l'ordre de 2 images et non 4
         * $i = 1 car l'ordre commence par 1
         */

        for($i = 1; $i <= (count($_POST) - 1) / 2; $i++){
            /*
             * nous sommes dans une boucle donc nous allons récupérer l'index des images dans les POST
             */
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
        $ObjectType = new Type();
        $ObjectSPA = new Spa();

        $types = $ObjectType->getTypes();
        $AllSPA = $ObjectSPA->getAllSPA();

        $animal = $ObjectAnimal->getAnimal($idAnimal);
        $AllImgAnimal = $ObjectAnimal->getImagesAnimal($idAnimal);

        require "vue/animal/edit.php";
    }
}