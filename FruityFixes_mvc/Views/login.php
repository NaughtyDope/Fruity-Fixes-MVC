<?php
include 'Header.php';
?>
<div class="panel-body">
<DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <form action='' method=get>
	User name<input type=text name=username><br>
	Password<input type=password name=password><br>
        <h2><input type=hidden name=controller value=login><input type=hidden name=action value=login></h2>
	<input type=submit name=login value="LOG IN">
        <br><br>
        <a href='?controller=student&action=registerStudent'>Register</a>
	
	</form

    <?php 
require_once('routes.php'); 
	?>

 
  <body>
</DOCTYPE>
</div>
</div>
<?php
include 'Footer.php';
?>