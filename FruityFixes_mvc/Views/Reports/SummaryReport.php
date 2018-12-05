<html> <head>
        
<div class ="row">
        <div class="panel panel-default panel-background">
            <div class="panel-body">
<?php

echo "<h1>Yearly Summary Report</h1>";

echo "<h2>Select Year For Report</h2>";

echo "<center><form name=form1 method = GET><select name = year onchange='form1.submit();' class =form-control></center>";


foreach ($yearDate as $yearDate) {
    if ($yearDate->year == $year){
    $selected = ' Selected';}
else{ $selected = '';}
echo "<option value = ".$yearDate->year.$selected.">".$yearDate->year." </option>";
}
?>
</select>
<?php
echo "<input type=hidden name=controller value = technician>";   
echo "<input type=hidden name=controller value = management>";    
echo "<input type=hidden name=action value = viewSummaryReport>";

?>
</form>
<table border="1">
    <thead>
        <tr>
            <th><center><h1>Lab Number</h1></center></th>
            <th><center><h1>All Faults In Labs</h1></center></th>
            <th><center><h1>Fixed Faults In Labs</h1></center></th>
            <th><center><h1>Pending Faults In Labs</h1></center></th>
            <th><center><h1>Faults Fixed Writing Off PC In Labs</h1></center></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php if ($all) { ?>
                <center><table border = 1>
                    <?php
                        foreach ($all as $all) {    
                            echo "<tr><td>".$all->labNr."</td></tr>";
                            }
                        }
                    ?>
                </table></center>
                
            </td>
            
            <td><?php if ($allLab) { ?>
                <center><table border = 1>
                    <?php
                        foreach ($allLab as $allLab) {
                            echo "<tr><td>".$allLab->numAll."</td></tr>";
                            }
                        }
                    ?>
                    </table></center>
            </td>
            
            <td><?php if ($fixedlab) {?>
                <center><table border = 1>
                    <?php
                        foreach ($fixedlab as $fixedlab) {
                            echo "<tr><td>".$fixedlab->numFixed."</tr>";
                            }
                        }
                    ?>
                    </table></center>
            </td>
            
            <td><?php if ($pendinglab) {?>
                <center><table border = 1>
                    <?php
                        foreach ($pendinglab as $pendinglab) {
                            echo "<tr><td>".$pendinglab->numPendig."</td></tr>";
                            }
                        }
                    ?>
                    </table></center>
            
            </td>
            <td><?php if ($writtenOfflab) {?>
                <center><table border = 1>
                    <?php
                        foreach ($writtenOfflab as $writtenOfflab) {
                            echo "<tr><td>".$writtenOfflab->numWrittenOff."</tr>";
                            }
                        }
                    ?>
                    </table></center>

                
            </td>
        </tr>
    </tbody>
</table>






    <img src="icon.jpg" width="392" height="470" alt="icon"/></html>

            </div>
        </div>
    </div>
    