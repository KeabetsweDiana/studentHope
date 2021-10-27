<?php
include("nav.php");

?>
    <div id="login-div">
        <div id="forms">
            <form id="sign-in" method="POST">
                <h1>Sign In</h1>
				<input class="form-control" type="text" name="studentEmail" placeholder="Student Email">
				<input class="form-control" type="password" name="pwd"  required  placeholder="Password">
				<input class="btn btn-primary" type="submit" name="signin" value="SIGNIN">
				
				
                <p id="forgot"><a href="forgot.php">Forgot Password?</a></p>
                <p class="message">Not registered?<a href="#">Sign Up</a></p>
            </form>
			
			
					<?php
						if(isset($_POST['signin']))
{
							$password=$_POST['pwd'];
							$dec_password=md5($password);
							//$dec_password=$password;
							$useremail=$_POST['studentEmail'];
							
							
							$ret= mysqli_query($con,"SELECT * FROM user WHERE studentEmail='$useremail' and password='$dec_password'");
							$num=mysqli_fetch_array($ret);
							$find = $num['stdNum']; 
                            $cellNo = $num['cellNumber']; 
                     
                            
							if($num)
							{

							
								$_SESSION['login']=$_POST['studentEmail'];
								$_SESSION['name']=$num['name'];
								$_SESSION['SName']=$num['surname'];
								$_SESSION['stdNum']=$num['stdNum'];
								$_SESSION['number']=  $cellNo;
								$_SESSION['role']=$num['role'];
								//this creates a session for students who are at res o not
									$extra="index.php";
							

								//$host=$_SERVER['HTTP_HOST'];
								//$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
								echo '<script>alert("Successfully Logged In")</script>';
								//return to index page
								echo '<script language="javascript">
                                    document.location="index.php";
                                </script>';
								
								exit();
							}
							else
							{
							   
							echo '<script>alert("Incorrect Login Details")</script>';
							$extra="index.php";
							$host  = $_SERVER['HTTP_HOST'];
							$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
							//header("location:http://$host$uri/$extra");
							 echo '<script language="javascript">
                                    document.location="index.php";
                                </script>';
								
							exit();
							}
}
					?>
			
			
			
			
            <form id="sign-up" method="POST">
                <h1>Sign Up</h1>
				<input class="form-control" type="text" name="name"  pattern="[A-Za-z]{1,32}" required placeholder="Name">
				<input class="form-control" type="text" name="surname" pattern="[A-Za-z]{1,32}" required placeholder="Surname">
				<!--<input class="form-control" type="email" id="mail" placeholder="Email">-->
				<input class="form-control" type="text" name="stdNum" minlenght="9" maxlength="9" required placeholder="Student Number">
				<input class="form-control" type="tel" name="cell_no" pattern = "(\+27|0)[6-8][0-9]{8}" title="Must be a south African Number starting with a zero(0) and followed by 6 - 8" minlenght="10" maxlength="10" required placeholder="Cellphone Number">
				<input class="form-control" type="password" name="pwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"   title="Must contain at least 1 number and 1 uppercase and lowercase letter, and at least 8 or more characters" required   placeholder="Password">
				<input class="form-control" type="password" name="pwd_repeat"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"   title="Must contain at least 1 number and 1 uppercase and lowercase letter, and at least 8 or more characters" required   placeholder="Repeat Password">
				
				<input class="btn btn-primary" type="submit" name="signup" value="SIGNUP">
                
                        <p class="message">Already registered?<a href="#">Sign In</a></p>
            </form>
			<?php
							if(isset($_POST['signup']))
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
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>