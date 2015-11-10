<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Auth
 *
 * @author Moussa
 */
class Auth {
    private $isAdmin;
    private $login;
    private $password;
    private $user = null;
    
    public function __construct() {
    }
    
    public function login($login, $password){
    } 
    public function logout(){
    } 
    public function register(){
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
