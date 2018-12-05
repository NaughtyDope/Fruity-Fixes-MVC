<?php

  class User {
    public $username;
    public $role;
   
    	public function __construct($username, $role) {
      		$this->username = $username;
      		$this->role = $role;
    	}

    	public static function find($username,$password) {
	      	$list = array();
      		$db = Db::getInstance();
	  	$sql = "SELECT U.username, R.roleName FROM tbluser U, tblUserrole UR, tblRole R WHERE U.username = UR.username AND R.roleID = UR.roleId AND U.username = '$username' AND U.userPassword='$password'";
	  	$req = $db->query($sql);
		$i=0;
                
         	foreach ($req->fetchAll() as $user) {
        		$list[] = new User($user['username'], $user['roleName']);
			$i++;
        	}
        	if ($i>0){
                    return $list[0];}  
	  	else{
                    return false;}
    	}
}  
?>
