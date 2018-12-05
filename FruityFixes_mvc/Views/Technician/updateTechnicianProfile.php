<html> <head>
        
<div class ="row">
        <div class="panel panel-default panel-background">
            <div class="panel-body">
<?php
echo "<input type=hidden name=controller value = technician>";    
echo "<input type=hidden name=action value = updateTechnicianProfile>";

echo "<form action='' method = GET>";
if ($technician) {
/*
//if ($techNr) { ?>
<center><table border = 1>
<tr><th>Current PC Number</th><th>PC Serial Number</th><th>PC Hard Disk Drive</th><th>PC Procesor</th><th>PC RAM</th><th>PC System Type</th><th>PC Status</th></tr>
<?php

foreach ($techNr as $techNr) {      
        echo "<tr><td><input type='text' name='techNr' value=".$techNr->techNr."></td>";
	echo "<td><input type='text' name='techUserName' value=".$techNr->techUserName."></td>";
	echo "<td><input type='text' name='techName' value=".$techNr->techName." /></td>";
	echo "<td><input type='text' name='techEmail' value=".$techNr->techEmail." /></td>";
	echo "<td><input type='text' name='techAddress' value=".$techNr->techAddress." /></td>";
	echo "<td><input type='text' name='techContact' value=".$techNr->techContact." /></td>";
	echo "<td><input type='text' name='password' value=".$techNr->password." /></td>";
        echo "<td> <input type = submit value = Update></td></tr>";
        
}

echo "</table></center>";*/

echo "<tr>
<td>Technician Number </td><br><td><input type=text name=techNr value =".$techNr->techNr."></td></tr><br>";
echo "<tr>
<td>Username </td><br><td><input type=text name=techUserName value =".$techNr->techUserName."></td></tr><br>";
echo "<tr>
<td>Name </td><br><td><input type=text name=techName value =".$techNr->techName."></td></tr><br>";
echo "<tr>
<td>Email Address </td><br><td><input type=text name=techEmail value =".$techNr->techEmail."></td></tr><br>";
echo "<tr>
<td>Residential Address </td><br><td><input type=text name=techAddress value =".$techNr->techAddress."></td></tr><br>";
echo "<tr>
<td>Contact Number </td><br><td><input type=text name=techContact value =".$techNr->techContact."></td></tr><br>";
echo "<tr>
<td>Password </td><br><td><input type=text name=password value =".$techNr->password."></td></tr><br>
<tr>

</td></tr></table><br><br>
<input type=submit value=Update>";
}

echo "</form>
";
?>
        </div>
    </div>
</div>