<?php

include_once 'common/connection.php';

// get posted data
$data = json_decode(file_get_contents("php://input"));
$nameofevent = $data->nameofevent;
$ownerofevent = $data->ownerofevent;
$mobile = $data->mobile;
$noofparticipants = $data->noofparticipants;
$typeofevent = $data->typeofevent;
$duration = $data->duration;
$email = $data->email;
$message = $data->message;

$subject = "Online Registration for Cultural Event";

$to = "info@troytelugu.org, cultural@troytelugu.org, chidamber.bhat@gmail.com";

$date = date('m/d/Y h:i:s a', time());

$sql = "INSERT INTO tbl_cultural_registration(name_of_event,owner_of_event,mobile_number,number_of_participants,type_of_event,duration_in_minutes,email_id,message,date_created)"
        . " VALUES('$nameofevent','$ownerofevent','$mobile',$noofparticipants,'$typeofevent',$duration, '$email', '$message',now())";

$run_insert = mysqli_query($con, $sql) or die(mysql_error());

if ($run_insert) {

    $culturalMessage = "<html><body>Dear " . $ownerofevent . ", <br><br>Thanks for your interest to participate in upcoming Deepavali event, 
	  Troy Telugu Association Cultural Committee will review your request and get in touch with you soon.<br><br>";
    $culturalMessage .= "<table rules='all' style='border-color: #666;' cellpadding='10'>";
    $culturalMessage .= "<tr><td><strong>Name of the Event</strong> </td><td>" . $nameofevent . "</td></tr>";
    $culturalMessage .= "<tr><td><strong>Owner of the Event</strong> </td><td>" . $ownerofevent . "</td></tr>";
    $culturalMessage .= "<tr><td><strong>Mobile </strong> </td><td>" . $mobile . "</td></tr>";
    $culturalMessage .= "<tr><td><strong>No of Participants </strong> </td><td>" . $noofparticipants . "</td></tr>";
    $culturalMessage .= "<tr><td><strong>Type of Event </strong> </td><td>" . $typeofevent . "</td></tr>";
    $culturalMessage .= "<tr><td><strong>Duration in minutes </strong> </td><td>" . $duration . "</td></tr>";
    $culturalMessage .= "<tr><td><strong>Email ID </strong> </td><td>" . $email . "</td></tr>";
    $culturalMessage .= "<tr><td><strong>Message </strong> </td><td>" . $message . "</td></tr>";
    $culturalMessage .= "<tr><td><strong>Date Submitted </strong> </td><td>" . $date . "</td></tr>";
    $culturalMessage .= "</table>";
    $culturalMessage .= "</body></html>";

    $headers = "From: cultural@troytelugu.org\r\n";
    $headers .= "Reply-To: cultural@troytelugu.org\r\n";
    $headers .= "CC: " . $to . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    mail($email, $subject, $culturalMessage, $headers);
    echo "Successfully Registered";
} else {
    echo "Error while registering, please send details to cultural@troytelugu.org";
}
mysqli_close($con);
?>