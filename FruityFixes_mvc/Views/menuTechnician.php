<html style="text-align:center">
  
   <input type=hidden name=controller value = technician>   
<input type=hidden name=action value = menuTechnician>

<h1> <?php echo $controller." ".$_SESSION["username"] = $user->username;; ?></h1>
    <h2>
        <a href='?controller=technician&action=menuTechnician'>Home</a>
        <a href='?controller=technician&action=modifyPCSpecs'>Modify PC Specifications</a>
	<a href='?controller=technician&action=viewSummaryReport'>View Summary Report</a>
	<a href='?controller=technician&action=techFixes'>Fixes</a>
	<a href='?controller=technician&action=updateTechnicianProfile'>Update Profile</a><hr>
    </h2>

<?php
//require_once 'Views/Footer.php';
?>