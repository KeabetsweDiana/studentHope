<?php
session_start();
require("../dbconnection.php");

?><!DOCTYPE html>
<html style="font-family: 'Open Sans', sans-serif;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>admin</title>
    <link rel="icon" type="image/png" sizes="1200x1156" href="assets/img/tut.png">
    <link rel="stylesheet" href="../admin/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="../admin/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../admin/assets/css/dashboard.css">
    <link rel="stylesheet" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
    <link rel="stylesheet" href="../admin/assets/css/loginstyle.css">
    <link rel="stylesheet" href="../admin/assets/css/Pretty-Footer.css">
    <link rel="stylesheet" href="../admin/assets/css/Sidebar-Menu-1.css">
    <link rel="stylesheet" href="../admin/assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="../admin/assets/css/styles.css">
</head>

<body>
    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><span><?php echo $_SESSION['SName'].' '.$_SESSION['name'];?></span> </li>
                <li class="nav-item" role="presentation"><a href="../index.php">HOME</a></li>
				<li class="nav-item" role="presentation"><a href="appointments.php">APPOINTMENTS</a></li>
                <li class="nav-item" role="presentation"><a href="../sessionHistory.php">SESSION HISTORY</a></li>
				<li class="nav-item" role="presentation"><a href="../tutors.php">TUTOR</li>
            </ul>
        </div>
        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="row" id="top">
                    <!--<div class="col-2 col-lg-1 col-xl-1"><a class="btn btn-link" role="button" id="menu-toggle" href="#menu-toggle"><i class="fa fa-bars"></i></a></div>-->
                    <div class="col-4 col-sm-4 offset-6 offset-sm-6 offset-md-6 offset-lg-7 offset-xl-7" id="user">
                        <div class="text-right" id="user_info"><a href="../logout.php"><i class="fa fa-sign-out"></i></a></div>
                    </div>
                </div>

               
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <h1 align="center">Accept Individual Session</h1>
                            <div id="small-nav">
                                <ul id="inner-nav">
                                    <li><a href="group.php">GROUP</a></li>
                                    <li><a href="appointments.php">ALL</a></li>
                                </ul>
                            </div>
                        </div>
                        <p></p>
                    </div>
                </div>
                
                
                <div class="row">
                    <div class="col">
                        <form method="POST">
                            <div class="form-row">
                                
                                <div class="col-md-7 col-lg-8 col-xl-9">
                                    <div><label>MEETING LINK<input class="form-control" type="text" name="link"></label></div>
									
                                    
                                </div>
                            </div>
							<input type="submit" class="btn btn-primary btn-submit profile-update"  name ="accept" Value="ACCEPT">
						</form>
						
						<?php
						if(isset($_POST['accept']))
						{
							 
							 $link = $_POST['link'];
							 $status = "ACCEPTED";
							$tutor = $_SESSION['surname'].' '.$_SESSION['name'];
							//$tutor ="ADMIN";
							
							
											$test = mysqli_query($con,"UPDATE session SET url='$link', tutor='$tutor', status='$status' WHERE sessionID =".$_GET['uid']);
											//$lineNo = mysqli_num_rows($test);
											if($test)
											{
													$emailAll ="select * From session WHERE sessionID =".$_GET['uid'];
													$emailQuery = mysqli_query($con,$emailAll);
													
													while($emailLine = mysqli_fetch_array($emailQuery))
													{
																$email_address = $emailLine['stdNum']."@tut4life.ac.za";
																$name = $emailLine['name'];
																$surname = $emailLine['suname'];
																$date = $emailLine['date'];
																$time = $emailLine['time'];
																
																$to = $email_address; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
																$email_subject = "Tutoring Session";
																$email_body = "GOOD day : $name \n\n Your Tutorial has been accepted  .\n\n"
																."Here is your joining link :$link\n\nSesssion Date: $date\n\nSesssion Time: $time\n\nTutor: $tutor \n\n SEE YOU THEN";
																$headers = "From: studenthope76@gmail.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
																$headers .= "Reply-To: studenthope76@gmail.com";   
																mail($to,$email_subject,$email_body,$headers);
													}
												
												echo '<script type="text/javascript"> alert("Session Accepted successfully") </script>';
												
												echo '<script language="javascript">
                                    document.location="individual.php";
                                </script>';
											}else{
														echo '<script type="text/javascript"> alert("Error") </script>';
													
											}
									
									
								 
						 }
						?>
                    </div>
                </div>
				
				
				
				
				<?php
					 /*$ret1=mysqli_query($con,"select * from module Where module='".."'");
							 if(){	 
								 }else{*/
				?>
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