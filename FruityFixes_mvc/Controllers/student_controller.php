<?php
#include ("Models/Student.php");


class StudentController {
    
    public function reportFault() {
        //try{    
           
	if (isset($_GET['labNr'])) {
            $labs = Lab::labNum();
            $labNr = $_GET['labNr'];
            $pcNum = PC::pcNr($labNr);
            $faults = Fault::fault();
            
            $faultName = $_GET['faultName'];
            $fault = Fault::find($faultName);
            $faultNr = $fault->faultNr;
            
            session_start();
            
            $username = $_SESSION['username'];
            $student = Student::find($username);
            $studNr = $student->studNr;
            
            $pcNr = $_GET['pcNr'];
            $pcSerialNr = PC::find($pcNr, $labNr)->pcSerialNr;
 //         $faultRepDate = Date::setDate();
            
            $faultDescription = $_GET['faultDescription'];
            
     //       $faultRepDate = Date::setDate()->date;
            
            Student::reportFault($studNr, $faultNr,$pcSerialNr,$faultRepDate, $faultDescription, $err, $cornmess);
            
            include ('Views/Header.php');
            //echo "Today Is ".$faultRepDate->date;
          //  echo $cornmess;
     //       require_once('Views/menuStudent.php');
   //         echo "controller".$err;
   //  echo 'Nature '.$faultName;
            require_once ('Views/Student/reportFault.php');
            include ('Views/Footer.php');
	} 
        else{
            session_start();
            $username = $_SESSION['username'];
            echo " username ".$username;
            $student = Student::find($username);
            $studNr = $student->studNr;
            $labs = Lab::labNum();
            $faults = Fault::fault();
            
            include ('Views/Header.php');
     //       require_once('Views/menuStudent.php');
     echo 'Nature '.$faultName;
            require_once ('Views/Student/reportFault.php');
            $err="";
   //         echo "1st controller".$err;
            include ('Views/Footer.php');
	} 
  //      echo 'Trees';
        /*}
		catch(pdoexception $e) {
                     require_once ('Views/Student/reportFault.php');
		 echo "Error reporting fault";
                include ('Views/Footer.php');
		}*/
    }
    
    
    
        public function registerStudent() {
       if (isset($_GET['studNr'])) {
            $studNr = $_GET['studNr'];
            $studEmail = $_GET['studEmail'];
            Student::insert($studNr,$studEmail);
                include ('Views/Header.php');
		require_once('Views/menuStudent.php');
                require_once 'Views/Student/student-form.php';
                include ('Views/Footer.php');
       }
       else
       {
                include ('Views/Header.php');
	//	require_once('Views/menuStudent.php');
           require_once 'Views/Student/student-form.php';
           //     include ('Views/Footer.php');
       }
        }
  
}



?>