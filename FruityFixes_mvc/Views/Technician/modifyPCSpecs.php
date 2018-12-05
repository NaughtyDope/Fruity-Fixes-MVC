<?php

echo "<form name=form1 method = GET>";

echo "Lab Number:<br>
<select name = labNr onchange='form1.submit();'>";

foreach ($labs as $lab) {  
    if ($lab->labNr == $labNr){
    $selected = ' Selected';}
else{ $selected = '';}
echo "<option value = ".$lab->labNr.$selected.">".$lab->labNr."</option>";
}
?>
<?php
echo "<input type=hidden name=controller value = technician>";    
echo "<input type=hidden name=action value = modifyPCSpecs>";

?>
</select>


<?php

echo "<form action='' method = GET>";

if ($pcNum) { ?>
<center><table border = 1>
<tr><th>Current PC Number</th><th>PC Serial Number</th><th>PC Hard Disk Drive</th><th>PC Procesor</th><th>PC RAM</th><th>PC System Type</th><th>PC Status</th></tr>
<?php

foreach ($pcNum as $pcNum) {      
        echo "<tr><td><input type='text' name='pcSerialNr' value=".$pcNum->pcSerialNr."></td>";
	echo "<td><input type='text' name='current_pc_nr' value=".$pcNum->current_pc_nr."></td>";
	echo "<td><input type='text' name='pcHDD' value=".$pcNum->pcHDD." /></td>";
	echo "<td><input type='text' name='pcProcersor' value=".$pcNum->pcProcersor." /></td>";
	echo "<td><input type='text' name='pcRam' value=".$pcNum->pcRam." /></td>";
	echo "<td><input type='text' name='pcSystemType' value=".$pcNum->pcSystemType." /></td>";
	echo "<td><input type='text' name='pcStatus' value=".$pcNum->pcStatus." /></td>";
        echo "<td> <input type = submit value = Modify></td></tr>";
        
        
        
        
}

echo "</table></center>";
}
?>

</form>