<?php
function check_login()
{
	if(strlen($_SESSION['login1'])==0)
		{	
			$host=$_SERVER['HTTP_HOST'];
			$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra="index.php";		
			$_SESSION["login1"]="";
    echo '<script language="javascript">document.location="index.php";</script>';		
		    
		}
}
?>