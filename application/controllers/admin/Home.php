<?php
require_once (WEBAPPROOT.'models/ProjetDao.php');
require_once (WEBAPPROOT.'models/UserDao.php');
require_once (WEBAPPROOT.'models/PourquoiDao.php');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Home extends Admin_Controller{
    
    function __construct() {
          parent::__construct();
          //$this->section = "";
    }
    
    function index(){
        require_once WEBAPPROOT . 'security/AuthentificationManager.php';
        $auth = new AuthentificationManager();
        if($auth->getUser() != null){
            if($auth->getUser()->getIs_admin() == '1'){
                $this->render('index');
            }else{
                $this->redirect('admin/home/accueil');
            }
        }else{
       
        $this->redirect('admin/home/accueil');
        }
    }
    function accueil(){
         $success = array('success'=>'1');
        if (isset($_POST)) {
            if (isset($_POST['username']) && isset($_POST['password'])) {
                require_once WEBAPPROOT . 'security/AuthentificationManager.php';
                $username = $_POST['username'];
                $password = $_POST['password'];
                $auth = new AuthentificationManager();
                $password_hash = md5($password);
                $result = $auth->login($username,$password_hash);
                
                if ($result == null) {
                    //traiter erreur
                   $success = array('success'=>'0');
                } else {
                   if($result->getIs_admin() == '1'){
                        $this->redirect('admin/home');
                    }else{
                       $success = array('success'=>'0'); 
                    }
                }
            }
        }
        require_once WEBAPPROOT . 'security/AuthentificationManager.php';
        $auth = new AuthentificationManager();
        if($auth->getUser() != null){
            if($auth->getUser()->getIs_admin() == '1'){
                $this->redirect('admin/home');
            }
        }
        $this->set($success);
        $this->partialView('connecter');
    }
}