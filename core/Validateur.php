<?php

class Validateur{
    //array(name, string, 1, 30, false),...
    //string => array(array(name, string, 2, 30, false),...)
    var $list_champs;
    var $data;
    
    function __construct($data, $list_champs) {
        $this->list_champs = $list_champs;
        $this->data = $data;
    }
    
    function validationString($string, $lg_min, $lg_max, $nullable = true ){
        if(is_null($string) || empty($string)){
            return $nullable;
        }
        return $this->estDansBorne(count($string),$lg_min,$lg_max);
    }
    
    function validationEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    
    function validationNumerique($valeur, $lg_min, $lg_max, $nullable = true )
    {
        if(is_null($valeur) || empty($valeur)){
            return $nullable;
        }
        if(is_numeric($valeur)){
            return estDansBorne($valeur, $lg_min, $lg_max);
        }
        else {
            return false;
        }
        
    }
    
    function validationFile($files){
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
    
    function validationTelephone($tel){
        
    }
    
    function validationDate($date, $format = 'Y-m-d')
    {
        $date_arr  = explode('-', $date);
        if (count($date_arr) == 3) {
            if (checkdate($date_arr[0], $date_arr[1], $date_arr[2])) {
                $d = DateTime::createFromFormat($format, $date);
                return $d && $d->format($format) == $date;
            } else {
                return false;
            }
        } else {
            return false;
        }
        
    }
    
    function validationdateInf($date1, $date2){
        if($date1 === null || $date2 === null){
            return false;
        }
        $difference = $date1->diff($date2);
        return $difference > 0;
    }
    
    
    
    
    
}
