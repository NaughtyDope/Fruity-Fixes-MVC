<html> <body>
        
<div class ="row">
        <div class="panel panel-default panel-background">
            <div class="panel-body">
<?php

echo "<h1>Fixed Report</h1>";

echo "<h2>Select Nature Of Fault</h2><br>";

echo "<center><form name=form1 method = GET><select name = faultName onchange='form1.submit();' class =form-control></center>";

//echo "<select name = faultName onchange='form1.submit();'>";

//echo "<select name = faultName >";
      foreach ($faults as $fault) {
      if ($fault->faultName == $faultName){
      $selected = ' Selected';}
      else{ $selected = '';}


      echo "<option value = '".$fault->faultName."'".$selected.">".$fault->faultName."</option>";
      }
/*

foreach ($faults as $fault) {
    if ($fault->faulName == $faulName){
    $selected = ' Selected';}
else{ $selected = '';}
echo "<option value = ".$fault->faulName.$selected.">".$fault->faulName." </option>";
}*/
?>
</select>
<?php
echo "<input type=hidden name=controller value = technician>";   
echo "<input type=hidden name=controller value = management>";    
echo "<input type=hidden name=action value = fixedFaultsReport>";

?>
</form>

<?php if ($faultReport) { ?>
<center><table border = 1>
        <tr><th>Fault Description</th><th>Diagnosis Method Perfomed On Fault</th><th>Method  Used To Fix Fault</th></tr>
<?php

foreach ($faultReport as $faultReport) {      // an array of student objects
	echo "<tr><td>".$faultReport->faultDescription."</td>";
	echo "<td>".$faultReport->faultDiagnosisMethod."</td>";
	echo "<td>".$faultReport->faultFixMethod."</td></tr>";
	}

echo "</table></center>";
}
?>

    <img src="icon.jpg" width="392" height="470" alt="icon"/></html>

        </div>
    </div>
</div>
    </body>