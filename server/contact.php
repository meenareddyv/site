<?php

include_once 'common/connection.php';

if (!empty($_POST)) {
    // get posted data
    $data = json_decode(file_get_contents("php://input")); 
    $name = $data->userName;
    $email = $data->userEmail;
    $contactSubject = $data->subject;
    $subject = "From TTA Contact Form";
    $message = $data->message;

    $to = "info@troytelugu.org, chidamber.bhat@gmail.com";

    $date = date('m/d/Y h:i:s a', time());

    $run_insert = mysqli_query(con, "INSERT INTO tbl_contact_info(name,email_id,subject,message,date_created)
		VALUES('$name','$email','$subject','$message',now())") or die(mysql_error());

    if ($run_insert) {
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
        $headers .= "Reply-To: " . $to . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        mail($to, $subject, $messageFromRequestor, $headers);
        exit();
    } else {
        echo "<h4 class='Error'>User exists.</h4>";
        exit();
    }
} else { // GET Call
    $sql="SELECT * FROM tbl_contact_info ORDER BY date_created DESC";
    $result = mysqli_query($con,$sql);

    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = array($r["name"], $r["email_id"], 
            $r["subject"], $r["message"], 
            $r["date_created"]);
    }
    print json_encode($rows);
}
mysqli_close($con);
?>