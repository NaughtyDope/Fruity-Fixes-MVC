<?php
  require_once('connFruit.php');
  
  if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];


  }
  else {
    $controller = 'login';   //default controller
    $action     = 'login';	//default action
  }

require_once('routes.php');

?>
