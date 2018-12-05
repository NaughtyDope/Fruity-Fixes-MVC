<?php

include ('lab.php');

class PC {
    public $pcSerialNr;
    public $current_pc_nr ;
    public $pcHDD ;
    public $pcProcersor ;
    public $pcRam ;
    public $pcSystemType ;
    public $pcStatus;
    public $percent;




    public function __construct($pcSerialNr ,$current_pc_nr ,$pcHDD ,$pcProcersor ,$pcRam ,$pcSystemType ,$pcStatus,$percent) {
      		
        $this->pcSerialNr = $pcSerialNr;
      	$this->current_pc_nr = $current_pc_nr;
      	$this->pcHDD = $pcHDD;
      	$this->pcProcersor = $pcProcersor;
      	$this->pcRam = $pcRam;
      	$this->pcSystemType = $pcSystemType;
      	$this->pcStatus = $pcStatus;
        $this->percent = $percent;
        
                
    	}

    public static function all() {
      		
        $list = array();
      	$db = Db::getInstance();
      	$qry = $db->query('SELECT * FROM tblpc');
      
        foreach($qry->fetchAll() as $fault) {
        $list[] = new PC($pc['pcSerialNr'], $pc['current_pc_nr'], $pc['pcHDD'], $pc['pcProcersor'], $pc['pcRam'], $pc['pcSystemType'], $pc['pcStatus'], $pc['percent']);
      	}

      	return $list;
    	}
        
    public static function find($current_pc_nr,$labNr) {
      		
        $db = Db::getInstance();
	$qry = 'SELECT pcSerialNr FROM tblpc WHERE current_pc_nr = "'.$current_pc_nr.'" AND labNr = "'.$labNr.'"';
	
        $db->prepare($qry);
	$req = $db->query($qry);

        $pc = $req->fetch();   

      	return new PC ($pc['pcSerialNr'], $pc['current_pc_nr'], $pc['pcHDD'], $pc['pcProcersor'], $pc['pcRam'], $pc['pcSystemType'], $pc['pcStatus'], $pc['percent']);
    }
        
    public static function pcNr($labNr) {
      		$list = array();
      		$db = Db::getInstance();
      		$req = $db->query('SELECT * FROM tblpc WHERE labNr = "'.$labNr.'" ORDER BY current_pc_nr ');
      // we create a list of Student objects from the database results
      		foreach($req->fetchAll() as $pc) {
        		$list[] = new PC($pc['pcSerialNr'], $pc['current_pc_nr'], $pc['pcHDD'], $pc['pcProcersor'], $pc['pcRam'], $pc['pcSystemType'], $pc['pcStatus'], $pc['percent']);
      		}

      	return $list;
    	}
        
    public static function setPCStatus($pcStatus,$pcSerialNr){
            
               $sql = "UPDAtE tblpc SET pcStatus = '".$pcStatus."' WHERE psSerialNr = '".$psSerialNr."'";
                $db = Db::getInstance();
		try {
		$db->query($sql);
		}
		catch(pdoexception $e) {
		 echo "There was an error updating the PC status";
		}
        }
        
    public static function pcStatus()   {
           
        $list = array();
      	$db = Db::getInstance();
      	$req = $db->query('SELECT DISTINCT(pcStatus) as status FROM tblpc ORDER BY pcStatus');
          
        foreach($req->fetchAll() as $statusPC) {
            
        $list[] = new PC($statusPC['pcSerialNr'],$statusPC['current_pc_nr'],$statusPC['pcHDD'],$statusPC['pcProcersor'],$statusPC['pcRam'],$statusPC['pcSystemType'],$statusPC['status'], $pc['percent']);
                             
      	}
      	return $list;
        }
         
    public static function percentage($pcStatus) {
      	
        $db = Db::getInstance();
	$qry = 'SELECT concat("The Overrall ",pcStatus," Percantage For All Laboratories is ",ROUND((COUNT(pcStatus)/176 *100),2),"%") AS percentage From tblpc,tbllab 
                    WHERE tbllab.labNr=tblpc.labNr
                    AND pcStatus="'.$pcStatus.'"';
		
        $db->prepare($qry);
	$req = $db->query($qry);

        $percentage = $req->fetch();   

      	return new PC ($percentage['pcSerialNr'], $percentage['current_pc_nr'], $percentage['pcHDD'], $percentage['pcProcersor'], $percentage['pcRam'], $percentage['pcSystemType'], $percentage['pcStatus'], $percentage['percentage']);
    }
    
    public static function modifyPCSpecs($pcSerialNr, $current_pc_nr, $pcHDD, $pcProcersor, $pcRam, $pcSystemType, $pcStatus){
     
        $sql = "UPDATE tblpc SET  pcHDD = '".$pcHDD."',  pcProcersor = '".$pcProcersor."',  pcRam = '".$pcRam."',  pcSystemType = '".$pcSystemType."',  pcStatus = '".$pcStatus."' WHERE pcSerialNr = '".$pcSerialNr."'";
 	$db = Db::getInstance();
	
        try {
            $db->query($sql);
	}
        catch(pdoexception $e) {
            echo "There was an error modifying the PC";
	}
		
    }
         
            
	        
 }

