<?php
include("nav.php");
?>
        
				   <div class="row">
                    <div class="col-md-12">
                        <div>
                            <h1 align="center">All Group Appointments</h1>
                            <div id="small-nav">
                                <ul id="inner-nav">
                                    <li><a href="appointments.php">All</a></li>
                                    <li><a href="individual.php">INDIVUDUAL</a></li>
                                </ul>
                            </div>
                        </div>
                        <p></p>
                    </div>
                </div>
				

<?php
if(isset($_POST['accept']))
{
	
	$time=$_POST['time'];
	$url = $_POST['url'];
	$status = "ACCEPTED";
	$tutor = $_POST['tutor'];
	$date= $_POST['date'];
	
	$emailAll ="select * From session WHERE time='$time' AND sessionType='GROUP' AND status='PENDING' AND date='$date'";
	$emailQuery = mysqli_query($con,$emailAll);
	
	while($emailLine = mysqli_fetch_array($emailQuery))
	{
				$email_address = $emailLine['stdNum']."@tut4life.ac.za";
				$name = $emailLine['name'];
				$surname = $emailLine['suname'];
				
				$to = $email_address; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
				$email_subject = "Tutoring Session";
				$email_body = "GOOD day : $name \n\n Your Tutorial has been accepted  .\n\n"
				."Here is your joining link :$url\n\nSesssion Date: $date\n\nTutor: $tutor \n\n SEE YOU THEN";
				$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
				$headers .= "Reply-To: j.mnisi.c.jm@gmail.com";   
				mail($to,$email_subject,$email_body,$headers);
	}
	
	
	$test = mysqli_query($con,"UPDATE session SET url='$url', tutor='$tutor', status='$status' WHERE time='$time' AND sessionType='GROUP' AND status='PENDING' AND date='$date'");
	
	
	
	
	
	if($test)
	{
		echo "<script>alert('SUCCESSFULLY ACCEPTED ALL SESSIONS');</script>";
		
		
		echo '<script language="javascript">document.location="appointments.php";</script>';		
	
	}
	else{
		echo "<script>alert('NONSENSE');</script>";
	}
	
}

?>


                <div class="table-responsive" id="sessions">
                    <table class="table">
                        <thead>
                            <tr>
							<th>Student Number</th>
                                <th>Name</th>
								<th>Surname</th>
                                <th>Module</th>
								<th>Topic</th>
								<th>Session Type</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Cell No.</th>
								<th>Status</th>
                            </tr>
                        </thead>
						
						
                        <tbody>
						
						<?php 
							$ret=mysqli_query($con,"select * from session WHERE sessionType ='group' ");
								$cnt=1;
								 while($row=mysqli_fetch_array($ret))
									{
						?>
                            <tr>
							
							<td><?php echo $row['stdNum'] ?></td>
							<td><?php echo $row['name'] ?></td>
							<td><?php echo $row['surname'] ?></td>
                            <td><?php echo $row['module'] ?></td>
							<td><?php echo $row['Topic'] ?></td>
							<td><?php echo $row['sessionType'] ?></td>
							<td><?php echo $row['date'] ?></td>
                            <td><?php echo $row['time'].':00' ?></td>
							<td><?php echo $row['cellNumber'] ?></td>
							<td><?php if($row['status'] =='PENDING')
										{
											echo '<span>Pending&nbsp;<i class="fa fa-warning" id="pending"></i></span><br>';
											
										}elseif($row['status'] =='ACCEPTED'){
														echo'<span>Accepted&nbsp;<i class="fa fa-thumbs-up" id="accepted"></i></span>By&nbsp;<span>'.$row['tutor'].'</span>';
														}else{
														    echo '<span>Cancelled&nbsp;<i class="fa fa-times-circle" aria-hidden="true" style="font-size:20px;color:red"></i></span><br>';
														}
											
							
							?></td>
							
                                
                               
                                
                            </tr> <?php } ?>
                         
                        </tbody>
                    </table>
                </div>
                <hr>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/preview.js"></script>
    <script src="assets/js/print.js"></script>
    <script src="assets/js/Sidebar-Menu.js"></script>
</body>

</html>