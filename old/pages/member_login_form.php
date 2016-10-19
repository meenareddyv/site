<?php

session_start();

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "ttadb";


$conn = mysql_connect($dbhost, $dbuser, $dbpass);
mysql_select_db($db);
  

  if(isset($_SESSION['mem_id'])!=NULL)
  {
  	header("Location: memberLogin.php");
  }
  
  
  if(isset($_POST['submit']))
  {
  	$email = $_POST['email'];
  	$passwrd = $_POST['passwrd'];
  	
  	$res=mysql_query("SELECT mem_id, mem_email, mem_passwrd FROM tbl_members WHERE mem_email='".$email."'");
  	$row=mysql_fetch_array($res);
  	
  	$count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
  	
  	echo "Count =" .$count."#";
  	if($count == 1)
  	{
  		$_SESSION['mem_id'] = $row['mem_id'];
  		header("Location: memberProfile.php");
  	}
  	else
  	{
  	        echo "<h4 class='success'>Username / Password Seems Wrong !</h4>";
  	}
  	
  }
      
      
?>