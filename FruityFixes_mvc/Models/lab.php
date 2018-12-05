<?php

class Lab {

    public $labNr;
    public $labNrOfPCs;




    public function __construct($labNr, $labNrOfPCs) {
      		
        $this->labNr = $labNr;
      	$this->labNrOfPCs  = $labNrOfPCs;
    }
               
    public static function all() {
	$db = Db:: getInstance();
	$list = array();
	$sql = "SELECT * FROM tbllab ORDER BY 1";
	$req = $db->query($sql);
	foreach ($req->fetchAll() as $all) {
            $list[] = new Lab($all['labNr'],$all['labNrOfPCs']);

	}
	return $list;
    }    
    
      

    public static function updateNrOfPCs (){
        //$db = Db::getInstance();
        $sql = $db->query('UPDATE tbllab SET labNrOfPCs = labNrOfPCs + 1 WHERE labNr = $labNr');
    }
        
        /*
	public static function getLabNr (){
            $sql2 = $db2->query('SELECT labNr FROM tbllab');
            
        }*/
 	
    public static function labNum() {
      		
        $list = array();
      	$db = Db::getInstance();
      	$req = $db->query('SELECT labNr FROM tbllab WHERE labNr != "STORAGE"');
        
        foreach($req->fetchAll() as $lab) {
            $list[] = new Lab($lab['labNr'],$lab['labNrOfPCs']);
      	}

      	return $list;
    	}

}

class LabReport {
    
    public $labNr;
    public $numAll;
    public $numFixed;
    public $numPendig;
    public $numWrittenOff;




    public function __construct($labNr, $numAll,$numFixed,$numPendig,$numWrittenOff) {
      		
        $this->labNr = $labNr;
        $this->numAll = $numAll;
      	$this->numFixed  = $numFixed;
        $this->numPendig = $numPendig;
        $this->numWrittenOff = $numWrittenOff;
    }
       
    public static function allLabFaults($year) {
	$db = Db:: getInstance();
	$list = array();
	$sql = "SELECT l.labNr,count(newt.pcserialnr) as numFaults
                FROM (tbllab as l inner join tblpc as p on p.labnr = l.labnr) left join 
(SELECT pcserialnr, faultrepstatus, faultrepdate FROM tblpcfaultreport as r WHERE SUBSTRING(r.faultRepDate,1,4) = '$year') as newt on
		p.pcserialnr = newt.pcserialnr
                    GROUP BY l.labNr
                    ORDER BY 1";
	//echo $sql;
	
	$req = $db->query($sql);
	foreach ($req->fetchAll() as $allLab) {
            $list[] = new LabReport($allLab['labNr'],$allLab['numFaults'],$allLab['numFixed'], $allLab['numPendig'], $allLab['numWrittenOff']);

	}
	return $list;
    }    
    
    public static function fixedLabFaults ($year) {
	$db = Db:: getInstance();
	$list = array();
	$sql = "SELECT l.labNr,count(newt.pcserialnr) as numFixed
                FROM (tbllab as l inner join tblpc as p on p.labnr = l.labnr) left join 
(SELECT pcserialnr, faultrepstatus, faultrepdate FROM tblpcfaultreport as r WHERE SUBSTRING(r.faultRepDate,1,4) = '$year' and r.faultRepStatus = 'FIXED') as newt on
		p.pcserialnr = newt.pcserialnr
                    GROUP BY l.labNr
                    ORDER BY 1";
	//echo $sql;
	
	$req = $db->query($sql);
	foreach ($req->fetchAll() as $fixedlab) {
            $list[] = new LabReport($fixedlab['labNr'],$fixedlab['numAll'],$fixedlab['numFixed'], $fixedlab['numPendig'], $fixedlab['numWrittenOff']);

	}
	return $list;
    }
    
    public static function pendingLabFaults ($year) {
	$db = Db:: getInstance();
	$list = array();
	$sql = "SELECT l.labNr,count(newt.pcserialnr) as numPendig
                FROM (tbllab as l inner join tblpc as p on p.labnr = l.labnr) left join
                (SELECT pcserialnr, faultrepstatus, faultrepdate FROM tblpcfaultreport as r WHERE SUBSTRING(r.faultRepDate,1,4) = '$year' and r.faultRepStatus = 'PENDING') as newt on
		p.pcserialnr = newt.pcserialnr
                    GROUP BY l.labNr
                    ORDER BY 1";
	//echo $sql;
	
	$req = $db->query($sql);
	foreach ($req->fetchAll() as $pendinglab) {
            $list[] = new LabReport($pendinglab['labNr'],$pendinglab['numAll'],$pendinglab['numFixed'], $pendinglab['numPendig'], $pendinglab['numWrittenOff']);

	}
	return $list;
    }
    
    public static function WrittenOffLabFaults ($year) {
	$db = Db:: getInstance();
	$list = array();
	$sql = "SELECT l.labNr,count(newt.pcserialnr) as numWrittenOff
                FROM (tbllab as l inner join tblpc as p on p.labnr = l.labnr) left join
                (SELECT pcserialnr, faultrepstatus, faultrepdate FROM tblpcfaultreport as r WHERE SUBSTRING(r.faultRepDate,1,4) = '$year' and r.faultRepStatus = 'WRITTEN OFF') as newt on
		p.pcserialnr = newt.pcserialnr
                    GROUP BY l.labNr
                    ORDER BY 1";
	//echo $sql;
	
	$req = $db->query($sql);
	foreach ($req->fetchAll() as $writtenOfflab) {
            $list[] = new LabReport($writtenOfflab['labNr'],$writtenOfflab['numAll'],$writtenOfflab['numFixed'], $writtenOfflab['numPendig'], $writtenOfflab['numWrittenOff']);

	}
	return $list;
    }
    
}
  
      