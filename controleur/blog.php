<?php

require_once 'modele/blog.php';

function blogs(){
    $ObjectBlog = new Blog();

    $blogs = $ObjectBlog->getBlogs();

    require "vue/blog/read.php";
}
