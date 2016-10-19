<?php
   $dbhost = "ttadb.db.8515595.hostedresource.com";
   $dbuser = "ttadb";
   $dbpass = "Sairam01";
   $db = "ttadb";

	$con = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
	if (!$con) {
		die('Could not connect: ' . mysqli_error($con));
	}
?>
