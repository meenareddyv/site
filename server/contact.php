<?php

include_once 'common/connection.php';

// get posted data
$data = json_decode(file_get_contents("php://input"));
$name = $data->userName;
$email = $data->userEmail;
$contactSubject = $data->subject;
$subject = "From TTA Contact Form";
$message = $data->message;

$to = "info@troytelugu.org, chidamber.bhat@gmail.com, guruperi11@gmail.com";

$date = date('m/d/Y h:i:s a', time());

$run_insert = mysqli_query($con, "INSERT INTO tbl_contact_info(name,email_id,subject,message,date_created)
		VALUES('$name','$email','$subject','$message',now())") or die(mysql_error());

if ($run_insert) {
    $messageFromRequestor = "<html><body>";
    $messageFromRequestor .= "<table rules='all' style='border-color: #666;' cellpadding='10'>";
    $messageFromRequestor .= "<tr><td><strong>Contact Name:</strong> </td><td>" . $name . "</td></tr>";
    $messageFromRequestor .= "<tr><td><strong>Email ID:</strong> </td><td>" . $email . "</td></tr>";
    $messageFromRequestor .= "<tr><td><strong>Subject:</strong> </td><td>" . $contactSubject . "</td></tr>";
    $messageFromRequestor .= "<tr><td><strong>Message:</strong> </td><td>" . $message . "</td></tr>";
    $messageFromRequestor .= "<tr><td><strong>Date Submitted:</strong> </td><td>" . $date . "</td></tr>";
    $messageFromRequestor .= "</table>";
    $messageFromRequestor .= "</body></html>";


    $headers = "From: info@troytelugu.org\r\n";
    $headers .= "Reply-To: info@troytelugu.org\r\n";
    $headers .= "CC: " . $to . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    if (mail($email, $subject, $messageFromRequestor, $headers)) {
        echo "Your request has been submitted. We will contact you. Thanks!!";
    } else {
        echo "Failed sending mail!";
    }
} else {
    echo "Failed to register information!";
}
mysqli_close($con);
?>