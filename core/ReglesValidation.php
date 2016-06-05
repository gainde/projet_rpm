<?php

class ReglesValidation{
    /*
     * *Variable regles contient les infprmations de la regle de vaidation des formulaires
     */
    static $regles = array(
        'projet' => array(
            'name' => array('string',null , 2, 30, false),
            'description' => array('string', null, 2, 30, false),
            'contenu' => array('string', null, 2, 30, false),
            'from' => array('date', null, false),
            'to' => array('date', null, false),
            'compareDate' => array('dateInf',null, null, false),
            'nameimg' => array('string',null , 2, 30, false),
            'id' => array('numerique',null, 1, 99999, false),
            'url' => array('string',null , 3, 30, false),
            'state' => array('numerique',null, 0, 9999, false),
            'file' => array()
        ),
        'contact' => array(
            'nom' => array('string',null , 2, 30, false),
            'prenom' => array('string',null , 2, 30, false),
            'date_naissance' => array('date', null, false),
            'adresse' => array('string',null , 2, 30, false),
            'date_naissance' => array('date', null, false)
        )
    );
    
    private function __construct() {}
    
    public static function getRegle($key) {
        if(isset(self::$regles[$key])){
            return self::$regles[$key];
        }
        return null;
    }
}

