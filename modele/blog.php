<?php
require_once "modele/modele.php";
class Blog extends database
{
    public function getBlogs(){
        $req = ' 
           SELECT titre, sousTitre, image, dateCreation
           FROM blog
           ';
        $res = $this->execReq($req);

        return $res;
    }
}