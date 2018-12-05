<?php

echo "<form name=form1 method = GET>";


echo "<input type=hidden name=controller value = technician>";    
echo "<input type=hidden name=action value = fixFault>";

echo "<form action='' method = GET>";

//if ($faulrep) { 
?>
 
<center><table border = 2>
        <tr><th>Record Number</th><th>Student Reported</th><th>Fault Cartegory Number</th><th>Fault Report Status</th><th>PC Serial Number</th><th>Date of Report</th><th>Date Report Addressed</th><th>Technician Assigned</th><th>Fault Description</th><th>Fault Diagnosis Method</th><th>Fault Mending Method</th></tr>
<?php

foreach ($faulrep as $faulrep) {      
        echo "<tr><td><input type='text' name='faultRepNr' value=".$faulrep->faultRepNr."></td>";
        echo "<tr><td><input type='text' name='studNr' value=".$faulrep->studNr."></td>";
        echo "<tr><td><input type='text' name='faultNr' value=".$faulrep->faultNr."></td>";
        echo "<tr><td><input type='text' name='faultRepStatus' value=".$faulrep->faultRepStatus."></td>";
        echo "<tr><td><input type='text' name='pcSerialNr' value=".$faulrep->pcSerialNr."></td>";
        echo "<tr><td><input type='text' name='faultRepDate' value=".$faulrep->faultRepDate."></td>";
	echo "<td><input type='text' name='faultFixedDate' value=".$faulrep->faultFixedDate."></td>";
	echo "<td><input type='text' name='techNr' value=".$faulrep->techNr."></td>";
        echo "<tr><td><input type='text' name='faultDescription' value=".$faulrep->faultDescription."></td>";
	echo "<td><input type='text' name='faultDiagnosisMethod' value=".$faulrep->faultDiagnosisMethod."></td>";
	echo "<td><input type='text' name='faultFixMethod' value=".$faulrep->faultFixMethod."></td>";
        echo "<td> <input type = submit value = Fix></td></tr>";
        
        
        
        
}

echo "</table></center>";
//}
?>

</form>