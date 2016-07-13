<?php
require_once (WEBROOT.'core/ReglesValidation.php');

class Validateur{
    
    function __construct($data, $list_champs) {
        parent::__construct($data, $list_champs);
    }
    
    function prepare($data) {
        parent::prepare($data);
        $this->list_champs['compareDate'][1] = $this->list_champs['from'][1];
        $this->list_champs['compareDate'][2] = $this->list_champs['to'][1];
        var_dump($this->list_champs);
    }
    
    function valider(){
        $valide =true;
        foreach ($this->list_champs as $key => $value) {
            $valide &= $erreur_array[$key]= call_user_func_array(array($this, array_shift($value)), $value); 
        }
        var_dump($valide);
        var_dump($erreur_array);
        die(var_dump($this->list_champs));
    }
    
    function string($string, $lg_min, $lg_max, $nullable = true ){
        if(is_null($string) || empty($string)){
            return $nullable;
        }
        
        return $this->estDansBorne(strlen($string),$lg_min,$lg_max);
    }
    
    function email($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    
    function numerique($valeur, $lg_min, $lg_max, $nullable = true )
    {
        if(!isset($valeur) || $valeur === null ){
            return $nullable;
        }
        if(is_numeric($valeur)){
            return $this->estDansBorne($valeur, $lg_min, $lg_max);
        }
        else {
            return false;
        }
        
    }
    
    function file(){
        if ($_FILES['imgp']['error'] !== UPLOAD_ERR_OK) {
            return false;
        }
        /*
         * if (!move_uploaded_file(
        $_FILES['upfile']['tmp_name'],
        sprintf('./uploads/%s.%s',
            sha1_file($_FILES['upfile']['tmp_name']),
            $ext
        )
    ))
         */
        $myme_exts= array(
                'jpg' => 'image/jpeg',
                'png' => 'image/png',
                'gif' => 'image/gif',
            );
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        if (false === $ext = array_search(
            $finfo->file($_FILES['imgp']['tmp_name']),$myme_exts,true )) {
                return false;
        }
        if ($files['imgp']['size'] > 2097152) {
            return false;
        }
    }
            
    function validationMotDePasse($motDePasse){
        return true;
    }
    
    
    function estDansBorne($valeur, $lg_min, $lg_max){
        if($valeur>=$lg_min && $valeur<=$lg_max){
            return true;
        }
        else {
            return false;
        }
    }
    
    function telephone($tel){
        false;
    }
    
    function date($date, $format = 'Y-m-d', $delim = '-')
    {
        $date_arr  = explode($delim, $date);
        if (count($date_arr) == 3) {
            if (checkdate($date_arr[1], $date_arr[2],$date_arr[0])) {  
                return true;
                /*$d = DateTime::createFromFormat($format, $date);
                return $d && $d->format($format) == $date;*/
            } else {
                return false;
            }
        } else {
            return false;
        }
        
    }
    
    function dateInf($date1, $date2){
        if($date1 === null || $date2 === null){
            return false;
        }
        /*$difference = $date1->diff($date2);
        return $difference > 0;*/
        return true;
    }
    
    function url($url){
        return filter_var($url, FILTER_VALIDATE_URL);
    }
    
    
    
    
    
    
}
