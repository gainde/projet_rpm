<?php
require_once (WEBAPPROOT.'models/Mail.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Contact
 *
 * @author Moussa
 */
class Contact extends Client_Controller{
    function __construct() {
        parent::__construct();
    }
    
    function index() {
        $success = array('success'=>0);
         if($_SERVER['REQUEST_METHOD'] === 'POST'){
             $reponse = $this->processcontact();
             if($reponse['send']){
               $success = array('success'=>1);  
             }else{
                 $success = array('success'=>-1);
             }
             
         }
        $this->set($success);
        $this->render('contact');
    }
    
    function processcontact(){
       $mail="contact@rp2m.com";	
        $name=filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $email=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
        $number=filter_input(INPUT_POST, 'number', FILTER_SANITIZE_SPECIAL_CHARS);
        $query=filter_input(INPUT_POST, 'query', FILTER_SANITIZE_SPECIAL_CHARS);
        
        $send_mail = new Mail();
        $reponse = $send_mail->sendMailContact($email, $mail, $name, $number, $query);
        return $reponse;
    }
}
