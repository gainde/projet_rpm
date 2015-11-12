<?php

/*
require 'system/userDao.php';
require 'system/adresseDao.php';

/*$userdao = new UserDao(new User());
$userdao->test();
 */
 
/*$adresse_params = array('numero' => '11786', 'rue'=>'saint real', 'code_postal'=>'h3m2y8', 
                        'ville'=>'Montreal', 'province' => 'quebec', 'pays' => 'canada');
$adresse = new Adresse($adresse_params);
$adrDao = new AdresseDao($adresse);
$adrDao->create();
 * 
 */


/*$params = array('username' => 'test', 'nom' => 'thimbo',
        'prenom' => 'moussa',
    'email' => 'moussa@adress.ca', 'profession' => 'programmeur',
    'is_active' => '0', 'is_verified' => '0',
    'is_admin' => '0', 'password' => 'test123', 'telephone' => '5142099999', 'adresse' => 8);
$user = new User($params);
//echo $user;
//var_dump($user);
$userdao = new UserDao($user);

var_dump($userdao->create());
 * 
 */
/*$userdao = new UserDao();
$user = $userdao->read(1);
var_dump($user);
 * 
 */

/*include_once 'system/config.php';
require WEBAPPROOT.'security/AuthentificationManager.php';
$auth = new AuthentificationManager();
$auth->login('test', 'test123');
 * 
 */