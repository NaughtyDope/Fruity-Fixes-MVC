<html>
    
    <h1>Register Technician</h1> 
<e1> <?php echo $err; ?></e1>
    
<form method="GET" action="">
            <input type=hidden name=controller value = management>
            <input type=hidden name=action value = registerTechnician>
            <label for="studNr">Technician Number:</label><br/>
            <input type="text" name="techNr" value="" />
            <br/>
            
            <label for="studNr">Technician Username:</label><br/>
            <input type="text" name="techUserName" value="" />
            <br/>
            
            <label for="studNr">Technician Name:</label><br/>
            <input type="text" name="techName" value="" />
            <br/>
            
            <label for="studNr">Technician Email:</label><br/>
            <input type="text" name="techEmail" value="" />
            <br/>
            
            <label for="studNr">Technician Residential Address:</label><br/>
            <input type="text" name="techAddress" value="" />
            <br/>
            
            <label for="studNr">Technician Contact Number:</label><br/>
            <input type="text" name="techContact" value="" />
            <br/>
            		
            <br/>
			
           
            <input type="submit" name=butn value="Submit" />
            
            
            
</html>