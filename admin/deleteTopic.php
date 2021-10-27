<?php
session_start();
include'dbconnection.php';
		$query = "DELETE FROM topic WHERE id='".$_GET['id']."'";
		
		
		if (!mysqli_query($con, $query))
		{
		echo "DELETE failed: $query<br />" .
		mysqli_connect_error() . "<br /><br />";
		}
		else
		{
			echo "Successfully Deleted";
			$host=$_SERVER['HTTP_HOST'];
			$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra="history.php";		
			echo '<script>alert("Successfully Deleted")</script>';
													echo '<script language="javascript">
												document.location="history.php";
												</script>';
		}	
	

?>