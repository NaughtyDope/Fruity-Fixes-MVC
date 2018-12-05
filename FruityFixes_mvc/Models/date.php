<?php


class Date {
    
    public $date;
    public $year;
        

    public function __construct($date,$year) {
      	
        $this->date = $date;
        $this->year = $year;
                
    	}
     
    
    public static function setDate(){
        $db = Db::getInstance();
        $sql = "SELECT CURDATE() AS today FROM DUAL";
        
        $db->prepare($sql);
        $req = $db->query($sql);
        
        $todate = $req->fetch();
                
        return new Date ($todate['today'], $todate['year']);
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