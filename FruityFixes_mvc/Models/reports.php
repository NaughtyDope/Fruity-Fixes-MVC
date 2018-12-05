<?php
//include 'pc.php';
//include 'technician.php';

class Report{
   public $labNr;
    public $numOfFaults;
    public $numOnSelection;
    public $actualNumOfPCs;
    public $percentage;



    public function __construct($labNr, $numOfFaults, $numOnSelection, $actualNumOfPCs,$percentage) {
      		
        $this->labNr = $labNr;
      	$this->numOfFaults  = $numOfFaults;
        $this->numOnSelection = $numOnSelection;
        $this->actualNumOfPCs = $actualNumOfPCs;
        $this->percentage = $percentage;
        
                
    }
        
    public static function all() {
      		
        $list = array();
      	$db = Db::getInstance();
      	$qry = $db->query('SELECT tbllab.labNr,IFNULL(COUNT(tblpcfaultreport.faultNr),0) as numFaults
                FROM tbllab,tblpc,tblpcfaultreport WHERE tblpcfaultreport.pcSerialNr = tblpc.pcSerialNr AND tbllab.labNr = tblpc.labNr GROUP BY labNr
                    ORDER BY 2 DESC');
      
      	foreach ($qry->fetchAll() as $report) {
	$list[] = new Report($report['labNr'],$report['numFaults'], $report['numOnSelection'], $report['actualNumOfPCs'], $report['percentage']);//

	}
	return $list;
	}
        
    public static function pcStatusReport($statusofpc){
         
        $list = array();
        $db = Db::getInstance();
        $sql = $db->query('SELECT tbllab.labNr as labNr, COUNT(tblpc.pcSerialNr) AS numOnSelection , tbllab.labNrOfPCs AS actualNumOfPCs, concat(pcStatus," Percantage in LAB = ",ROUND((COUNT(pcStatus)/176 *100),2),"%") AS percent
                FROM tblpc, tbllab 
                WHERE tblpc.labNr = tbllab.labNr
                AND tblpc.pcStatus = "'.$statusofpc.'"
                GROUP BY tbllab.labNrOfPCs,tbllab.labNr
                ORDER BY 2 DESC,3');
          
           
         
            
        foreach ($sql->fetchAll() as $statusReport) {
            $list[] = new Report($statusReport['labNr'],$statusReport['$numOfFaults'], $statusReport['numOnSelection'], $statusReport['actualNumOfPCs'], $statusReport['percent']);// 
                //Report($statusReport['labNr'],$statusReport['numOnSelection'],$statusReport['actualNumOfPCs']);

	}
	return $list;
    }
    
    public static function fixedFaultsReport($faultNr)  {
        
        FaultReport::fixedFaultReport($faultNr);
    }
        
    public static function viewSumaryReport ($year) {
        LabReport::allLabFaults($year);
        LabReport::fixedLabFaults($year);
        LabReport::pendingLabFaults($year);
    }   
}