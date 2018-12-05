<?php
require 'technician.php';

class Management {
    public $manID;
    public $manName;
    public $manDepartment;
                
    function __construct() {
       
        $this->manID = $manID;  
        $this->manName = $manName;
        $this->manDepartment = $manDepartment;        
        
    }
    
    public static function registerNewTechnician ($techNr,$techUserName,$techName,$techEmail,$techAddress,$techContact,$err){
        /*
        if($techNr==""){
            $techNr=NULL;
        }*/
        
        Technician::addNewTechnician($techNr, $techUserName, $techName, $techEmail, $techAddress, $techContact,$err);
        
    }

}