<?php
session_start();


$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "ttadb";


$conn = mysql_connect($dbhost, $dbuser, $dbpass);
mysql_select_db($db);


if(!isset($_SESSION['mem_id']))
{
	header("Location: memberLogin.php");
}
$res=mysql_query("SELECT mem_id, mem_email FROM tbl_members WHERE mem_id=".$_SESSION['mem_id']);
$userRow=mysql_fetch_array($res);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['mem_email']; ?></title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<div id="header">
	<div id="left">
    <label>Member Home</label>
    </div>
    <div id="right">
    	<div id="content">
        	hi' <?php echo $userRow['mem_id']; ?>&nbsp;<a href="logout.php?logout">Log Out</a>
        </div>
    </div>
</div>

<div id="body">
	
    
</div>

</body>
</html>