<?php
require_once (WEBAPPROOT.'models/ProjetDao.php');
require_once (WEBAPPROOT.'models/UserDao.php');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Admin extends Controller{
    
    function __construct() {
          parent::__construct();
          $this->load_css();
          $this->load_js();
          $this->header = "admin/header.tpl";
          $this->footer ="admin/footer.tpl";
    }
    
    function index() {
        $this->render('index');
    }
    
    function projets() {
        $this->set($this->getListProjets());
        $this->render('projets/projets');
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
    
    function load_css(){  
        $this->css = $this->menuHelper->getCss('admin');
    }
    
    function load_js(){ 
        $this->js = $this->menuHelper->getJs('admin');
    }
    function getListProjets(){
       $projetDao = new ProjetDao(new Projet());
       $list = $projetDao->getAllData();
       return array("projets" => $list);
    }
    function getListMembres(){
        $userDao = new UserDao(new User());
        $list = $userDao->getAllData();
       return array("membres" => $list);
    }
}