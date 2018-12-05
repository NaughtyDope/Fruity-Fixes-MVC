<?php
  class PagesController {
    public function home() {                
            include ('Views/Header.php');
           require_once('Views/pages/home.php');
            include ('Views/Footer.php');
    }

    public function error() {                
            include ('Views/Header.php');
      require_once('Views/pages/error.php');
            include ('Views/Footer.php');
    }
    
    public function logIn() {                
            include ('Views/Header.php');
      require_once('Views/login.php');
            include ('Views/Footer.php');
    }
  }
?>
