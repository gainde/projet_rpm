<?php

require_once (WEBAPPROOT.'models/ServiceDao.php');

/* 
 * @Auteur : Moussa Thimbo
 */

class Accueil extends Client_Controller{
    
    function __construct() {
        parent::__construct();
        $data = array();
    }
    
    function index() {
        $this->render('index');
    }
    
    function load_css(){
        
    }
    
    function load_js(){ 
    }

}