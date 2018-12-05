<html> <head>
        
<div class ="row">
        <div class="panel panel-default panel-background ">
            <div class="panel-body">
<?php

echo "<h1>Techician Fixes Report</h1>";

echo "<center><form name=form1 method = GET><select name = faultName onchange='form1.submit();' class =form-control></center>";

echo "<input type=hidden name=controller value = technician>";   
echo "<input type=hidden name=controller value = management>";    
echo "<input type=hidden name=action value = technicianPerfomanceReport>";

?>
</form>

<?php if ($techFixes) { ?>
<center><table border = 1>
        <tr><th>Fault</th><th>Description</th><th>Lab </th><th>PC </th><th>Status </th><th>Repdate </th><th>fix date </th><th>days </th></tr>
<?php

foreach ($techFixes as $techFixes) {      
	echo "<tr><td>".$techFixes->fault."</td>";
	echo "<td>".$techFixes->description."</td>";
	echo "<td>".$techFixes->lab."</td>";
	echo "<td>".$techFixes->pc."</td>";
	echo "<td>".$techFixes->status."</td>";
	echo "<td>".$techFixes->repDate."</td>";
	echo "<td>".$techFixes->fixDate."</td>";
	echo "<td>".$techFixes->days."</td></tr>";
	}

echo "</table></center>";}
?>