<?php
require_once "modele/favoris.php";
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