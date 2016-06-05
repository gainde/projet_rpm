<?php

class ReglesValidation{
    /*
     * *Variable regles contient les infprmations de la regle de vaidation des formulaires
     */
    var $regles = array(
        'projet' => array(
            'name' => array(null, 'string', 2, 30, false),
            'description' => array(null, 'string', 2, 30, false),
            'contenu' => array(null, 'string', 2, 30, false),
            'from' => array(null, 'date', null, false),
            'to' => array(null, 'date', null, false),
            'compareDate' => array(null, null, 'dateInf', false)
        ),
        'contact' => array(
            'nom' => array(null, 'string', 2, 30, false),
            'prenom' => array(null, 'string', 2, 30, false),
            'date_naissance' => array(null, 'string', 2, 30, false),
            'adresse' => array(null, 'string', 2, 30, false),
            'date_naissance' => array(null, 'date', null, false)
        )
    );
    
    private function __construct() {}
}

