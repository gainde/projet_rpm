<?php
require_once (WEBAPPROOT.'models/ServiceDao.php');
require_once (WEBAPPROOT.'models/DomaineDao.php');
require_once (WEBAPPROOT.'libs/MenuHelper.php');
require_once (WEBAPPROOT.'libs/ArrayUtils.php');
require_once (WEBROOT.'system/Uri.php');

class Admin_Controller extends Controller{
    
    //private $section = "admin";
    
    function __construct() {
        parent::__construct("admin");
        $this->load_css();
        $this->load_js();
        //$this->header = "admin/header.tpl";
        //$this->footer ="admin/footer.tpl";
    }
    
    function load_css(){  
        $this->css = $this->menuHelper->getCss('admin');
    }
    
    function load_js(){ 
        $this->js = $this->menuHelper->getJs('admin');
    }
    
}