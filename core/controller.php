<?php
class Controller {
    var $vars = array();
    function __construct() {
        
    }
    function set($tab){
        $this->vars = $tab;
    }
    
    function render($filename){
        
        require_once('tpl/SmartyBC.class.php');
        $tpl = new SmartyBC();
        $tpl->assign($this->vars);
        $tpl->assign('WEBROOT', WEBROOT);
        $tpl->assign('APPROOT', APPROOT);
        $tpl->assign('ROOT', ROOT);
        $tpl->display(WEBAPPROOT.'views/header.tpl');
        $tpl->display(WEBAPPROOT.'views/nav-bar.tpl');
        $tpl->display(WEBAPPROOT.'views/'.strtolower (get_class($this)).'/'.$filename.'.tpl');
        $tpl->display(WEBAPPROOT.'views/footer.tpl');


        //require(WEBAPPROOT.'views/'.strtolower (get_class($this)).'/'.$filename.'.html');
    }
    function includeFile($filename){
        require(WEBAPPROOT.'views/'.strtolower (get_class($this)).'/'.$filename.'.php');
    }

}