<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once WEBAPPROOT.'models/UserDao.php';

/**
 * Description of Auth
 *
 * @author Moussa
 */
class AuthentificationManager {
    private $isAdmin;
    private $login;
    private $password;
    private $user = null;
    private $table = 'user';


    public function __construct() {
    }
    
    public function login($username, $password){
        //valider login
        //valider password
        //pour éviter sql injection
        //$userdao = new UserDao(new User());
        //$userdao->test();
        $dao = new DAO(array('username' =>$username, 'password' =>$password), $this->table );
        $user = $dao->select();
        if (isset($user)) {
            require_once WEBAPPROOT.'security/UserSession.php';
            $session = new UserSession();
            $session->start();
            $session->set($user);
            //var_dump($session->get());
            return $user;
        }
    } 
    public function logout(){
        require_once WEBAPPROOT.'security/UserSession.php';
        $session = new UserSession();
        $session->start();
        $session->delete();
    } 
    /*
     * validation donnée
     * et si valide enregistrer user
     * sinon false;
     * verifer si login exist exist()
     */
    public function register($data){
    }
    public function exists($login){
    }
    public function createUser(){
    }
    public function removeUser(){
    }
    public function getUser(){ 
        require_once WEBAPPROOT.'security/UserSession.php';
            $session = new UserSession();
            $session->start();
            return $session->getUser();
    }
    public function getCurrentUser(){    
    }
    public function setCurrentUser(){  
    }
    public function clearCurrent(){        
    }
    public function isAdmin(){       
    } 
    public function redirect(){       
    }  
    public function changePassword(){        
    }  
    public function hashPassword(){        
    }
    public function verifyPassword(){       
    }
    public function verifyPasswordStrength(){        
    }  
    public function generateStrongPassword(){       
    }  
    public function verifyAccountNameStrength(){       
    }
    
    
}
