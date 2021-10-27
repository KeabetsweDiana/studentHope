<?php
include("nav.php");
?>
       
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <h1>Add a user</h1>
                            <div id="small-nav">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="users.php"><span class="bread-link">Manage Users</span></a></li>
                                    <li class="breadcrumb-item"><a href="#"><span class="bread-link" d="">Add Users</span></a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div>
                            <div class="col-lg-12 col-xl-12 add-col">
                                <form id="add-user" method="POST">
                                    <h3>Add a user</h3>
                                    <div>
                                        <label>NAME<input class="form-control name add" type="text"  name="name" pattern="[A-Za-z]{1,32}"  required placeholder="Name" required ></label>
                                    </div>
									
									<div>
                                        <label>SURNAME<input class="form-control name add" type="text"  name="surname" pattern="[A-Za-z]{1,32}" required placeholder="Surname" required></label>
                                    </div>
                                     <div>
                                        <label>Student Number<input class="form-control staff-no add" type="text" name="stdNum" placeholder="Student Number" required></label>
                                    </div>
                                    <div>
                                        <label>Cellphone number<input class="form-control cell-no add" type="text"  name="cell_no" placeholder="Cellphone Number" required></label>
                                    </div>
                                    <div>
                                        <label>Password<input class="form-control name add" type="password"  name="pwd" placeholder="Password" requiredrequired></label>
                                    </div>
                                    <div>
                                        <label>Repeat Password<input class="form-control surname add" type="password" name="pwd_repeat" placeholder="Repeat Password" required></label>
                                    </div>
                                   
                                    

                                    <!-- Assign roles -->
                                    <div>
                                        <label>Role
                                            <select name="role" class="form-control" required>
                                                
                                                <option value="tutor">Tutor</option>
                                                <option value="student">Student</option>
                                             
                                            </select>
                                        </label>
                                    </div>
                                    
                                   
                                    <input class="btn btn-primary add-btn btn-submit" type="submit" name="add" value="ADD">

                                </form>
								<?php
    								if(isset($_POST['add']))
						    	{
							
							
							    $name1 = strip_tags(htmlspecialchars($_POST['name']));
							    $name2 = strtolower($name1);

							    $name = ucfirst($name2);
							    
							    $surname1 = strip_tags(htmlspecialchars($_POST['surname']));
							    $surname2 =  strtolower($surname1);
							    $surname = ucfirst($surname2);
							    $stdNum = strip_tags(htmlspecialchars($_POST['stdNum']));
								$pwd = strip_tags(htmlspecialchars($_POST['pwd']));
								$pwd_repeat = strip_tags(htmlspecialchars($_POST['pwd_repeat']));
							   
								
								
								
							    
							       $stdExist="SELECT * FROM user WHERE stdNum=".$stdNum;
							       $queryUser=mysqli_query($con,$stdExist);
								   
							       if(mysqli_fetch_array($queryUser)){
							           echo '<script>alert("Account already exist")</script>';
							       }else{
								   
											$email_address = $stdNum."@tut4life.ac.za";
											if(filter_var($email_address,FILTER_VALIDATE_EMAIL))
											  {
												   $phone = strip_tags(htmlspecialchars($_POST['cell_no']));
												   
												if(preg_match( "/^(\+27|0)[6-8][0-9]{8}$/", $phone ))
												{
													 
													if(substr($stdNum,0,3) <=221)
													{
        													if($pwd_repeat == $pwd)
        													{
        													
        													
        														$enc_password = md5($pwd);
        														$date = date("Y-m-d");
        														$role = 'student';
        			
        														$insert= "insert into user values('$stdNum','$name','$surname','$email_address','$role','$enc_password','$phone','$date')";
        														$query_Insert = mysqli_query($con,$insert);
        														
        														
        														if($query_Insert)
        														{
        														 
        															$to = $email_address; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
        															$email_subject = "Tutoring System";
        															$email_body = "Welcome to our Online Support System \n\n Here we you can book an online session with a tutor .\n\n"
        															."Here are your logging in details:\n\nUsername: $email_address\n\nEmail:$email_address\n\nPhone: $phone";
        															$headers = "From: studenthope76@gmail.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
        															$headers .= "Reply-To: studenthope76@gmail.com";   
        															mail($to,$email_subject,$email_body,$headers);
        															
        															
        															echo '<script>alert("Successfully Registered ")</script>';
        														}else{
        															echo '<script>alert("Unable to register, Error on the SQL")</script>';
        														}
        														
        													
        													}else{
        													
        															echo '<script>alert("Password is not matching")</script>';
        													}
													}else{
													    echo '<script>alert("this is not a TUT student number")</script>';
													}
													
													
												}else{
													echo '<script>alert("Invalid Number")</script>';
												}
											   }else{
												   echo '<script>alert("Invalid email")</script>';
											   }
							       }
							   
        								
							}
					?>
                            </div>
                        </div>
                    </div>
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