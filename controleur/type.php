<?php
require_once "modele/type.php";

function createType(){
    if($_POST){
        //Initialisation des objets
        $ObjectType = new Type();

        $libelle = htmlspecialchars($_POST['libelle']);

        $ObjectType->createType(
            $libelle
        );

        //Ne venons de créer un type donc nous récupérons à nouveau les types
        //pour avoir les dernières modifications
        $types = $ObjectType->getTypes();

        //Redirection de l'utilisateur à la page admin
        header('Location: index.php?action=admin');
    }else{
        require "vue/type/create.php";
    }

}

function removeType($idType){
    $ObjectType = new Type();

    $ObjectType->removeType($idType);
    $types = $ObjectType->getTypes();

    header('Location: index.php?action=admin');

}

function editType($idType){
    if ($_POST){
        $ObjectType = new Type();

        $libelle = htmlspecialchars($_POST['libelle']);

        $ObjectType->editType(
            $libelle,
            $idType
        );
        $types = $ObjectType->getTypes();

        header('Location: index.php?action=admin');
    }else{
        $type = new Type();

        $libelle = $type->getType($idType)['libelle'];
        require "vue/type/edit.php";
    }
}