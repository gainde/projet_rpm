<?php

/* 
 * @Auteur : Moussa Thimbo
 */

class Accueil extends Controller{
    
    function __construct() {
        $data = array();
    }
    
    function index() {
        $data = array(
            'titre' => 'Accueil',
            'description' => 'exemple de description'
        );
        $this->set($data);
        $this->render('index');
    }

}