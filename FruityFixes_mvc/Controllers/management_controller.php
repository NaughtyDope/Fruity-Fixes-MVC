<?php
include 'Models/reports.php';
include 'Models/year.php';


class ManagementController{
 
    
    public function registerTechnician(){
     
//  if (isset($_GET['techNr'])) {   
        $techNr = $_GET['techNr'];
        $techUserName = $_GET['techUserName'];
        $techName = $_GET['techName'];
        $techEmail = $_GET['techEmail'];
        $techAddress = $_GET['techAddress'];
        $techContact = $_GET['techContact'];
        
//      Technician::addNewTechnician($techNr, $techUserName, $techName, $techEmail, $techAddress, $techContact);
        Management::registerNewTechnician($techNr, $techUserName, $techName, $techEmail, $techAddress, $techContact,$resp);
                
        include ('Views/Header.php');
        require_once('views/menuManagement.php');
        echo $resp;
        require_once('views/Management/addNewTechnician.php');
        include ('Views/Footer.php');
       /* 
         }
    else    {
        
        $techNr=NULL;
        include ('Views/Header.php');
        require_once('views/menuManagement.php');
        require_once('views/Management/addNewTechnician.php');
        include ('Views/Footer.php');
        
         }
       */
    }
    
 
    public function viewSummaryReport() {
           
        if (isset($_GET['year'])) { 
               
            $year = $_GET['year'];
           // $report = LabReport::allLabFaults($year);
            $all = Lab::all();
            $allLab = LabReport::allLabFaults($year);
            $pendinglab = LabReport::pendingLabFaults($year);
            $fixedlab = LabReport::fixedLabFaults($year);
            $writtenOfflab = LabReport::WrittenOffLabFaults($year);
            $yearDate = Year::Year();
            include ('Views/Header.php');
            require_once('views/menuManagement.php');
            require_once('views/Reports/SummaryReport.php');
            include ('Views/Footer.php');
            }
        else {
                
            $yearDate = Year::Year();
                
            include ('Views/Header.php');
            require_once('views/menuManagement.php');
            require_once('views/Reports/SummaryReport.php');
            include ('Views/Footer.php');
            }
        }
        
        
    public function menuManagement() {
        require_once('views/menuManagement.php');
        include ('Views/Footer.php');
        }
        
        
    public function techFixes() {
        
        if (isset($_GET['year'])) { 
               
            $year = $_GET['year'];
            $report = Technician::viewSumaryReport($year);
            $yearDate = Year::Year();
            include ('Views/Header.php');
            require_once('views/menuManagement.php');
            require_once('views/Reports/TechnicianFixes.php');
            include ('Views/Footer.php');
            }
        else {
                
            $yearDate = Year::Year();
                
            include ('Views/Header.php');
            require_once('views/menuManagement.php');
            require_once('views/Reports/TechnicianFixes.php');
            include ('Views/Footer.php');
            }
    }
    
    
    public function pcStatusReport()    {
        
        if (isset($_GET['pcStatus']))   {
            
            $pcStatus = $_GET['pcStatus'];
            $report = Report::pcStatusReport($pcStatus);
            $percentage = PC::percentage($pcStatus);
            $statusPC = PC::pcStatus();
        
            include ('Views/Header.php');
            require_once('views/menuManagement.php');
            require_once('views/Reports/pcStatusReport.php');
            include ('Views/Footer.php');
        }
        else{
            
            $statusPC = PC::pcStatus();
           // echo 'ttrwe '.$statusPC;
            
             include ('Views/Header.php');
            require_once('views/menuManagement.php');
            require_once('views/Reports/pcStatusReport.php');
            include ('Views/Footer.php');
        }
        
    }
    
    
    public function fixedFaultsReport()  {
        
         if (isset($_GET['faultName']))   {
             
            $faults = Fault::fault();
            
            $faultName = $_GET['faultName'];
            $fault = Fault::find($faultName);
            $faultNr = $fault->faultNr;
            
            
        /*    $fault = Fault::fault();
            $faulName =  $_GET['faulName'];
            
            //$faultNr = Fault::find($faulName);*/
            
            //$report = Report::fixedFaultsReport($faultNr);
            $faultReport = FaultReport::fixedFaultReport($faultNr); 
            
            include ('Views/Header.php');
            require_once('views/menuManagement.php');
     echo 'Nature '.$faultName;
            require_once('views/Reports/fixedFaultsRep.php');
            include ('Views/Footer.php');
        }
        else{
   //         $fault = Fault::fault();
            
            $faults = Fault::fault();
            
            include ('Views/Header.php');
            require_once('views/menuManagement.php');
     echo 'Nature '.$faultName;
            require_once('views/Reports/fixedFaultsRep.php');
            include ('Views/Footer.php');
        }
        
    }
    
    public function technicianPerfomanceReport()    {
        if (isset($_GET['techNr']))   {
       
            $techNr = $_GET['techNr'];
            
            $technician = Technician::all();
            /*
            $tech = filter_input (INPUT_GET,"techNr")?filter_input (INPUT_GET,"techNr"): '';
            $techNr = Technician::find($tech);*/
            $techFixes = TechnicianReport::technicianFixes($techNr);
        
        
            include ('Views/Header.php');
            require_once('views/menuManagement.php');
            echo $techNr."  ";
            echo $techFixes;
            require_once('views/Reports/TechnicianFixes.php');
            include ('Views/Footer.php');
        }
        else{
            
            $technician = Technician::all();
            include ('Views/Header.php');
            require_once('views/menuManagement.php');
            require_once('views/Reports/TechnicianFixes.php');
            include ('Views/Footer.php');
        }
    }
}

