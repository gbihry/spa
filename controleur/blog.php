<?php

require_once 'modele/blog.php';

function blogs(){
    $ObjectBlog = new Blog();

    $blogs = $ObjectBlog->getBlogs();

    require "vue/blog/read.php";
}

function blog($idBlog){
    $ObjectBlog = new Blog();

    $blog = $ObjectBlog->getBlog($idBlog);
    $paragraphes = explode("*", $blog['contenu']);

    $contenu = "";

    foreach ($paragraphes as $paragraphe) {
        $contenu.= "<p>";
        $texteGras = explode("/", $paragraphe);
        for ($i = 0; $i < count($texteGras); $i++){
            if (($i % 2) == 0){
                $contenu .= $texteGras[$i];
            }else{
                $contenu .= "<span>" . $texteGras[$i] . "</span>";
            }
        }
        $contenu .= "</p>";
    }

    require "vue/blog/detail.php";
}

function createBlog(){
    if ($_POST){
        $ObjectBlog = new Blog();

        $titre = htmlspecialchars($_POST['titre']);
        $sousTitre = htmlspecialchars($_POST['sousTitre']);
        $contenu = htmlspecialchars($_POST['contenu']);

        $ObjectBlog->createBlog(
            $titre,
            $sousTitre,
            $contenu
        );

        header('Location: index.php?action=blogs');
    }else{
        require "vue/blog/create.php";
    }
}

function editBlog($idBlog){
    if ($_POST){
        $ObjectBlog = new Blog();

        $titre = htmlspecialchars($_POST['titre']);
        $sousTitre = htmlspecialchars($_POST['sousTitre']);
        $contenu = htmlspecialchars($_POST['contenu']);

        $ObjectBlog->editBlog(
            $titre,
            $sousTitre,
            $contenu,
            $idBlog
        );

        header('Location: index.php?action=blogs');
    }else{
        $ObjectBlog = new Blog();

        $blog = $ObjectBlog->getBlog($idBlog);
        require "vue/blog/edit.php";
    }
}

function removeBlog($idBlog){
    $ObjectBlog = new Blog();

    $ObjectBlog->removeBlog($idBlog);

    header('Location: index.php?action=blogs');
}
