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
                
                
			<form id="book-form" METHOD="POST">
                    <?php
						echo '<div class="form-input"><label>Time<select  name="time" class="form-control">';
						$ret=mysqli_query($con,"SELECT * FROM session WHERE sessionType='GROUP' AND status='PENDING'");
											
							while($row=mysqli_fetch_array($ret))
							{
								echo '<option value="'.$row['time'].'">'.$row['time'].':00</option>';
					
					
							}
							echo '</select></label></div>';
					?>
					
					<?php
						echo '<div class="form-input"><label>Date<select  name="date" class="form-control">';
						$ret=mysqli_query($con,"SELECT * FROM session WHERE sessionType='GROUP' AND status='PENDING'");
											
							while($row=mysqli_fetch_array($ret))
							{
								echo '<option value="'.$row['date'].'">'.$row['date'].'</option>';
					
					
							}
							echo '</select></label></div>';
					?>
					
					<?php
						echo '<div class="form-input"><label>Module<select  name="module" class="form-control">';
						$ret=mysqli_query($con,"SELECT * FROM session WHERE sessionType='GROUP' AND status='PENDING'");
											
							while($row=mysqli_fetch_array($ret))
							{
								echo '<option value="'.$row['module'].'">'.$row['module'].'</option>';
					
					
							}
							echo '</select></label></div>';
					?>
					
					
					<input class="btn btn-primary" type="submit" name="search" value="Search">
				</form>

				<form id="book-form" METHOD="POST">
					<?php
					
					if(isset($_POST['search']))
					{
						$module=$_POST['module'];
						$time=$_POST['time'];
						$date=$_POST['date'];
						
						if(empty($module) || empty($time) && empty($date))
						{
						    echo "<script>alert('Please Make Sure You Have Set All Values Correct');</script>";
						}else{
						
						
            						echo '<div class="form-input"><label>Module<select  name="module" class="form-control">';
            						$ret=mysqli_query($con,"SELECT * FROM session WHERE sessionType='GROUP' AND status='PENDING'  AND module='$module' AND time='$time' AND date='$date' ");
            											
            							while($row=mysqli_fetch_array($ret))
            							{
            								echo '<option value="'.$row['Topic'].'">'.$row['Topic'].'</option>';
            					
            					
            							}
            							echo '</select></label></div>';
            						
            						echo'<input class="form-control" type="hidden"  name="module" value='.$_POST['module'].'>';
            					
            					echo'<input class="form-control" type="hidden"  name="time" value='.$_POST['time'].'></label>';
            					
            					echo'<input class="form-control" type="hidden"  name="date" value='.$_POST['date'].'> ';
            					
            					
            						echo'<div>
                                    <label>URL<input class="form-control" type="text"  name="url" placeholder="Enter URL"></label>
                                </div>';
            						echo'<input class="btn btn-primary" type="submit" name="accept" value="ACCEPT">';	
            						
					}
						
						
			
					}
					?>

				
					
				</form>


<?php
if(isset($_POST['accept']))
{
	
	$time=$_POST['time'];
	$url = $_POST['url'];
	$status = "ACCEPTED";
	$tutor = $_SESSION['surname'].' '.$_SESSION['name'];
	$date= $_POST['date'];
	
	$emailAll ="select * From session WHERE time ='$time' AND sessionType='GROUP' AND status='PENDING' AND date='$date'";
	$emailQuery = mysqli_query($con,$emailAll);
	
	while($emailLine = mysqli_fetch_array($emailQuery))
	{
				$email_address = $emailLine['stdNum']."@tut4life.ac.za";
				$name = $emailLine['name'];
				$surname = $emailLine['suname'];
				$time = $emailLine['time'];
				$date = $emailLine['date'];
				
				$to = $email_address; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
				$email_subject = "Tutoring Session";
				$email_body = "GOOD day : $name \n\n Your Tutorial has been accepted  .\n\n"
				."Here is your joining link :$url\n\nSesssion Date: $date\n\nSesssion Time: $time\n\nTutor: $tutor \n\n SEE YOU THEN";
				$headers = "From: studenthope76@gmail.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
				$headers .= "Reply-To: studenthope76@gmail.com";   
				mail($to,$email_subject,$email_body,$headers);
	}
	
	
	$test = mysqli_query($con,"UPDATE session SET url='$url', tutor='$tutor', status='$status' WHERE time='$time' AND sessionType='GROUP' AND status='PENDING' AND date='$date'");
	
	
	
	
	
	if($test)
	{
		echo "<script>alert('All Session Successfully Accepted');</script>";
		
		
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