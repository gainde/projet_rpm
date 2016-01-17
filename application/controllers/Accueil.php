<?php

require_once (WEBAPPROOT.'models/ServiceDao.php');

/* 
 * @Auteur : Moussa Thimbo
 */

class Accueil extends Controller{
    
    function __construct() {
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