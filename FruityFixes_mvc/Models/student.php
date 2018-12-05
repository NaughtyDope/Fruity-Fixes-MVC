<?php
include ('Fault.php');
include ('PC.php');

class Student {
       	public $studNr;
	public $studEmail;
      
        public function __construct($studNr, $studEmail) {
      		$this->studNr = $studNr;
      		$this->studEmail = $studEmail;
		
    	}
        
         public static function reportFault($studNr, $faultNr,$pcSerialNr,$faultRepDate, $faultDescription, &$errmess, &$confirm)
                {
            // echo "student ".$studNr." fault nr ".$faultNr." pc serial nuyme ".$pcSerialNr." descript ".$faultDescription;
		$sql = "INSERT INTO tblpcfaultreport (studNr, faultNr,pcSerialNr,faultRepDate, faultDescription) VALUES ('$studNr', 1,'$pcSerialNr',CURDATE(), '$faultDescription')";   
 		$sql2 = "UPDATE tblpc SET pcStatus = 'BROKEN' WHERE pcSerialNr = '$pcSerialNr'";
                $db = Db::getInstance();
                $errmess = "";
		try {
		$db->query($sql);
                $db->query($sql2);
                $confirm = "Fault Successfully Reported";
                }
		catch(pdoexception $e) {
		 $errmess = "There was an error capturring this fault";
                // echo "model error".$errmess;
		}
        } 
        
        public static function find($StudNr) {
      		$db = Db::getInstance();
		$qry = 'SELECT * FROM tblstudent WHERE studNr = "'.$StudNr.'"';
		//echo $qry;
      		$db->prepare($qry);
		$req = $db->query($qry);

      		// the query was prepared, now we replace :username with our actual $username value
      		//$req->execute();
                  
      		$student = $req->fetch();   // fetch; we know there is just one student

      		return new Student($student['studNr'],$student['studEmail']);
    	}
        
        
       public function insert( $studNr, $studEmail) {
        $db = Db::getInstance();
	$qry = 'INSERT INTO tblstudent VALUES ("'.$studNr.'", "'.$studEmail.'")';
        $qry2 =  'INSERT INTO tbluser VALUES ("'.$studNr.'", "'.$studNr.'")';
        $qry3 = 'INSERT INTO tbluserrole VALUES (2,"'.$studNr.'")';
        
        
	$db->query($qry);
        $db->query($qry2);
        $db->query($qry3);
                
        
    }    
        
        
            
     public function delete($studNr) {
        $studNum = mysql_real_escape_string($studNr);
        mysql_query("DELETE FROM tblstudent WHERE id=$studNum");
    }
    	
 }
 
 ?>