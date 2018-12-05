<head style="text-align:center">
    <div class ="row">
        <div class="panel ">
            <div class="panel-body">
                
<h1>Report A Fault</h1>   
<e1> <?php echo $err; ?></e1>
<c1> <?php echo $cornmess; ?></c1>
        
</head>
<body>
    <body style="text-align:center">
    
    
<?php

echo "<form name=form1 method = GET>";

echo "<input type=hidden name=controller value = student>";    
echo "<input type=hidden name=action value = reportFault>";


echo "Lab Number:<br>
<select name = labNr onchange='form1.submit();'>";

foreach ($labs as $lab) {  
    if ($lab->labNr == $labNr){
    $selected = ' Selected';}
else{ $selected = '';}


echo "<option value = ".$lab->labNr.$selected.">".$lab->labNr."</option>";
}
echo "</select>";  

echo "<br>";/*
echo'PC Number:<input type="text" name="pcNr" value="" />';*/

 echo "PC Number:<br>
      <select name = pcNr >";
      foreach ($pcNum as $pcNr) {
      if ($pcNr->current_pc_nr == $current_pc_nr){
      $selected = ' Selected';}
      else{ $selected = '';}


      echo "<option value = ".$pcNr->current_pc_nr.$selected.">".$pcNr->current_pc_nr."</option>";
      }
      echo "</select>";
 
      echo "<br>";

     
      echo "Nature Of Fault:<br>
      <select name = faultName >";
      foreach ($faults as $fault) {
      if ($fault->faultName == $faultName){
      $selected = ' Selected';}
      else{ $selected = '';}


      echo "<option value = '".$fault->faultName."'".$selected.">".$fault->faultName."</option>";
      }
      echo "</select>";

      echo "<br>";

     
        echo "<tr>

<td>Fault Description</td><br><td><input type=text name=faultDescription value ='".$faultReport->faultDescription."'></td></tr>
<tr>

</td></tr></table><br><br>
<input type=submit value=Report>

</form>
";

?>

        </body>   
            
            
            </div>
        </div>
    </div>
</div>
<?php

/*
echo "<h3> Report A Fault<h3>";
echo "<tr>
<td><form action='' method=GET><input type=hidden name=controller value='Student'>
	<input type=hidden name=action value='reportFault'>
        

</td>
</form></tr>";*/
?>
</html>