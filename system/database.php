<?php

/*
 * Mysql database class
 */

require_once 'config.php';

class Database {

    private $_connection;
    private static $_instance; //The single instance
    private $_host = DB_HOST;
    private $_username = DB_USER;
    private $_password = DB_PASSWORD;
    private $_database = DB_DB;

    /*
      Get an instance of the Database
      @return Instance
     */

    public static function getInstance() {
        if (!self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    // Constructor
    private function __construct() {
        $opt = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );
        try {
            $this->_connection = new \PDO("mysql:host=$this->_host;dbname=$this->_database", $this->_username, $this->_password, $opt);
            /*             * * echo a message saying we have connected ** */
            echo 'Connected to database';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // Magic method clone is empty to prevent duplication of connection
    private function __clone() {
        
    }

    /**
     * Private unserialize method to prevent unserializing of the *Singleton*
     * instance.
     *
     * @return void
     */
    private function __wakeup() {
        
    }

    // Get mysql pdo connection
    public function getConnection() {
        return $this->_connection;
    }

    public function select($sql, $params, $class='') {
        if(empty($class)){
            return execute($sql, $params)->fetch();
        }
        return getObject($sql, $params, $class);
    }
    public function selectAll($sql, $params, $class='') {
        if(empty($class)){
            return execute($sql, $params)->fetchAll();
        }
        return getAllObject($sql, $params, $class);
    }

    public function insert($sql, $params) {
        return execute($sql, $params);
    }

    public function update($sql, $params) {
        return execute($sql, $params);
    }

    public function delete($sql, $params) {
        return execute($sql, $params);
    }

    private function execute($sql, $params) {
        $stmt = $this->_connection->prepare($sql);
        if (!empty($params)) {
            $stmt->bindparam($params);
        }
        return $stmt->execute();
    }
    private function getObject($sql, $params, $class){
        $stmt = $this->_connection->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->fetch(PDO::FETCH_CLASS, $class);
        return $result;
    }
    private function getAllObject($sql, $params, $class){
        $stmt = $this->_connection->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, $class);
        return $result;
    }
    
    public function min($field) {
        if ($field) {
            return $this->_connection->single("SELECT min(" . $field . ")" . " FROM " . $this->table);
        }
    }

    public function max($field) {
        if ($field) {
            return $this->_connection->single("SELECT max(" . $field . ")" . " FROM " . $this->table);
        }
    }

    public function avg($field) {
        if ($field) {
            return $this->_connection->single("SELECT avg(" . $field . ")" . " FROM " . $this->table);
        }
    }

    public function sum($field) {
        if ($field) {
            return $this->_connection->single("SELECT sum(" . $field . ")" . " FROM " . $this->table);
        }
    }

    public function count($field) {
        if ($field) {
            return $this->_connection->single("SELECT count(" . $field . ")" . " FROM " . $this->table);
        }
    }
    
    public function load($id, $classname){
        $sql = "SELECT * FROM $classname WHERE id = $id";
        $stmt = $this->_connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_CLASS, $classname);
        return $result;
    }

}

?>