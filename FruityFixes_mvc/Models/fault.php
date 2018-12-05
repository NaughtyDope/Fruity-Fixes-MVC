<?php


  class Fault {
       // they are public so that we can access them using $student->surname (e.g.) directly
    	public $faultNr;
	public $faultName;
        




        public function __construct($faultNr, $faultName) {
      		$this->faultNr = $faultNr;
      		$this->faultName  = $faultName;
                
    	}

	public static function all() {
      		$list = array();
      		$db = Db::getInstance();
      		$qry = $db->query('SELECT * FROM tblfault');
      
      		foreach($qry->fetchAll() as $fault) {
        		$list[] = new Fault($fault['faultNr'], $fault['faultName']);
      		}

      	return $list;
    	}
    	
        public static function find($faultName) {
      		$db = Db::getInstance();
		$qry = 'SELECT faultNr FROM tblfault WHERE faultName = "'.$faultName.'"';
		//echo $qry;
      		$db->prepare($qry);
		$req = $db->query($qry);

      		$fault = $req->fetch();   

      		return new Fault($fault['faultNr'],$fault['faultName']);
    	}
        
        public static function fault() {
      		
            $list = array();
            $db = Db::getInstance();
            $req = $db->query('SELECT faultName FROM tblfault');
            
            foreach($req->fetchAll() as $fault) {
                $list[] = new Fault($fault['faultNr'],$fault['faultName']);
            }

            return $list;
    	}
}
