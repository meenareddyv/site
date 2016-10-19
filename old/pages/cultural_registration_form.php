<?php
include_once '../includes/connection.php';
  $nameofevent = $_POST['nameofevent'];
  $ownerofevent = $_POST['ownerofevent'];
  $mobile = $_POST['mobile'];
  $noofparticipants = $_POST['noofparticipants'];
  $typeofevent = $_POST['typeofevent'];
  $duration = $_POST['duration'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $subject = "Online Registration for Cultural Event";

  $to ="info@troytelugu.org, cultural@troytelugu.org";
  // $to ="chidamber.bhat@gmail.com";

  $date = date('m/d/Y h:i:s a', time());

    $run_insert = mysql_query("INSERT INTO tbl_cultural_registration(name_of_event,owner_of_event,mobile_number,number_of_participants,type_of_event,duration_in_minutes,email_id,message,date_created)

                        VALUES('$nameofevent','$ownerofevent','$mobile',$noofparticipants,'$typeofevent',$duration, '$email', '$message',now())") or die(mysql_error()) ;

						if($run_insert){

      	echo "<h4 class='success'>Thank you for registered with us!</h4>";
        
      $culturalMessage = "<html><body>Dear " . $ownerofevent . ", <br><br>Thanks for your interest to participate in upcoming Ugadi event, 
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
      	exit();
      } else {
      	echo "<h4 class='Error'>User exists.</h4>";
      	exit();
      }
?>