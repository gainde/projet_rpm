<?php

/* 
 * @Auteur : Moussa Thimbo
 */

class Erreur extends Controller{
    
    function __construct() {
        $data = array();
    }
    
    function Page404() {
        $this->render('404');
    }

}