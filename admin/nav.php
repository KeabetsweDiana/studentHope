<?php
session_start();
require("dbconnection.php");
include("checklogin.php");

check_login();



date_default_timezone_set("Africa/Johannesburg");
	$date = date("Y-m-d");
	
	$emailAll = "select * From session WHERE status ='PENDING'";
	
	$emailQuery = mysqli_query($con, $emailAll);
	
	while($emailLine = mysqli_fetch_assoc($emailQuery))
	{
		if($emailLine['date'] < $date && $emailLine['status'] == "PENDING")
		{
		    
		         $stdNum = $emailLine['stdNum'];
				$email_address = $emailLine['stdNum']."@tut4life.ac.za";
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

?><!DOCTYPE html>
<html style="font-family: 'Open Sans', sans-serif;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>admin</title>
    <link rel="icon" type="image/png" sizes="1200x1156" href="assets/img/tut.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link rel="stylesheet" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
    <link rel="stylesheet" href="assets/css/loginstyle.css">
    <link rel="stylesheet" href="assets/css/Pretty-Footer.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu-1.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="assets/css/styles.css">
	 <link rel="stylesheet" href="assets/summernote/summernote-bs4.css">
	 
	
   	 <script type="text/javascript">
function fnExcelReport()
{
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById('example'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}
</script>

<script type="text/javascript">

function copytable(el) {
    var urlField = document.getElementById(el)   
    var range = document.createRange()
    range.selectNode(urlField)
    window.getSelection().addRange(range) 
    document.execCommand('copy')
}
	 
	</script>

</head>

<body>
    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><span><?php echo $_SESSION['surname'].' '.$_SESSION['name'];?></span> </li>
                <li> <a href="appointments.php">Appointments</a></li>
                <li><a href="history.php">Sessions Data</a> </li>
                <li> <a href="addTopic.php">Add Topic</a></li>
				<li> <a href="addModule.php">Add Module</a></li>
                <!--<li> <a href="profile.html">Profile</a></li>-->
                <li> <a href="writepost.php">Post</a></li>
                <li> <a href="users.php">Manage Users</a></li>
            </ul>
        </div>
		
		        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="row" id="top">
                    <div class="col-2 col-lg-1 col-xl-1"><a class="btn btn-link" role="button" id="menu-toggle" href="#menu-toggle"><i class="fa fa-bars"></i></a></div>
                    <div class="col-5 col-sm-4 offset-5 offset-sm-6 offset-md-6 offset-lg-7 offset-xl-7" id="user">
                        <div class="text-right" id="user_info"><a href="logout.php"><i class="fa fa-sign-out"></i></a></div>
                    </div>
                </div>