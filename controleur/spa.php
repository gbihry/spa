<?php
require_once "modele/spa.php";
function createSPA(){
    if($_POST){
        $ObjectSPA = new Spa();

        $nom = htmlspecialchars($_POST['nom']);
        $localisation = htmlspecialchars($_POST['localisation']);

        $ObjectSPA->createSPA(
            $nom,
            $localisation
        );

        header('Location: index.php?action=admin');
    }else{
        require "vue/spa/create.php";
    }

}

function removeSPA($idSpa){
    $ObjectSPA = new Spa();

    $ObjectSPA->removeSPA($idSpa);

    header('Location: index.php?action=admin');

}

function editSPA($idSpa){
    if ($_POST){
        $ObjectSPA = new Spa();

        $nom = htmlspecialchars($_POST['nom']);
        $localisation = htmlspecialchars($_POST['localisation']);

        $ObjectSPA->editSPA(
            $nom,
            $localisation,
            $idSpa
        );

        header('Location: index.php?action=admin');
    }else{
        $ObjectSPA = new Spa();

        $spa = $ObjectSPA->getSPA($idSpa);
        require "vue/spa/edit.php";
    }
}