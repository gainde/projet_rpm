<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require WEBAPPROOT.'models/UserDao.php';

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
        var_dump($user);
        
    } 
    public function logout(){
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
