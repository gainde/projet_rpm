<?php

require_once 'CrudInterface.php';
require_once WEBROOT.'system/Database.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dao
 *
 * @author Moussa
 */
class DAO implements CrudInterface {

    protected $db;
    protected $table;
    protected $pk;
    public $variables;

    public function __construct($data = array(), $table = null) {
        $this->db = Database::getInstance();
        if (isset($table)) {
            $this->table = $table;
        }
        //var_dump($this->db);
        $this->variables = $data;
        //var_dump($this->variables);
    }

    public function __set($name, $value) {
        if (strtolower($name) === $this->pk) {
            $this->variables[$this->pk] = $value;
        } else {
            $this->variables[$name] = $value;
        }
    }

    /* public function select($table, $rows = '*', $where = null, $order = null) {
      if ($this->tableExists($table)) {
      $query = 'SELECT ' . $rows . ' FROM ' . $table;
      if ($where != null) {
      $query .= ' WHERE ' . $where;
      }
      if ($order != null) {
      $query .= ' ORDER BY ' . $order;
      }
      $this->numResults = null;
      try {
      $sql = $this->db->prepare($query);
      $sql->execute();
      $this->result = $sql->fetchAll(PDO::FETCH_ASSOC);
      $this->numResults = count($this->result);
      $this->numResults === 0 ? $this->result = null : true;
      return true;
      } catch (PDOException $e) {
      return $e->getMessage() . ' ' . $e->getTraceAsString() . ' ';
      }
      }
      } */

    public function select($rows = '*', $where = null, $order = null) {
        $bindings = null;
        $query = 'SELECT ' . $rows . ' FROM ' . $this->table;
        if ($where == null) {
            $bindings = $this->variables;
            if (!empty($bindings)) {
                $fields = array_keys($bindings);
                $where = "";
                foreach($fields as $value){
                    if (!empty($where)) {
                        $where .= ' AND ';
                    }
                    $where .= $value.' = :'.$value;
                }
            }
        }
        $query .= ' WHERE ' . $where;
        if ($order != null) {
            $query .= ' ORDER BY ' . $order;
        }
        return $this->db->select($query, $bindings, $this->table);
    }

    public function getResult() {
        return $this->result;
    }

    public function getRows() {
        return $this->numResults;
    }

    public function __get($name) {
        if (is_array($this->variables)) {
            if (array_key_exists($name, $this->variables)) {
                return $this->variables[$name];
            }
        }
        $trace = debug_backtrace();
        trigger_error(
                'Undefined property via __get(): ' . $name .
                ' in ' . $trace[0]['file'] .
                ' on line ' . $trace[0]['line'], E_USER_NOTICE);
        return null;
    }

    public function filter() {
        $this->variables = array_filter($this->variables);
    }

    public function create() {
        $bindings = $this->variables;
        if(isset ($bindings['id'])) unset($bindings['id']);

        if (!empty($bindings)) {
            $fields = array_keys($bindings);
            $fieldsvals = array(implode(",", $fields), ":" . implode(",:", $fields));
            $sql = "INSERT INTO " . $this->table . " (" . $fieldsvals[0] . ") VALUES (" . $fieldsvals[1] . ")";
            var_dump($fieldsvals);
            return $this->db->insert($sql, $bindings);
        }
        return false;
    }

    public function read($id = "") {
        if (empty($id)) {
            $id = $this->variables[$this->pk];
        }
        $sql = "SELECT * FROM " . $this->table . " WHERE " . $this->pk . "= :" . $this->pk . " LIMIT 1";
        
        $params = array(":" . $this->pk => $id);
        $result = $this->db->select($sql, $params, $this->table);
        return $result;
    }

    public function update($id = '') {
        $this->variables[$this->pk] = (empty($this->variables[$this->pk])) ? $id : $this->variables[$this->pk];
        $fieldsvals = '';
        $columns = array_keys($this->variables);
        foreach ($columns as $column) {
            if ($column !== $this->pk) {
                $fieldsvals .= $column . " = :" . $column . ",";
            }
        }
        $fieldsvals = substr_replace($fieldsvals, '', -1);
        if (count($columns) > 1) {
            $sql = "UPDATE " . $this->table . " SET " . $fieldsvals . " WHERE " . $this->pk . "= :" . $this->pk;
            //return $this->db->query($sql, $this->variables);
            $result = $this->db->update($sql, $this->variables);
            return $result;
        }
    }

    public function delete($id = "") {
        $sql = "DELETE FROM " . $this->table . " WHERE " . $this->pk . "= :" . $this->pk . " LIMIT 1";

        $id = (!empty($id)) ? $id : $this->variables[$this->pk];
        if (!empty($id)) {
            $params = array(":" . $this->pk, $id);
            //$stmt = $this->db->prepare($sql);
            //$stmt->bindparam(":".$this->pk, $id);
            //$stmt->execute();
            $this->db->delete($sql, $params);
            return true;
        }
        return false;
    }

    public function find($id = "") {
        $this->db->load();
        $id = (empty($this->variables[$this->pk])) ? $id : $this->variables[$this->pk];
        if (!empty($id)) {
            $sql = "SELECT * FROM " . $this->table . " WHERE " . $this->pk . "= :" . $this->pk . " LIMIT 1";
            $this->variables = $this->db->row($sql, array($this->pk => $id));
        }
    }

    public function all($class = '') {
        //TODO: ajouter la classe pour generer l'objet
        //Faire fetch_class si c'est setter sinon fetch_num
        //return $this->db->query("SELECT * FROM " . $this->table);
        $query = "SELECT * FROM " . $this->table;
        //$stmt = $this->db->prepare($query);
        //$stmt->execute();
        if (empty($class)) {
            $result = $this->db->selectAll();
        } else {
            $result = $this->db->selectAll($query, $class);
        }
        //$result = $this->db->selectAll($query,$class);
        return $result;
    }

    public function min($field) {
        if ($field) {
            return $this->db->single("SELECT min(" . $field . ")" . " FROM " . $this->table);
        }
    }

    public function max($field) {
        if ($field) {
            return $this->db->single("SELECT max(" . $field . ")" . " FROM " . $this->table);
        }
    }

    public function avg($field) {
        if ($field) {
            return $this->db->single("SELECT avg(" . $field . ")" . " FROM " . $this->table);
        }
    }

    public function sum($field) {
        if ($field) {
            return $this->db->single("SELECT sum(" . $field . ")" . " FROM " . $this->table);
        }
    }

    public function count($field) {
        if ($field) {
            return $this->db->single("SELECT count(" . $field . ")" . " FROM " . $this->table);
        }
    }
    public function setPrimaryKey($id){
        $this->pk = $id;
    }

    public static function load($id, $class, $pk='id') {
        $dao = new Dao(array('id'=>$id), $class);
        $dao->setPrimaryKey($pk);
        return $dao->read();
    }

}
