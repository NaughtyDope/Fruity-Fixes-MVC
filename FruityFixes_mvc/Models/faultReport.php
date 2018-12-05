<?php

include ('pc.php');
include ('fault.php');

class FaultReport{
    
    public $faultRepNr ;
    public $faultRepStatus ;
    public $faultRepDate ;
    public $faultFixedDate ;
    public $faultDescription ;
    public $faultDiagnosisMethod ;
    public $faultFixMethod;    
    public $year;

    public function __construct($faultRepNr , $faultRepStatus , $faultRepDate , $faultFixedDate , $faultDescription , $faultDiagnosisMethod , $faultFixMethod, $year){
        $this->faultRepNr = $faultRepNr;
        $this->faultRepStatus = $faultRepStatus;
      	$this->faultRepDate = $faultRepDate;
      	$this->faultFixedDate = $faultFixedDate;
      	$this->faultDescription = $faultDescription;
      	$this->faultDiagnosisMethod = $faultDiagnosisMethod;
      	$this->faultFixMethod = $faultFixMethod;
        $this->year = $year;
    }
    
    public static function find($faultRepNr) {
        $db = Db::getInstance();
        $qry = 'SELECT * FROM tblpcfaultreport WHERE faultRepNr = "'.$faultRepNr.'"';
        //echo $qry;
        $db->prepare($qry);
        $req = $db->query($qry);
        
        $faultReport = $req->fetch();   
        
        return new FaultReport($faultReport['faultRepNr'], $faultReport['faultRepStatus'], $faultReport['faultRepDate'], $faultReport['faultFixedDate'], $faultReport['faultDescription'], $faultReport['faultDiagnosisMethod'], $faultReport['faultFixMethod'],$faultReport['year']);
    } 
    
    public static function addreessFault($faultRepNr,$pcSerialNr,$faultRepStatus,$faultFixedDate,$techNr,$faultDiagnosisMethod,$faultFixMethod){
    
        $sql = "UPDATE tblfaultReport SET faultRepStatus = '".$faultRepStatus."', faultFixedDate = '".$faultFixedDate."',  techNr = '".$techNr."',  faultDiagnosisMethod = '".$faultDiagnosisMethod."',  faultFixMethod = '".$faultFixMethod."' WHERE faultRepNr = '".$faultRepNr."'";
        switch ($faultRepStatus){
            case 'FIXED':
                $pcStatus = "FIXED";
                break;
            
            case 'WRITTEN OFF':
                $pcStatus = "WRITTEN OFF";
                break;
                
            case 'PENDING':
                $pcStatus = "BROKEN";
                break;
        }
        
        PC::setPCStatus($pcStatus, $pcSerialNr);

        $db = Db::getInstance();
	
        try {
            $db->query($sql);
	}
	catch(pdoexception $e) {
            echo "There was an error updating the fault report ";
	}
    }

    public static function fixedFaultReport($faultNr) {
             
        $list = array();
        $db = Db::getInstance();
        $sql = $db->query('SELECT *
            FROM pcfaultreportdb.tblpcfaultreport
            WHERE faultRepStatus="FIXED"
            AND faultNr="'.$faultNr.'"');
          
        foreach ($sql->fetchAll() as $faultReport) {
            $list[] = new FaultReport($faultReport['faultRepNr'], $faultReport['faultRepStatus'], $faultReport['faultRepDate'], $faultReport['faultFixedDate'], $faultReport['faultDescription'], $faultReport['faultDiagnosisMethod'], $faultReport['faultFixMethod'],$faultReport['year']);
            
            // $list[] = new Report($fixedFaultReport['labNr'],$statusReport['numOnSelection'], $statusReport['actualNumOfPCs'], $statusReport['actualNumOfPCs']);// 
            

	}
	return $list;
            
    }

}
?>

