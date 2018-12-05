<html> <head>
        
<div class ="row">
        <div class="panel panel-default panel-background ">
            <div class="panel-body">
                

<h1>Techician Fixes Report</h1>

<?php
echo "<h2>Select Tech ID</h2>";

echo "<center><form name=form1 method = GET><select name = techNr onchange='form1.submit();' class =form-control></center>";


foreach ($technician as $technician) {
    if ($technician->techNr == $techNr){
    $selected = ' Selected';}
else{ $selected = '';}
echo "<option value = ".$technician->techNr.$selected.">".$technician->techNr." </option>";
}
?>

</select>
<?php  
echo "<input type=hidden name=controller value = management>";    
echo "<input type=hidden name=action value = technicianPerfomanceReport>";

?>
</form>
    <?php
    /*
<table>
<td>
<body>
<h1>Start Date</h1>

<div class="month">      
  <ul>
    <li class="prev">&#10094;</li>
    <li class="next">&#10095;</li>
    <li>
      August<br>
      <span style</table>="font-size:18px">2017</span>
    </li>
  </ul>
</div>

<ul class="weekdays">
  <li>Mo</li>
  <li>Tu</li>
  <li>We</li>
  <li>Th</li>
  <li>Fr</li>
  <li>Sa</li>
  <li>Su</li>
</ul>

<ul class="days">  
  <li>1</li>
  <li>2</li>
  <li>3</li>
  <li>4</li>
  <li>5</li>
  <li>6</li>
  <li>7</li>
  <li>8</li>
  <li>9</li>
  <li><span class="active">10</span></li>
  <li>11</li>
  <li>12</li>
  <li>13</li>
  <li>14</li>
  <li>15</li>
  <li>16</li>
  <li>17</li>
  <li>18</li>
  <li>19</li>
  <li>20</li>
  <li>21</li>
  <li>22</li>
  <li>23</li>
  <li>24</li>
  <li>25</li>
  <li>26</li>
  <li>27</li>
  <li>28</li>
  <li>29</li>
  <li>30</li>
  <li>31</li>
</ul>

</body></td>
<td>
<body>
<h1>End Date</h1>

<div class="month">      
  <ul>
    <li class="prev">&#10094;</li>
    <li class="next">&#10095;</li>
    <li>
      August<br>
      <span style="font-size:18px">2017</span>
    </li>
  </ul>
</div>

<ul class="weekdays">
  <li>Mo</li>
  <li>Tu</li>
  <li>We</li>
  <li>Th</li>
  <li>Fr</li>
  <li>Sa</li>
  <li>Su</li>
</ul>

<ul class="days">  
  <li>1</li>
  <li>2</li>
  <li>3</li>
  <li>4</li>
  <li>5</li>
  <li>6</li>
  <li>7</li>
  <li>8</li>
  <li>9</li>
  <li><span class="active">10</span></li>
  <li>11</li>
  <li>12</li>
  <li>13</li>
  <li>14</li>
  <li>15</li>
  <li>16</li>
  <li>17</li>
  <li>18</li>
  <li>19</li>
  <li>20</li>
  <li>21</li>
  <li>22</li>
  <li>23</li>
  <li>24</li>
  <li>25</li>
  <li>26</li>
  <li>27</li>
  <li>28</li>
  <li>29</li>
  <li>30</li>
  <li>31</li>
</ul>

</body></td></table>
</html>

*/?>
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

echo "</table></center>";
}
?>
                <img src="icon.jpg" width="392" height="470" alt="icon"/></html>

        </div>
    </div>
</div>