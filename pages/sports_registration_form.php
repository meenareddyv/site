<?php

include_once '../common/connection.php';

// Check if paypal request or response
if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])) {
    // get posted data
    $data = json_decode(file_get_contents("php://input"));
    $viewInfo = ( ((int)$data->reg_num) > 0 );
    if ( $viewInfo ) {
        $sql = "SELECT * FROM tbl_sports_registration WHERE reg_num='$data->reg_num' AND email='$data->email'";
    } else {
        $sql = "SELECT * FROM tbl_sports_registration WHERE email='$data->email' AND game='$data->game' LIMIT 1";
    }

    $result = mysqli_query($con, $sql);
    if ($result ) {
        if ( mysqli_num_rows($result) > 0 ) {
            $row = mysqli_fetch_array($result);
            print '{ "row": ' . json_encode($row) . ', "type":"exists" }';
            mysqli_free_result($result);
            exit();
        }
    } 
    if ( $viewInfo ) {
        print '{ "type":"notfound" }';
        exit();
    }

    $sql = "INSERT INTO tbl_sports_registration(captain, phone, email, player1, player2, player3, player4, player5,
 	player6, player7, game, age_group, fee, team_name, paid_status, created, modified) VALUES('$data->captain', '$data->phone',
	'$data->email', '$data->player1', '$data->player2', '$data->player3', '$data->player4', '$data->player5',
	'$data->player6', '$data->player7', '$data->game', '$data->gameType', '$data->registrationFee', '$data->team_name', 'not paid', now(), now() )";

    mysqli_query($con, $sql) or die(mysql_error());
    $uniqueId = mysqli_insert_id($con);

    $response = '{"regId":' . $uniqueId . ', "type":"new"}';

    if ($uniqueId > 0) {
        $subject = "2016 Sports Registration";

        $cc = "info@troytelugu.org, chidamber.bhat@gmail.com";

        $date = date('m/d/Y h:i:s a', time());

        $eventDate = "27";
        if ($data->game == "Tennis") {
            $eventDate = "28";
            $eventContacts = "Ramesh Uppala - (248) 730-5133 / Maheswara Reddy Palle - (248) 229-8387";
        } else if ($data->game == "Volleyball") {
            $eventContacts = "Ramagopal Reddy - (551) 208-8276 / Ramdas Reddy Kondur - (248) 346-6596";
        } else {
            $eventContacts = "Chandru Bhoopalam - (248) 318-3313 / Suresh Cholaveti - (614) 843-3552";
        }

        $memMessage = "<html><body>Dear " . $data->captain . ", <br><br>Thanks for registering to Troy Telugu Association - 2016 Sports Event.<br><br>";
        $memMessage .= "We look forward to see you @ 8:00 am on " . $eventDate . "th Aug'16<br><br>In case of any questions please contact " . $eventContacts;
        $memMessage .= "<br><br><table rules='all' style='border-color: #666;' cellpadding='10'>";
        $memMessage .= "<tr><td><strong>Registration #</strong> </td><td>" . $uniqueId . "</td></tr>";
        $memMessage .= "<tr><td><strong>TTA Event</strong> </td><td>" . $data->game . "</td></tr>";
        $memMessage .= "<tr><td><strong>Name </strong> </td><td>" . $data->captain . "</td></tr>";
        $memMessage .= "<tr><td><strong>Contact Number</strong> </td><td>" . $data->phone . "</td></tr>";
        $memMessage .= "<tr><td><strong>Email ID </strong> </td><td>" . $data->email . "</td></tr>";
        $memMessage .= "<tr><td><strong>Registration Fee</strong> </td><td>" . $data->registrationFee . "</td></tr>";
        $memMessage .= "<tr><td><strong>Date Submitted </strong> </td><td>" . $date . "</td></tr>";
        $memMessage .= "</table>";
        $memMessage .= "</body></html>";

        $headers = "From: info@troytelugu.org\r\n";
        $headers .= "Reply-To: " . $data->email . "\r\n";
        $headers .= "CC: " . $cc . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        mail($data->email, $subject, $memMessage, $headers);
    }
    echo ($response);
    exit();
} else {
    // Response from Paypal
    // read the post from PayPal system and add 'cmd'
    $req = 'cmd=_notify-validate';
    foreach ($_POST as $key => $value) {
        $value = urlencode(stripslashes($value));
        $value = preg_replace('/(.*[^%^0^D])(%0A)(.*)/i', '${1}%0D%0A${3}', $value); // IPN fix
        $req .= "&$key=$value";
    }

    // assign posted variables to local variables
    $data['item_name'] = $_POST['item_name'];
    $data['item_number'] = $_POST['item_number'];
    $data['payment_status'] = $_POST['payment_status'];
    $data['payment_amount'] = $_POST['mc_gross'];
    $data['payment_currency'] = $_POST['mc_currency'];
    $data['txn_id'] = $_POST['txn_id'];
    $data['receiver_email'] = $_POST['receiver_email'];
    $data['payer_email'] = $_POST['payer_email'];
    $data['custom'] = $_POST['custom'];

    // post back to PayPal system to validate
    $header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
    $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
    $header .= "Content-Length: " . strlen($req) . "\r\n\r\n";

    $fp = fsockopen('ssl://www.paypal.com', 443, $errno, $errstr, 30);

    if ($fp) {
        fputs($fp, $header . $req);
        while (!feof($fp)) {
            $res = fgets($fp, 1024);
            if (strcmp($res, "VERIFIED") == 0) {
                mail('chidamber.bhat@gmail.com', 'PAYPAL POST - VERIFIED RESPONSE', print_r($post, true));
                $sql = "UPDATE tbl_sports_registration SET paid_status = 'paid' WHERE reg_num = " . $data['item_number'];
                mysqli_query($con, $sql) or die(mysql_error());
            } else if (strcmp($res, "INVALID") == 0) {
                mail("chidamber.bhat@gmail.com", "PAYPAL DEBUGGING", "Invalid Response<br />data = <pre>" . print_r($post, true) . "</pre>");
                $sql = "UPDATE tbl_sports_registration SET paid_status = 'invalid' WHERE reg_num = " . $data['item_number'];
                mysqli_query($con, $sql) or die(mysql_error());
            }
        }
        fclose($fp);
    }
}
?>
