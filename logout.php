<?php
session_start();
$_SESSION['login']=="";
$_SESSION['name']="";
$_SESSION['SName']="";
$_SESSION['stdNum']="";
$_SESSION['number'] = "";
$_SESSION['role']="";
session_unset();
$_SESSION['action1']="You have logged out successfully..!";
?>
<script language="javascript">
document.location="index.php";
</script>


