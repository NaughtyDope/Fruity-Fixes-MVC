<?php
include ('faultReport.php');

class Technician {
    public $techNr;
    public $techUserName;
    public $techName;
    public $techEmail;
    public $techAddress;
    public $techContact;
        
    public function __construct($techNr, $techUserName, $techName, $techEmail,$techAddress, $techContact) {
        
        $this->techNr =$techNr;
      	$this->techName = $techName;
	$this->techUserName = $techUserName;
        $this->techEmail = $techEmail;
	$this->techAddress = $techAddress;
        $this->techContact = $techContact;
    }
    
    public static function all()    {
       		
        $list = array();
        $db = Db::getInstance();
        $qry = $db->query("SELECT * FROM tbltechnician");
      
        foreach($qry->fetchAll() as $technician) {
        		
            $list[] = new Technician($technician['techNr'],$technician['techUserName'],$technician['techName'],$technician['techEmail'],$technician['techAddress'],$technician['techContact']);
      	
            }

      	return $list; 
        
    }

    
    public static function find($techNr) {
      		
        $db = Db::getInstance();
        $qry = 'SELECT * FROM tbltechnician WHERE techNr = "'.$techNr.'"';
        //echo $qry;

        $db->prepare($qry);
        $req = $db->query($qry);

        $technician = $req->fetch();  
        
        return new Technician($technician['techNr'],$technician['techUserName'],$technician['techName'],$technician['techEmail'],$technician['techAddress'],$technician['techContact']);
      	
    	}
    
        
    public static function profile($techNr) {
      		
        $list = array();
        $db = Db::getInstance();
        $qry = $db->query("SELECT * FROM tbltechnician WHERE techNr = '".$techNr."'");
      
        foreach($qry->fetchAll() as $technician) {
        		
            $list[] = new Technician($technician['techNr'],$technician['techUserName'],$technician['techName'],$technician['techEmail'],$technician['techAddress'],$technician['techContact']);
      	
            }

      	return $list;
    }
	   
    
    public static function addressFault($faultRepNr,$pcSerialNr,$faultFixedDate,$techNr,$faultDiagnosisMethod,$faultFixMethod){
        
        FaultReport::addreessFault($faultRepNr, $pcSerialNr, $faultRepStatus, $faultFixedDate, $techNr, $faultDiagnosisMethod, $faultFixMethod);
            
            
    }
     
    
    public static function addNewTechnician ($techNr,$techUserName,$techName,$techEmail,$techAddress,$techContact,$errmsg){
        
        
        
        $query = 'INSERT INTO tbltechnician VALUES ("'.$techNr.'","'.$techUserName.'","'.$techName.'","'.$techEmail.'","'.$techAddress.'","'.$techContact.'")';
        $query2 = 'INSERT INTO tbluser VALUES ("'.$techNr.'","'.$techNr.'")';
        $query3 = 'INSERT INTO tbluserrole VALUES (1,"'.$techNr.'")';
        $errmsg = "";
        
        $db = Db::getInstance();
		try {
		$db->query($query);
		$db->query($query2);
		$db->query($query3);
		}
		catch(pdoexception $e) {
		 $errmsgc = "There was an error Registering the Technician";
		}
    } 

    
    public static function editTechnician ($techNr,$techUserName,$techName,$techEmail,$techAddress,$techContact,$password){
        $qry = "UPDATE tbltechnician SET techUserName = '".$techUserName."' ,techName = '".$techName."',techEmail = '".$techEmail."',techAddress = '".$techAddress."',techContactNr = '".$techContact."' WHERE techNr = '".$techNr."'";
        $qry2 = "UPDATE tbluser SET password = '".$password."'";
        
        
    }
    
    
    /*        
        public function deleteStudent( $studNr ) {
        try {
            $via = Student::class;
            $this->openDb();
            $res = $this->studentD->delete($studNr);
            $this->closeDb();
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
      */
}

class TechnicianReport  {
    
    public $fault;
    public $description;
    public $lab;
    public $pc;
    public $status;
    public $repDate;
    public $fixDate;
    public $days;
    
    public function __construct($fault,$description,$lab,$pc,$status,$repDate,$fixDate,$days) {
        
        $this->fault = $fault;
        $this->description = $description;
        $this->lab = $lab;
        $this->pc = $pc;
        $this->status = $status;
        $this->repDate = $repDate;
        $this->fixDate = $fixDate;
        $this->days = $days;
    }
    
    public static function technicianFixes($techNr)  {
        
        $db = Db:: getInstance();
	$list = array();
    
	$sql = "SELECT tblfault.faultName AS fault, tblpcfaultreport.faultDescription AS description, tbllab.labNr AS lab,tblpc.current_pc_nr AS pc, pcstatus AS status, tblpcfaultreport.faultRepDate AS repDate, tblpcfaultreport.faultFixedDate AS fixDate, datediff(faultfixeddate,faultrepdate) AS days
            FROM tblpcfaultreport, tblfault, tbllab, tblpc
            WHERE tblpcfaultreport.faultNr = tblfault.faultNr
            AND tblpcfaultreport.pcSerialNr = tblpc.pcSerialNr
            AND tblpcfaultreport.techNr='".$techNr."'
            AND SUBSTRING(tblpcfaultreport.faultRepDate,1,4) = 2017
            AND SUBSTRING(tblpcfaultreport.faultRepDate,6,2) = 01
            AND SUBSTRING(tblpcfaultreport.faultFixedDate,1,4) = 2017
            AND SUBSTRING(tblpcfaultreport.faultFixedDate,6,2) = 01 ";
	
	$req = $db->query($sql);
	foreach ($req->fetchAll() as $techFixes) {
            $list[] = new TechnicianReport($techFixes['fault'],$techFixes['description'],$techFixes['lab'],$techFixes['pc'],$techFixes['status'],$techFixes['repDate'],$techFixes['fixDate'],$techFixes['days']);

	}
	return $list;
    }
}



?>
