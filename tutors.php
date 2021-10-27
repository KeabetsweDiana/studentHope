<?php
	include("nav.php");
	include("checklogin.php");
	
	check_login();
?>
    <div id="structure-div">
        <div class="container">
            <h1>Tutors</h1>
            <p>Academic structure discription.&nbsp;<br><br></p>
            <hr>
            <div id="book-div">
                <h1>Book A Session</h1>
                <form id="book-form" METHOD="POST">
                    <?php
						echo '<div class="form-input"><label>Module<select  name="module" class="form-control">';
						$ret=mysqli_query($con,"select * from module");
											
							while($row=mysqli_fetch_array($ret))
							{
								echo '<option value="'.$row['Module'].'">'.$row['Module'].'</option>';
					
					
							}
							echo '</select></label></div>';
					?>
					
					<input class="btn btn-primary" type="submit" name="topic1" value="TOPICS">
				</form>
				
				<form id="book-form" METHOD="POST">
					<?php
					
					if(isset($_POST['topic1']))
					{
						$module = $_POST['module'];
						
						
						
						$ret=mysqli_query($con,"select * from topic Where module ='$module'");
						$numRow = mysqli_num_rows($ret);
						
						if(	$numRow > 0)
						{
						    
						    echo ' 
						<div class="form-group">
                              <label>Module</label>
                              
                                  <input type="text" class="form-control" name="module" value="'.$module.'" readonly>
                             
                          </div>';
						
						
						
						echo '<div class="form-input"><label>Topics<select  name="topic" class="form-control">';
						
    							while($row=mysqli_fetch_array($ret))
    							{
    								echo '<option value="'.$row['topic'].'">'.$row['topic'].'</option>';
    					
    					
    							}
            					echo '</select></label></div>';
            					
            					
            					
            					
            					
            					echo '</select></label></div>
            					
            					
            					<div class="form-input">
            					<label>Session Type<select name="sessionType" class="form-control" required>
            									
            						<option  value="INDIVIDUAL">INDIVIDUAL</option>
            						<option  value="GROUP">GROUP</option>
            					</select></div></label>
            					<label>Session Date
            					<div class="form-input">
            					<input  class="form-input"type="date" value="data"  name="date" required>
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
            					<input class="btn btn-primary" type="submit" name="book" value="BOOK"></div>
            					<br>';
					
						}else{
						    
						    echo'<span>NO Topics found &nbsp;<i class="fa fa-thumbs-down" id="accepted"></i></span>&nbsp;<span>contact Admin for more info</span>';
						}
						
					}
                   ?>
                
					
			</form>
				
				<?php
					
					if(isset($_POST['book']))
					{
						
						date_default_timezone_set("Africa/Johannesburg");
							$email=$_SESSION['login'];
							$name=$_SESSION['name'];
							$surname= $_SESSION['SName'];
							$cellNumber=$_SESSION['number'];
							$date=$_POST['date'];
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
							$currentTym = date("H");
							if($a>$date )
							{
								echo "<script>alert('booking can not be made for dates that have passed');</script>";
							}else{
								
								if($rowNum<2 ) //this will limmit students for a group
								{
									
									if($a == $date &&  $currentTym > $time)
									{
									    echo "<script>alert('Booking can not be made for a time that have pass for a day ');</script>";
									}else
									{
									$msg=mysqli_query($con,"insert into session(sessionID, name, surname, cellNumber,module, time, date, sessionType, tutor, stdNum,Topic,bookedDate,status,url) values('', '$name', '$surname', '$cellNumber', '$module', '$time', '$date', '$sessionType', '$tutor', '$stdNum', '$topic', '$a','$status','$url')");
														
														if($msg)
														{
															
															$to = $email; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
															$email_subject = "Tutor booking";
															$email_body = "You Session has been booked for this date : $date at this time:$time Oclock make sure you access the session with the link that will be sent to you via email.\n\n"
															."Here are the details:\n\nStudent Number : $stdNum\n\nEmail: $email\n\nPhone : $cellNumber\n\nSessinType : $sessionType\n\nTopic : $topic\n\nModule : $module\n\nTime : $time:00\n\nDate : $date";
															$headers = "From: studenthope76@gmail.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
															$headers .= "Reply-To: studenthope76@gmail.com";   
															mail($to,$email_subject,$email_body,$headers);
															
															echo "<script>alert('booking made Successfully');</script>";
															echo'<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span><strong>Session Successfully Booked for -</strong></span><span>'.$time.':00, and date: '.$date.' </span></div>';
															echo'<a class="text-decoration-none" data-dismiss="modal" data-toggle="modal" data-target="#signin" href="#">';
														}
														else
														{
															echo "<script>alert('Booking was not successful');</script>";
														}
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