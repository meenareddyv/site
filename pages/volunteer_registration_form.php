<?php



include_once '../includes/connection.php';





  $name = $_POST['name'];

  $mobile = $_POST['mobile'];

  

  $interestedIn = $_POST['interestedIn'];

  $email = $_POST['email'];

  $message = $_POST['message'];

  $subject = "Online Registration for Volunteering";

 $myemail ="info@troytelugu.org";






  	$to = $myemail;

  	$space = "   ";

  	$date = date('m/d/Y h:i:s a', time());

    $run_insert = mysql_query("INSERT INTO tbl_volunteer_registration(name,mobile_number,interested_in,email_id,message,date_created)

                        VALUES('$name','$mobile','$interestedIn', '$email', '$message',now())") or die(mysql_error()) ;

      

      if($run_insert){

      	echo "<h4 class='success'>Thank you for registered with us</h4>";
      $volunteerMessage = "<html><body>";
      $volunteerMessage .= "<table rules='all' style='border-color: #666;' cellpadding='10'>";
      $volunteerMessage .= "<tr><td><strong>Name </strong> </td><td>" . $name . "</td></tr>";
      $volunteerMessage .= "<tr><td><strong>Mobile </strong> </td><td>" . $mobile . "</td></tr>";
      $volunteerMessage .= "<tr><td><strong>Interested In </strong> </td><td>" . $interestedIn . "</td></tr>";
      $volunteerMessage .= "<tr><td><strong>Email </strong> </td><td>" . $email . "</td></tr>";
      $volunteerMessage .= "<tr><td><strong>Message </strong> </td><td>" . $message . "</td></tr>";
      $volunteerMessage .= "<tr><td><strong>Date Submitted </strong> </td><td>" . $date . "</td></tr>";
      $volunteerMessage .= "</table>";
      $volunteerMessage .= "</body></html>";
      
      
      $headers = "From: " . $email . "\r\n";
      $headers .= "Reply-To: ". $to . "\r\n";
      $headers .= "CC: 111.behappyface@gamil.com\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
      
      
      mail($to, $subject, $volunteerMessage, $headers);

      	exit();

      }else{

      	echo "<h4 class='Error'>User exists.</h4>";

      	exit();

      }


?>