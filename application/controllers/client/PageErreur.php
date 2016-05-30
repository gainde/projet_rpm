<?php

/* 
 * @Auteur : Moussa Thimbo
 */

class Erreur extends Client_Controller{
    
    function __construct() {
        parent::__construct();
        $data = array();
    }
    
    function Page404() {
        $this->render('404');
    }

}