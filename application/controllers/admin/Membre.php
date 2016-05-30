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
   function postLogin(){
       if($_POST['name'] == ''){
            $erreur_array['name'] = 1;
            $erreur = true;
        }else{
            $name = trim($_POST['name']);
            $name = $this->resizeString($name,100);
            $erreur_array['name'] = 0;
        }
        if($_POST['lastname'] == ''){
            $erreur_array['lastname'] = 1;
            $erreur = true;
        }else{
            $lastname = trim($_POST['lastname']);
            $lastname = $this->resizeString($lastname,100);
            $erreur_array['lastname'] = 0;
        }
        if($_POST['numero'] == ''){
            $erreur_array['numero'] = 1;
            $erreur = true;
        }else{
            $numero = trim($_POST['numero']);
            $erreur_array['lastname'] = 0;
        }
        if($_POST['road'] == ''){
            $erreur_array['road'] = 1;
            $erreur = true;
        }else{
            $road = trim($_POST['road']);
            $road = $this->resizeString($road,100);
            $erreur_array['road'] = 0;
        }
        if($_POST['codep'] == ''){
            $erreur_array['codep'] = 1;
            $erreur = true;
        }else{
            $codep = trim($_POST['codep']);
            $codep = $this->resizeString($codep,100);
            $erreur_array['codep'] = 0;
        }
   }
}