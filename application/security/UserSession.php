<?php
require_once WEBROOT.'system/Session.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserSession
 *
 * @author Moussa Thimbo
 */
class UserSession extends Session{
    
    public function __construct() {
        parent::__construct("user");
    }

    public function getUser() {
        return $this->get();
    }

}
