<?php
require_once (WEBAPPROOT.'models/ServiceDao.php');
require_once (WEBAPPROOT.'models/DomaineDao.php');
require_once (WEBAPPROOT.'libs/MenuHelper.php');
require_once (WEBAPPROOT.'libs/ArrayUtils.php');
require_once (WEBROOT.'system/Uri.php');

class Client_Controller extends Controller{
    
    //private $section = "client";
    
    function __construct() {
        parent::__construct("client");

    }
    
    
}