<?php
require_once (WEBAPPROOT.'bean/Bean.php');
require_once (WEBAPPROOT.'bean/Domaine.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Service
 *
 * @author Moussa Thimbo
 */
class Service extends Bean {

    private $id;
    private $titre;
    private $description;
    
    private $domaine;

    public function __construct(array $params = array()) {
        if (!empty($params)) {
            $vars = get_object_vars($this);
            foreach ($params as $k => $v) {
                if (array_key_exists($k, $vars)) {
                    $this->{$k} = $v;
                }
            }
        }
        if(isset($this->id)){
            $this->domaine = Dao::loadAll('domaine','*', "id_service = $this->id");
            $this->linkObject = array('domaine');
        }
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getTitre() {
        return $this->titre;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getDomaine() {
        return $this->domaine;
    }

    function setId($id) {
        $this->id = $id;
    }
    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function setDescription($desc) {
        $this->description = $desc;
    }

    public function setDomaine($domaine) {
        $this->domaine = $domaine;
    }

    public function setData(Array $data) {
        
    }

    public function getVars() {
        return $this->avoidLinks($this->getLinks(get_object_vars($this)), array("domaine"));
    }

    public function __toString() {
        $chaine = 'id : ' . $this->id . '<br>';
        $chaine .= 'titre : ' . $this->titre . '<br>';
        $chaine .= 'description : ' . $this->description . '<br>';
        $chaine .= 'domaine : ' . $this->domaine . '<br>';
        return $chaine;
    }
}
