<?php
session_start();
header("Refresh: 60");
require("../dbconnection.php");

date_default_timezone_set("Africa/Johannesburg");
	$date = date("Y-m-d");
	
	$emailAll = "select * From session WHERE status ='PENDING'";
	
	$emailQuery = mysqli_query($con, $emailAll);
	
	while($emailLine = mysqli_fetch_assoc($emailQuery))
	{
		if($emailLine['date'] < $date && $emailLine['status'] == "PENDING")
		{
		    
		         $stdNum = $emailLine['stdNum'];
				$email_address = $emailLine['stdNum']."tut4life.ac.za";
				$name = $emailLine['name'];
				$surname = $emailLine['suname'];
				$sessionID = $emailLine['sessionID'];
				$status = "CANCELLED";
				$link = "N/A";
				$tutor = "N/A";
				
				$test = mysqli_query($con,"UPDATE session SET url='$link', tutor='$tutor', status='$status' WHERE stdNum = '".$stdNum."' AND date <'".$date."'");
				//$lineNo = mysqli_num_rows($test);
				if($test)
				{
    				$to = $email_address; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
    				$email_subject = "Tutoring Session";
    				$email_body = "GOOD day : $name \n\n Your Tutorial has been canceled  .\n\n"
    				."Try booking for anothor session, no Tutor was available for this session, which was booked for today";
    				$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
    				$headers .= "Reply-To: j.mnisi.c.jm@gmail.com";   
    				mail($to,$email_subject,$email_body,$headers);
    				
    					
    					
    			
				
				}
				
		    
		
	}
	}
	
?>