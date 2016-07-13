<?php
require_once (WEBAPPROOT.'models/Mail.php');
require_once (WEBAPPROOT.'models/UserDao.php');
require_once (WEBAPPROOT.'models/AdresseDao.php');
require_once (WEBAPPROOT.'bean/User.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author Moussa Thimbo
 */
class Authentification extends Client_Controller {

    function __construct() {
        parent::__construct();
    }

    function login() {
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
                    //var_dump("Erreur");
                } else {
                    $json = json_encode($result);
                    //var_dump($json);
                    echo json_encode(array("reponse" => 'OK'));
                }
            }
        }
        exit;
    }
    function connecter(){
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
                   $this->redirect('accueil'); 
                }
            }
        }
        $this->set($success);
        $this->render('connecter');
    }
    function inscription(){
        $erreur_array = array('name'=>-1,'description'=>-1,'contenu'=>-1,'from'=>-1,'to'=>-1);
        $erreur = false;
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
             $array_user  = $this->postLogin($erreur,$erreur_array);
             $nb = $this->userExist(array('email'=>$array_user['user']['email']));
             if(!$erreur && !$nb){
                    $array_user['user']['is_verified'] = uniqid();
                   
                    $userDao = new UserDao(new User($array_user['user']));
                    $userDao->create();
                    //die(var_dump($array_services));
                    $iduser = $userDao->getLastID();
                    $array_user['adresse']['id_user'] = $iduser;
                    $adresseDao = new AdresseDao(new Adresse($array_user['adresse']));
                    $adresseDao->create();
                    
                    $mail = new Mail();
                    $result = $mail->sendMailActivation('support@rp2m.com', $array_user['user']['email'], $array_user['user']['prenom'],$array_user['user']['is_verified']);
                    if($result['send']){
                        $this->set(array('success'=>'1'));
                        $this->render('inscription');
                    }
            }elseif($nb){
                $this->set(array('success'=>'2'));
                $this->render('inscription');
            }elseif ($erreur) {
                 $this->render('inscription');
            }
        }
        $this->set(array('success'=>'0'));
        $this->render('inscription');
    }
    function activer($param){
        $userDao = new UserDao(new User());
        //$where = array('email'=>"$email");
         $nb = $userDao->getRow(array('is_verified'=>$param));
        
         if($nb){
             $nb->setIs_verified('');
             $nb->setIs_active(1);
             $userDao = new UserDao($nb);
             $id = $nb->getId();
             $userDao->update($id);
             $this->set(array('active'=>true));
             $this->render('activer');
         }
         $this->set(array('active'=>false));
         $this->render('activer');
    }
    function initialiser(){
        $erreur = false;
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if($_POST['mail'] == ''){
            $erreur_array['mail'] = 1;
            $erreur = true;
        }else{
            $mail = trim($_POST['mail']);
            $erreur_array['mail'] = 0;
        }
        if($_POST['password'] == ''){
            $erreur_array['password'] = 1;
            $erreur = true;
        }else{
            $password = trim($_POST['password']);
            $erreur_array['password'] = 0;
        }
       
        if(!$erreur){
         $userDao = new UserDao(new User());
        //$where = array('email'=>"$email");
         $nb = $userDao->getRow(array('email'=>$mail));
          if(count($nb)){
             $password_hash = md5($password);
             $nb->setPassword($password_hash);
             $userDao = new UserDao($nb);
             $id = $nb->getId();
             $userDao->update($id);
             $this->set(array('init'=>'1'));
             $this->render('initialiser');
            }
            $this->set(array('init'=>'-1'));
            $this->render('initialiser');
        }
        }
        $this->set(array('init'=>'0'));
        $this->render('initialiser');
    }
    function profil($param){
         $adresseDao = new AdresseDao(new Adresse());
         $adresse = $adresseDao->getRow(array('id_user'=>$param));
         $this->set(array('adresse'=>$adresse));
         
         $this->render('profil');
    }
    function modifier_profil($params){
        $erreur_array = array('name'=>-1,'description'=>-1,'contenu'=>-1,'from'=>-1,'to'=>-1);
        $erreur = false;
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
           $params = $_POST['iduser'];
            $array_user  = $this->postModifier_user($erreur,$erreur_array);
            if(!$erreur){
                    $userDao = new UserDao(new User($array_user['user']));
                    $userDao->update($params);
                 
                    $array_user['adresse']['id_user'] = $params;
                    $adresseDao = new AdresseDao(new Adresse($array_user['adresse']));
                    $adresseDao->update($params);
                    $this->redirect('authentification/profil/'.$params);
                   /* $mail = new Mail();
                    $result = $mail->sendMailActivation('support@rp2m.com', $array_user['user']['email'], $array_user['user']['prenom'],$array_user['user']['is_verified']);
                    if($result['send']){
                        $this->set(array('success'=>'1'));
                        $this->render('inscription');
                    }*/
        }
        }
        $adresseDao = new AdresseDao(new Adresse());
        $adresse = $adresseDao->getRow(array('id_user'=>$params));
        $this->set(array('adresse'=>$adresse,'profession'=> $this->getUser()->getProfession(),'secteur'=> $this->getUser()->getDomaine()));
        $this->render('modifier_profil');
    }
    function userExist($where){
        $userDao = new UserDao(new User());
        //$where = array('email'=>"$email");
        return  $userDao->getRow($where);
    }
    function postLogin(&$erreur,&$erreur_array){
       if($_POST['name'] == ''){
            $erreur_array['name'] = 1;
            $erreur = true;
        }else{
            $name = trim($_POST['name']);
            $erreur_array['name'] = 0;
        }
        if($_POST['lastname'] == ''){
            $erreur_array['lastname'] = 1;
            $erreur = true;
        }else{
            $lastname = trim($_POST['lastname']);
            $erreur_array['lastname'] = 0;
        }
        if($_POST['mail'] == ''){
            $erreur_array['mail'] = 1;
            $erreur = true;
        }else{
            $mail = trim($_POST['mail']);
            $erreur_array['mail'] = 0;
        }
        if($_POST['password'] == ''){
            $erreur_array['password'] = 1;
            $erreur = true;
        }else{
            $password = trim($_POST['password']);
            $erreur_array['password'] = 0;
        }
       
        $tel = trim($_POST['tel']);
        
        if($_POST['skills'] == ''){
            $erreur_array['skills'] = 1;
            $erreur = true;
        }else{
            $profession = trim($_POST['skills']);
            $erreur_array['skills'] = 0;
        }
       
        $numberr = trim($_POST['numberr']);
        $road = trim($_POST['road']);
        $codep = trim($_POST['codep']);
        $city = trim($_POST['city']);
        $province = trim($_POST['province']);
        $country = trim($_POST['country']);
        if(isset($_POST['domaine'])){
           $domaine =  trim($_POST['domaine']);
        }
        if(isset($_POST['divers'])){
           $domaine =  trim($_POST['divers']);
        }
        
        $password_hash = md5($password);
        return $array_user = array('user'=>array(
                                        'nom' => "$name",
                                        'prenom' => "$lastname",
                                        'username' => "$mail",
                                        'email' => "$mail",
                                        'date_naissance' => "",
                                        'profession' => "$profession",
                                        'secteur' => "$domaine",
                                        'is_active' => "0",
                                        'is_verified' => "0",
                                        'is_admin' => "0",
                                        'password' => "$password_hash",
                                        'telephone' => "$tel"
                                        ),
                                    'adresse'=>  array(
                                        'numero' => "$numberr",
                                        'rue' => "$road",
                                        'ville' => "$city",
                                        'code_postal' => "$codep",
                                        'province' => "$province",
                                        'pays' => "$country",
                                        'id_user' => ""
                                    ));
   }
    function postModifier_user(&$erreur,&$erreur_array){
       if($_POST['name'] == ''){
            $erreur_array['name'] = 1;
            $erreur = true;
        }else{
            $name = trim($_POST['name']);
            $erreur_array['name'] = 0;
        }
        if($_POST['lastname'] == ''){
            $erreur_array['lastname'] = 1;
            $erreur = true;
        }else{
            $lastname = trim($_POST['lastname']);
            $erreur_array['lastname'] = 0;
        }
        if($_POST['mail'] == ''){
            $erreur_array['mail'] = 1;
            $erreur = true;
        }else{
            $mail = trim($_POST['mail']);
            $erreur_array['mail'] = 0;
        }
       
        $tel = trim($_POST['tel']);
        
        if($_POST['skills'] == ''){
            $erreur_array['skills'] = 1;
            $erreur = true;
        }else{
            $profession = trim($_POST['skills']);
            $erreur_array['skills'] = 0;
        }
        
        $numberr = trim($_POST['numberr']);
        $road = trim($_POST['road']);
        $codep = trim($_POST['codep']);
        $city = trim($_POST['city']);
        $province = trim($_POST['province']);
        $country = trim($_POST['country']);
        if(isset($_POST['domaine'])){
           $domaine =  trim($_POST['domaine']);
        }
        if(isset($_POST['divers'])){
           $domaine =  trim($_POST['divers']);
        }
       $password_hash = $this->getUser()->getPassword();
        return $array_user = array('user'=>array(
                                        'nom' => "$name",
                                        'prenom' => "$lastname",
                                        'username' => "$mail",
                                        'email' => "$mail",
                                        'date_naissance' => "",
                                        'profession' => "$profession",
                                        'secteur' => "$domaine",
                                        'is_active' => "0",
                                        'is_verified' => "0",
                                        'is_admin' => "0",
                                        'telephone' => "$tel",
                                        'password' => "$password_hash"
                                        ),
                                    'adresse'=>  array(
                                        'numero' => "$numberr",
                                        'rue' => "$road",
                                        'ville' => "$city",
                                        'code_postal' => "$codep",
                                        'province' => "$province",
                                        'pays' => "$country",
                                        'id_user' => ""
                                    ));
    }
    
    function logout() {
        require_once WEBAPPROOT . 'security/AuthentificationManager.php';
        $auth = new AuthentificationManager();
        $auth->logout();
        header("Location: ".ROOT);
        exit();
    }

}
