<?php
session_start();
require("dbconnection.php");

?><!<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Student Online Support</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="assets/css/styles.css">
	<link rel="stylesheet" href="admin/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="admin/assets/css/dashboard.css">
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.fa {
  padding: 9px;
  font-size: 15px;
  width: 30px;
  text-align: center;
  text-decoration: none;
 
  border-radius: 50%;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
  float:center;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
  float:center;
}
	
</style>	
	
</head>

<body>
    <div id="top-nav">
        <nav class="navbar navbar-light navbar-expand-md fixed-top fixed-top">
            <div class="container-fluid">
                <a href="index.php"> <div id="logo"><img class="img-fluid" id="logo-img" src="assets/img/logo.png"></div></a>
				<button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav text-right ml-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="index.php">HOME</a></li>
                        
						
					<?php
					
					if($_SESSION['login'])
					{
						echo '<li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">BOOK A SESSION</a>
                            <div class="dropdown-menu" role="menu">
							<!--<a class="dropdown-item" role="presentation" href="mentors.html">Tech Mentors</a>-->
							<a class="dropdown-item" role="presentation" href="tutors.php">Tutors</a>
							<!--<a class="dropdown-item" role="presentation" href="openlabs.html">Open Labs</a>
                                <a class="dropdown-item" role="presentation" href="lecturers.html">Lecturers</a>
								<a class="dropdown-item" role="presentation" href="clinic.html">Clinic</a>
								<a class="dropdown-item" role="presentation" href="sds.html">SDS</a>--></div>
                        </li>
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="sessionHistory.php">SESSION HISTORY</a></li>';
						echo '<li class="nav-item" role="presentation"><a class="nav-link active" href="logout.php">LOGOUT</a></li>';
					}else{
						echo '<li class="nav-item" role="presentation"><a class="nav-link active" href="signin.php">SIGN IN</a></li>';
					}
					?>
		
                        
                    </ul>
            </div>
    </div>
    </nav>
    </div>