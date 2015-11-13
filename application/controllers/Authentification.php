<?php

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
class Authentification extends Controller {

    function __construct() {
        
    }

    function login() {
        if (isset($_POST)) {
            if (isset($_POST['username']) && isset($_POST['password'])) {
                require_once WEBAPPROOT . 'security/AuthentificationManager.php';
                $username = $_POST['username'];
                $password = $_POST['password'];
                $auth = new AuthentificationManager();
                $result = $auth->login($username, $password);
                if ($result == null) {
                    //traiter erreur
                    var_dump("Erreur");
                } else {
                    $json = json_encode($result);
                    var_dump($json);
                }
            }
        }
        exit;
    }

    protected function isAjax() {
        return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
                $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest');
    }

}
