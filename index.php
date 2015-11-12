<?php

/*
 * @autheur: Moussa Thimbo
 * Dispatcher
 */
/* spl_autoload_register(function ($class) {
  include 'system/' . $class . '.class.php';
  }); */

require_once 'system/config.php';

include WEBROOT.'system/Application.php';
require ('core/controller.php');
$app = new Application();
