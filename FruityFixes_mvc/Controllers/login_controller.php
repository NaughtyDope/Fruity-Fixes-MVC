<?php
include 'Models/pc.php';
include 'Models/fault.php';
 
class LoginController {
	
    public function login() {
            
        $username = filter_input (INPUT_GET,"username")?filter_input (INPUT_GET,"username"): '';
	$password = filter_input (INPUT_GET,"password")?filter_input (INPUT_GET,"password"): '';
	$user= User::find($username,$password);
        
        if (!$user) {
            
            //echo 'Incorrect Login Credentials';
            require_once('Views/login.php');  
            }
        else {	
            
            $user= User::find($username,$password);
            session_start();
            //$user= User::find($username,$password);
            $_SESSION["username"] = $user->username;
            
            if ($user->role=='Technician') {  
            
                $_SESSION["username"] = $user->username;
                include ('Views/Header.php');
                echo " user is ".$_SESSION["username"]; 
                require_once('Views/menuTechnician.php');
                
                include ('Views/Footer.php');
            }
 
            else if ($user->role=='Student') { 
                $labs = Lab::labNum();
                // $labNr = $_GET['labNr'];
                $pcNum = PC::pcNr("15G01");
                $faults = Fault::fault();
                $err = "";
            
                // $faultName = $_GET['faultName'];
                // $fault = Fault::find($faultName);
                // $faultNr = $fault->faultNr;
                
                $_SESSION["username"] = $user->username;
                include ('Views/Header.php'); 
        //      echo " user is ".$_SESSION["username"]; 
                $err="";
                require_once 'Views/Student/reportFault.php';
                //require_once('Views/menuStudent.php');
                include ('Views/Footer.php');
            }
            else if ($user->role=='Management') { 
            
                $_SESSION["username"] = $user->username;
                include ('Views/Header.php'); 
                echo " user is ".$_SESSION["username"]; 
                require_once('views/menuManagement.php');
                include ('Views/Footer.php');}
                }
    	}
    
    public function logout()    {   
        $username = "";
	$password = "";
	$user= "";
        //require_once 'index.php';
        require_once 'Views/login.php';
                
    }
}

?>
