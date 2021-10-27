<?php
	include("nav.php");
	include("checklogin.php");
	
	check_login();
?>
    <div id="structure-div">
        <div class="container">
            <h1>Tutors</h1>
            
            <hr>
            <div id="book-div">
                <h1>Update Session</h1>
             
				
				<form id="book-form" METHOD="POST">
					<?php
						 $sel= "select * from session where sessionID = ".$_GET['id'];
							$ret1=mysqli_query($con,$sel);
							$cnt=1;
							$rows=mysqli_fetch_assoc($ret1);
							
						
						
						echo ' 
						<div class="form-group">
                              <label>Module</label>
                              
                                  <input type="text" class="form-control"  value="'.$rows['module'].'" readonly>
                             
                          </div>';
						
						echo '<div class="form-group">
                              <label>Topic</label>
                              
                                  <input type="text" class="form-control"  value="'.$rows['Topic'].'" readonly>
                             
                          </div>';
						
						echo '<div class="form-group">
                              <label>Session Type</label>
                              
                                  <input type="text" class="form-control"  value="'.$rows['sessionType'].'" readonly>
                             
                          </div>';
					
					
					
					
					
					echo '
					
					<input  class="form-input"type="hidden" value="'.$rows['date'].'"  name="date1" >
					<label>Session Date
					<div class="form-input">
					<input  class="form-input"type="date" value="data"  name="date" >
					</div></label>
					<label>Session Time
					<select name ="time" class="form-control">
						<option value="09:00">09:00</option>
						<option value="12:00">12:00</option>
						<option value="16:00">16:00</option>
					</select>
					</label></div>

					<div class="form-input" align=center"
					
					>
					<input class="btn btn-primary" type="submit" name="book" value="UPDATE"></div>
					<br>';
					
                   ?>
                
					
			</form>
				
				<?php
					
					if(isset($_POST['book']))
					{
						
						
							$email=$_SESSION['login'];
							$name=$_SESSION['name'];
							$surname= $_SESSION['SName'];
							$cellNumber=$_SESSION['number'];
							
							
							
							
							if(empty($_POST['date']))
							{
						    	$date=$_POST['date1'];
							}else{
							    $date=$_POST['date'];
							}
							
							
							$time=$_POST['time'];
							$sessionType=$_POST['sessionType'];
							$topic=$_POST['topic'];
							$stdNum  =$_SESSION['stdNum'];
							$module=$_POST['module'];
							$time = substr($time,0,2);
							
							$checkDate = "SELECT * FROM session WHERE time = '$time' AND date='$date' AND sessionType = 'GROUP'";
							$query  = mysqli_query($con,$checkDate);
							$rowNum = mysqli_num_rows($query);
							$a=date('Y-m-d');
							$status ='PENDING';
							$tutor ='';
							$url = '';
							
							if($a>$date)
							{
								echo "<script>alert('booking can not be made for dates that have passed');</script>";
							}else{
								
								if($rowNum<2 ) //this will limmit students for a group
								{
									
									
									$msg=mysqli_query($con,"UPDATE session SET  time='$time' , date='$date'  where sessionID=".$_GET['id']);
									
														if($msg)
														{
															
															$to = '$email'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
															$email_subject = "Tutor booking";
															$email_body = "You Session has been updated for this date : $date at this time:$time Oclock make sure you access the session with the link  the will be sent to you.\n\n"
															."Here are the details:\n\nTime:$time\n\nDate:$date";
															$headers = "From: studenthope76@gmail.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
															$headers .= "Reply-To: studenthope76@gmail.com";   
															mail($to,$email_subject,$email_body,$headers);
															
															echo "<script>alert('booking updated Successfully');</script>";
															echo'<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span><strong>Session Successfully Booked for -</strong></span><span>'.$time.':00, and date: '.$date.' </span></div>';
															echo'<a class="text-decoration-none" data-dismiss="modal" data-toggle="modal" data-target="#signin" href="#">';
														}
														else
														{
															echo "<script>alert('Booking was not successful');</script>";
														}
								}else{
									echo "<script>alert('Please try boooking another time slot: ".$time." Oclock  for this date".$a." is full');</script>";
								}
							
							}
								
						
					}
					
					
				?>
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
                
            </div>
        </div>
    </div>
    <footer>
        <div id="footer-content"><span>©</span><span class="current-year">Year</span><span>TUT</span></div>
    </footer>
   
    <script
        src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/script.js"></script>
</body>

</html>