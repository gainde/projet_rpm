<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MenuHelper
 *
 * @author Moussa Thimbo
 */
class MenuHelper {
    private static $instance;
    
    private function __construct() {}
    
    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new MenuHelper();
        }
        
        return self::$instance;
    }
    
    /**
     * pour eviter la copie de l'obget.
     *
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * pour eviter desiarialisation de l'obget.
     *
     * @return void
     */
    private function __wakeup()
    {
    }
    
    function getCss($page = 'default'){
        $css = array();
        $css[] = "bootstrap.min.css";
        $css[] = "font-awesome.min.css";
        if($page == 'admin'){
            $css[] = "bootstrap-theme.css";
            $css[] = "admin/elegant-icons-style.css";
            $css[] = "admin/widgets.css";
            $css[] = "admin/style.css";
            $css[] = "admin/box.css";
            $css[] = "admin/style-responsive.css";
            $css[] = "admin/jquery-ui-1.10.4.min.css";
            $css[] = "admin/jquery-jvectormap-1.2.2.css";
            $css[] = "admin/owl.carousel.css";
        }else{
            $css[] = "style.css";
            $css[] = "bjqs.css";
        }
        return $css;
    }
    function getJs($page = 'default'){
        $js = array();
        if($page == 'admin'){
            $js[] = "admin/jquery.js";
            $js[] = "admin/jquery-ui-1.10.4.min.js";
            $js[] = "admin/jquery-1.8.3.min.js";
            $js[] = "admin/jquery-ui-1.9.2.custom.min.js";
            //charger boostrap apres jquery
            $js[] = "bootstrap.min.js";
            $js[] = "admin/jquery.scrollTo.min.js";
            $js[] = "admin/jquery.nicescroll.js";
            $js[] = "admin/scripts.js";
            $js[] = "admin/jquery.autosize.min.js";
            $js[] = "admin/jquery.placeholder.min.js";
            $js[] = "admin/gdp-data.js";
            $js[] = "admin/morris.min.js";
            $js[] = "admin/sparklines.js";
            $js[] = "admin/jquery.slimscroll.min.js";
            
            $js[] = "admin/jquery.knob.js";
            $js[] = "admin/owl.carousel.js";
        }
        return $js;
    }
            
    function getAdminSideBar(){
        
    }
    

}
