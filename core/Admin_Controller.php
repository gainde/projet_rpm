<?php
require_once (WEBAPPROOT.'models/UserDao.php');
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
       if(strcmp(get_class($this),'Home')!== 0){
            if($this->getUser() == null || $this->getUser()->getIs_admin() !== '1'){
              echo $this->notGrant();
            }
        }
     
    }
    
    function load_css(){  
        $this->css = $this->menuHelper->getCss('admin');
    }
    
    function load_js(){ 
        $this->js = $this->menuHelper->getJs('admin');
    }
   
}