<?php

include_once 'common/connection.php';

// get posted data
$data = json_decode(file_get_contents("php://input"));
$fname = $data->fname;
$lname = $data->lname;
$sname = $data->sname;
$mobile = $data->mobile;
$email = $data->email;
$no_of_children = $data->noOfChildren;
if ( $no_of_children > 0 ) {
    $child1 = $data->child1Name . "-" . $data->child1Sex . "-" . $data->child1Age;
    if ( $no_of_children > 1 ) {
        $child2 = $data->child2Name . "-" . $data->child2Sex . "-" . $data->child2Age;
        if ( $no_of_children > 2 ) {
            $child3 = $data->child3Name . "-" . $data->child3Sex . "-" . $data->child3Age;
            if ( $no_of_children > 3 ) {
                $child4 = $data->child4Name . "-" . $data->child4Sex . "-" . $data->child4Age;
                if ( $no_of_children > 4 ) {
                    $child5 = $data->child5Name . "-" . $data->child5Sex . "-" . $data->child5Age;
                }
            }
        }
    }
}

$subject = "Member Registration";

$cc = "info@troytelugu.org, chidamber.bhat@gmail.com";

$date = date('m/d/Y h:i:s a', time());

$run_insert = mysqli_query($con, "INSERT INTO tbl_member_registration(mem_firstname,mem_lsstname,mem_contact_num,mem_spousename,num_of_children,email_id,
                              child_1_info, child_2_info, child_3_info, child_4_info, child_5_info,creation_date,modified_date)
                        VALUES('$fname','$lname','$mobile','$sname',$no_of_children, '$email', '$child1','$child2','$child3','$child4','$child5',now(),now())") or die(mysql_error());

if ($run_insert) {
    $memMessage = "<html><body>Dear " . $fname . ", <br><br>Thanks for registering with us. We will keep in touch.<br><br>";
    $memMessage .= "<table rules='all' style='border-color: #666;' cellpadding='10'>";
    $memMessage .= "<tr><td><strong>Name </strong> </td><td>" . $fname . "</td></tr>";
    $memMessage .= "<tr><td><strong>Mobile </strong> </td><td>" . $mobile . "</td></tr>";
    $memMessage .= "<tr><td><strong>Email ID </strong> </td><td>" . $email . "</td></tr>";
    $memMessage .= "<tr><td><strong>Date Submitted </strong> </td><td>" . $date . "</td></tr>";
    $memMessage .= "</table>";
    $memMessage .= "</body></html>";

    $headers = "From: info@troytelugu.org\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "CC: " . $cc . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    mail($email, $subject, $memMessage, $headers);
    echo "Thank you for registering with us!";
} else {
    echo "Error registering or user already exists.";
}
mysqli_close($con);
?>