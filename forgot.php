<?php
include("nav.php");

?>
    <div id="login-div">
        <div id="forms">
            <form id="forgot" method="POST">
                <h1>Forgot Password</h1>
				<input class="form-control" type="text" name="studentEmail" placeholder="Student Email">
				<input class="btn btn-primary" type="submit" name="send" value="RESET PASSWORD">
                
                <p class="message">Not registered<a href="signin.php">Sign Up</a></p>
            </form>
			
			<?php
						//Code for Forgot Password

							if(isset($_POST['send']))
							{
							$row1=mysqli_query($con,"select * from user where studentEmail='".$_POST['studentEmail']."'");
							$row2=mysqli_fetch_array($row1);
							if($row2>0)
							{
    							$email = $row2['studentEmail'];
    							$subject = "Information about your password";
    							$password=$row2['stdNum'];
    							
    							
    							$enc_password = md5($password);
								$line= mysqli_query($con,"UPDATE user SET  password='$enc_password' where studentEmail='".$_POST['studentEmail']."'");
								if($line)
								{
									echo '<script>alert("Password Changed successfully")</script>';
										echo '<script language="javascript">
									document.location="signin.php";
									</script>';
								}
    							
    							
    							
    							
    							
    							$message = "Your password is ".$password;
    							mail($email, $subject, $message, "From: $email");
    							echo  "<script>alert('Your Password has been sent Successfully');</script>";
    							echo '<script language="javascript">document.location="signin.php";</script>';
							}
							else
							{
							echo "<script>alert('Email not register with us');</script>";	
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