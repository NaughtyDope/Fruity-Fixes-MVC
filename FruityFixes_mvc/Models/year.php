<?php
class Year{
    
        public $year;


        public function __construct($year) {
      		
                $this->year = $year;
                
    	}
     
        public static function Year() {
      		$list = array();
      		$db = Db::getInstance();
      		$req = $db->query('SELECT DISTINCT(SUBSTRING(tblpcfaultreport.faultRepDate,1,4)) as dateYear FROM tblpcfaultreport');
                
      		foreach($req->fetchAll() as $yearDate) {
        		$list[] = new Year($yearDate['dateYear']);
      		}

      	return $list;
    	}
}