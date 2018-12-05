<html> <head>
        
<div class ="row">
        <div class="panel panel-default panel-background">
            <div class="panel-body">
<?php

echo "<h1>PC Status Report</h1>";

echo "<h2>Select PC Status For Report</h2>";

echo "<center><form name=form1 method = GET><select name = pcStatus onchange='form1.submit();' class =form-control></center>";

foreach ($statusPC as $statusPC) {
    if ($statusPC->pcStatus == $pcStatus){
    $selected = ' Selected';}
else{ $selected = '';}
echo "<option value = ".$statusPC->pcStatus.$selected.">".$statusPC->pcStatus." </option>";
}
?>

</select>
<?php
echo "<input type=hidden name=controller value = technician>";   
echo "<input type=hidden name=controller value = management>";    
echo "<input type=hidden name=action value = pcStatusReport>";

?>
</form>

<?php if ($report) { ?>
<center><table border = 1>
<tr><th>Lab Number</th><th>Number of PCs Based On Selection</th><th>Actual Number of PCs</th><th>Percentage On LAB Based On Selection</th></tr>
<?php

foreach ($report as $report) {      
	echo "<tr><td>".$report->labNr."</td>";
	echo "<td>".$report->numOnSelection."</td>";
	echo "<td>".$report->actualNumOfPCs."</td>";
	echo "<td>".$report->percentage."</td></tr>";
	}
        
echo $percentage->percent;
echo "</table></center>";

}
?>

    <img src="icon.jpg" width="392" height="470" alt="icon"/></html>

        </div>
    </div>
</div>