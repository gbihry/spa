<?php
// Affichage de la page d'accueil

require_once "modele/type.php";
require_once "modele/animal.php";
require_once "modele/spa.php";

function accueil() {
    require "vue/vueAccueil.php";
}

//Affichage de la page admin 
function admin(){
    //Initialisation des objets
    $ObjectType = new Type();
    $ObjectSPA = new Spa();
    $ObjectAnimal = new Animal();

    //Initialisation des ressources nécessaires à l'affichage
    $types = $ObjectType->getTypes();
    $AllSPA = $ObjectSPA->getAllSPA();
    $animals = $ObjectAnimal->getAnimals();

    require "vue/vueAdmin.php";
}

function erreur($message) {
    require "vue/vueErreur.php";
}