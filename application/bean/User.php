<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Moussa
 */
require_once 'Bean.php';
require_once 'Adresse.php';

class User extends Bean {

    private $id;
    private $nom;
    private $prenom;
    private $username;
    private $email;
    private $date_naissance;
    private $profession;
    private $is_active;
    private $is_verified;
    private $is_admin;
    private $password;
    private $telephone;
    private $adresse;

    public function __construct(array $params = array()) {
        if (!empty($params)) {
            $vars = get_object_vars($this);
            foreach ($params as $k => $v) {
                if (array_key_exists($k, $vars)) {
                    $this->{$k} = $v;
                }
            }
        }
        if (isset($this->adresse)) {
            $this->adresse = Dao::load($this->adresse, 'adresse');
        }
        $this->linkObject = array('adresse');
    }

    public function getLogin() {
        return $this->login;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getProfession() {
        return $this->profession;
    }

    public function getIs_active() {
        return $this->is_active;
    }

    public function getIs_verified() {
        return $this->is_verified;
    }

    public function getIs_admin() {
        return $this->is_admin;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getTelephone() {
        return $this->telephone;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setProfession($profession) {
        $this->profession = $profession;
    }

    public function setIs_active($is_active) {
        $this->is_active = $is_active;
    }

    public function setIs_verified($is_verified) {
        $this->is_verified = $is_verified;
    }

    public function setIs_admin($is_admin) {
        $this->is_admin = $is_admin;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public function setData(Array $data) {
        
    }

    public function getVars() {
        return $this->getLinks(get_object_vars($this));
    }

    public function __toString() {
        $chaine = 'username : ' . $this->username . '<br>';
        $chaine .= 'password : ' . $this->password . '<br>';
        $chaine .= 'nom : ' . $this->nom . '<br>';
        $chaine .= 'prenom : ' . $this->prenom . '<br>';
        $chaine .= 'email : ' . $this->email . '<br>';
        $chaine .= 'profession : ' . $this->profession . '<br>';
        $chaine .= 'telephone : ' . $this->telephone . '<br>';
        return $chaine;
    }

}
