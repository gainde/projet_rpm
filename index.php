<?php

/*
 * @autheur: Moussa Thimbo
 * Dispatcher
 */
/* spl_autoload_register(function ($class) {
  include 'system/' . $class . '.class.php';
  }); */

include_once 'system/config.php';

include WEBROOT.'system/Application.php';
require ('core/controller.php');
$app = new Application();

/*
require 'system/userDao.php';
$userdao = new UserDao(new User());
$userdao->test();

$params = array('login' => 'test', 'nom' => 'thimbo',
        'prenom' => 'moussa', 'username' => 'Moussa Thimbo',
    'email' => 'moussa@adress.ca', 'profession' => 'programmeur',
    'is_active' => '0', 'is_verified' => '0',
    'is_admin' => '0', 'password' => 'test123', 'telephone' => '5142099999', 'adresse' => 'rue quelque part');
$user = new User($params);
//echo $user;
var_dump($user);
$userdao = new UserDao($user);
*/
//var_dump($userdao->create());