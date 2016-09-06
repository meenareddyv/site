<?php



include_once '../includes/connection.php';


$name = $_POST['userName'];

$email = $_POST['userEmail'];

$contactSubject = $_POST['subject'];
$subject = "From TTA Contact Form";


$message = $_POST['message'];

//$myemail ="123.meeting@gmail.com";
$myemail ="info@troytelugu.org";




$to = $myemail;

$space = "   ";

$date = date('m/d/Y h:i:s a', time());

$run_insert = mysql_query("INSERT INTO tbl_contact_info(name,email_id,subject,message,date_created)

		VALUES('$name','$email','$subject','$message',now())") or die(mysql_error()) ;





if($run_insert){

	echo "<h4 class='success'>Your request has been submitted. We will contact you. Thanks!</h4>";

$messageFromRequestor = "<html><body>";
$messageFromRequestor .= "<table rules='all' style='border-color: #666;' cellpadding='10'>";
$messageFromRequestor .= "<tr><td><strong>Contact Name:</strong> </td><td>" . $name . "</td></tr>";
$messageFromRequestor .= "<tr><td><strong>Email ID:</strong> </td><td>" . $email . "</td></tr>";
$messageFromRequestor .= "<tr><td><strong>Subject:</strong> </td><td>" . $contactSubject . "</td></tr>";
$messageFromRequestor .= "<tr><td><strong>Message:</strong> </td><td>" . $message . "</td></tr>";
$messageFromRequestor .= "<tr><td><strong>Date Submitted:</strong> </td><td>" . $date . "</td></tr>";
$messageFromRequestor .= "</table>";
$messageFromRequestor .= "</body></html>";

	 
$headers = "From: " . $email . "\r\n";
$headers .= "Reply-To: ". $to . "\r\n";
$headers .= "CC: 111.behappyface@gamil.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


mail($to, $subject, $messageFromRequestor , $headers);

	exit();

}else{

	echo "<h4 class='Error'>User exists.</h4>";

	exit();

}






?>