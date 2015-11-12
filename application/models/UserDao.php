<?php

require_once (WEBROOT.'core/DAO.php');
require_once (WEBAPPROOT.'bean/User.php');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of userDao
 *
 * @author Moussa
 */
class UserDao extends DAO {

    private $select_user_login = "Select * from table where login=? and password=?";

    public function __construct(\User $user = null) {
        parent::__construct($user?$user->getVars():array());
        $this->pk = 'id';
        $this->table = 'user';
    }

    public function test() {
        var_dump($this->variables);
    }

    public function login($login, $password) {
        $user = null;
        try {
            $query = $this->db->prepare($select_user_login);
            $query->execute(array($login,$password));
            $user = $query->fetch(PDO::FETCH_CLASS, 'User');
        } catch (PDOException $e) {
            echo "Error: " . $e;
        }
        return $user;
    }

}
