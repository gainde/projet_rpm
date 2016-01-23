<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Admin extends Controller{
    
    function __construct() {
          parent::__construct();
    }
    
    function index() {
        $data = array(
            'titre' => 'Admin',
            'description' => 'exemple de description'
        );
        $this->set($data);
        $this->render('admin');
    }
    
    function projets() {
        $data = array(
            'titre' => 'Admin',
            'description' => 'exemple de description'
        );
        $this->set(array('admin'=>$data));
        $this->render('projets/projets');
    }
    function load_css(){   
    }
    
    function load_js(){ 
    }

}