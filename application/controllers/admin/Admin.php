<?php
require_once (WEBAPPROOT.'models/ProjetDao.php');
require_once (WEBAPPROOT.'models/UserDao.php');
require_once (WEBAPPROOT.'models/PourquoiDao.php');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Admin extends Admin_Controller{
    
    function __construct() {
          parent::__construct();
          //$this->section = "";
    }
    
    function index(){
        require_once WEBAPPROOT . 'security/AuthentificationManager.php';
        $auth = new AuthentificationManager();
        if($auth->getUser() != null){
            if($auth->getUser()->getIs_admin() == 1){
                $this->render('index');
            }
        }else{
       
        $this->redirect('admin/admin/home');
        }
    }
    function home(){
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
                   if($result->getIs_admin() == 1){
                        $this->redirect('admin');
                    }
                }
            }
        }
        require_once WEBAPPROOT . 'security/AuthentificationManager.php';
        $auth = new AuthentificationManager();
        if($auth->getUser() != null){
            $this->redirect('admin');
        }
        $this->set($success);
        $this->partialView('connecter');
    }
    function administrateur(){//pour ajouter un administrateur
        $success = array('success'=>'1');
         if (isset($_POST['email'])) {
            
            $email = trim($_POST['email']);
            $userDao = new UserDao(new User()); 
            $where = array("email"=>$email);
            $user = $userDao->getRow($where);
            if($user){
                $id = $user->getId();
                $user->setIs_admin(1);
                $userDao = new UserDao($user); 
                $userDao->update($id);
            }else{
                $success = array('success'=>'0'); 
            }
         }
        $userDao = new UserDao(new User());
        $where = array("is_admin"=>'1');
        $list = $userDao->getAllDataActive($where);
        $this->set(array("membres" => $list,"success"=>$success));
        $this->render("administrateur");
    }
     function supprimer_admin($params) {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $deleteProjects = $_POST['check'];
                $userDao = new UserDao(new User());
                $list = $userDao->read($deleteProjects );
                $list->setIs_admin(0);
                $userDao = new UserDao($list);
                $userDao->update($deleteProjects);
                $this->redirect('admin/admin/administrateur');
            }
             $userDao = new UserDao(new User());
             $list = $userDao->read($params);
             $this->set(array("user" => $list));
             $this->render('supprimer_admin');
        
    }
    function logout() {
        require_once WEBAPPROOT . 'security/AuthentificationManager.php';
        $auth = new AuthentificationManager();
        $auth->logout();
        $this->redirect('admin');
        exit();
    }
}