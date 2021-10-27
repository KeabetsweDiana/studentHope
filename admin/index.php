<?php
session_start();
require("dbconnection.php");

?><!DOCTYPE html>
<html>

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
</head>

<body>
    <div class="container-fluid">
        <div class="row mh-100vh">
            <div class="col-10 col-sm-8 col-md-6 col-lg-6 offset-1 offset-sm-2 offset-md-3 offset-lg-0 align-self-center d-lg-flex align-items-lg-center align-self-lg-stretch bg-white p-5 rounded rounded-lg-0 my-5 my-lg-0" id="login-block">
                <div class="m-auto w-lg-75 w-xl-50">
                    <h1>Student Online Support</h1>
                    <form method="POST">
                        <div class="form-group">
                            <label class="text-secondary">Email </label>
                            <input class="form-control" type="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label class="text-secondary">Password</label>
                            <input class="form-control" type="password" name="password" required>
                        </div>
                        <input class="btn btn-primary" type="submit" name="signin" value="SIGNIN">
						</form>
                    
					
					
					<?php
						if(isset($_POST['signin']))
						{
								$adminusername = $_POST['email'];
								$pass = $_POST['password'];
								$select ="SELECT * FROM admin WHERE email = '".$adminusername."' AND password = '".$pass."'";
								$ret=mysqli_query($con,$select);
								$num=mysqli_fetch_array($ret);
								
								
							if( mysqli_num_rows($ret) > 0)
							{
								
								$extra="users.php";
								$_SESSION['login1']=$_POST['email'];
								$_SESSION['id']=$num['id'];
								$_SESSION['name']=$num['name'];
								$_SESSION['surname']=$num['surname'];
								echo '<script type="text/javascript"> alert("Logged IN successfully") </script>';
								echo "<script>window.location.href='".$extra."'</script>";
								exit();
							}
							else
							{
								echo '<script type="text/javascript"> alert("Invalid username '.$adminusername.' or password ") </script>';
								
								$extra="index.php";
								echo "<script>window.location.href='".$extra."'</script>";
								exit();
							}
						}

					?>
                </div>
            </div>
            <div class="col-lg-6 d-flex align-items-end" id="bg-block" style="background-image:url(&quot;assets/img/dev1.jpg&quot;);background-size:cover;background-position:center center;"></div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/preview.js"></script>
    <script src="assets/js/print.js"></script>
    <script src="assets/js/Sidebar-Menu.js"></script>
</body>

</html>