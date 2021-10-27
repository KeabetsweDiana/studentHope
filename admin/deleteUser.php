<?php
session_start();
include'dbconnection.php';
		$query = "DELETE FROM user WHERE studentEmail='".$_GET['id']."'";
		
		
		if (!mysqli_query($con, $query))
		{
		echo "DELETE failed: $query<br />" .
		mysqli_connect_error() . "<br /><br />";
		}
		else
		{
		    
		    echo  "<script>alert('User Successfully Deleted');</script>";
			
			$host=$_SERVER['HTTP_HOST'];
			$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra="users.php";		
			echo '<script language="javascript">
                 document.location="users.php";
            </script>';
		}	
	

?>