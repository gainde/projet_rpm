<?php
require_once (WEBAPPROOT.'models/UserDao.php');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Membre extends Admin_Controller{
    
    function __construct($isAdmin = false) {
          parent::__construct();
          //$this->load_css();
          //$this->load_js();
          //$this->header = "admin/header.tpl";
          //$this->footer ="admin/footer.tpl";
    }
    
    function index() {
        $this->render('index');
    }
    
    function membres($request = null){
        if($request== null){
            $this->set($this->getListMembres());
            $this->render('membres/liste_membres');
        }else{
            if($request == 'add_membre'){
                $this->render('membres/add_membre');
            }
            else{
                echo 'erreur 404 doit etre lancé';
            }
        }
    }
    function login(){
        
    }
    
    function getListMembres(){
        $userDao = new UserDao(new User());
        $list = $userDao->getAllData();
       return array("membres" => $list);
    }
   
}