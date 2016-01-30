<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <title>Réseau Professionnel Mouride</title>
        <meta name="description" content="Twitter Bootstrap Modal Login Popup - Social Login Popup "/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'/>
        <link href='http://fonts.googleapis.com/css?family=Philosopher' rel='stylesheet' type='text/css'/>
        <link href='http://fonts.googleapis.com/css?family=Source+Code+Pro|Open+Sans:300' rel='stylesheet' type='text/css'/> 


        <link rel="stylesheet" href="{$ROOT}ressources/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="{$ROOT}ressources/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="{$ROOT}ressources/css/lightbox.css"/>
        <link rel="stylesheet" href="{$ROOT}ressources/css/style.css" />
        
         <script src="{$ROOT}ressources/js/lightbox.js"></script>
        <script src="{$ROOT}ressources/js/modernizr-2.6.2.min.js"></script>
        <script src="{$ROOT}ressources/js/jquery-1.10.2.min.js"></script>
        <script src="{$ROOT}ressources/js/bjqs-1.3.min.js"></script>
        <script src="{$ROOT}ressources/js/menu_jquery.js"></script>
        <script language="JavaScript" type="text/javascript">
            function getLoginUrl() {
                var ROOT = {$ROOT};
                return ROOT + "authentification/login/";
            }

        </script>

    </head>
    <body>
        <div class="container main nopadding">
            {include file="$navbar_tpl"}