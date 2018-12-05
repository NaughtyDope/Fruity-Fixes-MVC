<?php
include 'Models/reports.php';
include 'Models/year.php';
class TechnicianController {
    
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
            require_once('views/menuTechnician.php');
            require_once('views/Reports/SummaryReport.php');
            include ('Views/Footer.php');
            }
        else {
                
            $yearDate = Year::Year();
                
            include ('Views/Header.php');
            require_once('views/menuTechnician.php');
            require_once('views/Reports/SummaryReport.php');
            include ('Views/Footer.php');
            }
        }
        
	
    public function modifyPCSpecs() {
            
        if (isset($_GET['labNr']) ) {
		
            $labNr = $_GET['labNr'];
            $current_pc_nr = $_GET['current_pc_nr'];
            $pcSerialNr=$_GET['pcSerialNr'];
            $pcHDD = $_GET['pcHDD'];
            $pcProcersor = $_GET['pcProcersor'];
            $pcRam = $_GET['pcRam'];
            $pcSystemType = $_GET['pcSystemType'];
            $pcStatus = $_GET['pcStatus'];
            $labs = Lab::labNum();
            $pcNum = PC::pcNr($labNr);
            PC::modifyPCSpecs($pcSerialNr, $current_pc_nr, $pcHDD, $pcProcersor, $pcRam, $pcSystemType, $pcStatus);
		
            include ('Views/Header.php');
            require_once('Views/menuTechnician.php');
            require_once('Views/Technician/modifyPCSpecs.php');
            include ('Views/Footer.php');
            }
        
        else{
            $labs = Lab::labNum();
            $pcNum = PC::pcNr($labNr);
                
            include ('Views/Header.php');
            require_once('Views/menuTechnician.php');
            require_once('Views/Technician/modifyPCSpecs.php');
            include ('Views/Footer.php');
            }
	
    }
        
        
    public function addressFault(){
           
        FaultReport::find($faultRepNr);
           
        if (isset($_GET['labNr']) ) {
		
            $faultRepNr = $_GET['faultRepNr'];
            $pcSerialNr = $_GET['pcSerialNr'];
            $faultFixedDate= Date::setDate();
           
            $username = $_SESSION['username'];
            $technician = Technician::find($username);
            $techNr = $technician->techNr;
                
            Technician::profile($techNr);
        
            $techUserName = $_GET['techUserName'];
            $faultDiagnosisMethod = $_GET['faultDiagnosisMethod'];
            $faultFixMethod = $_GET['faultFixMethod'];
//          $labs = Lab::labNum();
//          $pcNum = PC::pcNr($labNr);
            Technician::addressFault($faultRepNr, $pcSerialNr, $faultFixedDate, $techNr, $faultDiagnosisMethod, $faultFixMethod);
		  
            include ('Views/Header.php');
            require_once('Views/menuTechnician.php');
            require_once('Views/Technician/addressFault.php');
            include ('Views/Footer.php');
        }
            
        else{
//          $labs = Lab::labNum();
//          $pcNum = PC::pcNr($labNr);
                
            include ('Views/Header.php');                
            require_once('Views/menuTechnician.php');	     		
            require_once('Views/Technician/addressFault.php');                
            include ('Views/Footer.php');
            }
	
            
        }
        
        
    public function updateTechnicianProfile(){
        
        //session_start();

        $username = $_SESSION['username'];
        $technician = Technician::find($username);
        $techNr = $technician->techNr;
                
        $techNr = Technician::profile($techNr);
        
        $techUserName = $_GET['techUserName'];
        $techName = $_GET['techName'];
        $techEmail = $_GET['techEmail'];
        $techAddress = $_GET['techAddress'];
        $techContact = $_GET['techContact'];
        Technician::editTechnician($techNr, $techUserName, $techName, $techEmail, $techAddress, $techContact, $password);
        
        include ('Views/Header.php');
        require_once('Views/menuTechnician.php');
        echo "I am :".$techNr;
        require_once('Views/Technician/updateTechnicianProfile.php');
        include ('Views/Footer.php');
    }
    
    
    public function menuTechnician(){
        include ('Views/Header.php');
        require_once('Views/menuTechnician.php');
        include ('Views/Footer.php');
        
    }
    
    
    public function techFixes() {
        
          if (isset($_GET['year'])) { 
               
            $year = $_GET['year'];
            $report = Technician::viewSumaryReport($year);
            $yearDate = Year::Year();
            include ('Views/Header.php');
            require_once('views/menuTechnician.php');
            require_once('views/Reports/TechnicianFixes.php');
            include ('Views/Footer.php');
            }
        else {
                
            $yearDate = Year::Year();
                
            include ('Views/Header.php');
            require_once('views/menuTechnician.php');
            require_once('views/Reports/TechnicianFixes.php');
            include ('Views/Footer.php');
            }
    }


    /*  public function deleteStudent() {
        $id = isset($_GET['id'])?$_GET['id']:NULL;
        if ( !$id ) {
            throw new Exception('Internal error.');
        }
        
        $this->customersService->deleteStudent($id);
        
        $this->redirect('index.php');
    }*/
        
}
