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
    }
    
    function index() {
        $this->set($this->getListMembres());
            $this->render('liste_membres');
    }
    
    function add_membre(){
        $this->render('add_membre');
    }
    
    function getListMembres(){
        $userDao = new UserDao(new User());
        $list = $userDao->getAllData();
       return array("membres" => $list);
    }
   
}