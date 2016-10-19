<?php

include_once 'common/connection.php';

if (!empty($_POST)) {
    // get posted data
    $data = json_decode(file_get_contents("php://input"));
    $fname = $data->fname;
    $lname = $data->lname;
    $sname = $data->sname;
    $mobile = $data->mobile;
    $email = $data->email;
    $no_of_children = $data->noOfChildren;
    $child1 = $data->child1Name . "-" . $data->child1Sex . "-" . $data->child1Age;
    $child2 = $data->child2Name . "-" . $data->child2Sex . "-" . $data->child2Age;
    $child3 = $data->child3Name . "-" . $data->child3Sex . "-" . $data->child3Age;
    $child4 = $data->child4Name . "-" . $data->child4Sex . "-" . $data->child4Age;
    $child5 = $data->child5Name . "-" . $data->child5Sex . "-" . $data->child5Age;

    $subject = "Member Registration";

    $cc = "info@troytelugu.org, chidamber.bhat@gmail.com";

    $date = date('m/d/Y h:i:s a', time());

    $run_insert = mysqli_query(con, "INSERT INTO tbl_member_registration(mem_firstname,mem_lsstname,mem_contact_num,mem_spousename,num_of_children,email_id,
                              child_1_info, child_2_info, child_3_info, child_4_info, child_5_info,creation_date,modified_date)
                        VALUES('$fname','$lname','$mobile','$sname',$no_of_children, '$email', '$child1','$child2','$child3','$child4','$child5',now(),now())") or die(mysql_error());

    if ($run_insert) {

        echo "<h4 class='success'>Thank you for registering with us!</h4>";

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
        exit();
    } else {
        echo "<h4 class='Error'>User exists.</h4>";
        exit();
    }
} else { // GET
    $sql = "SELECT * FROM tbl_member_registration ORDER BY creation_date DESC";
    $result = mysqli_query($con, $sql);

    $rows = array();
    while ($r = mysqli_fetch_assoc($result)) {
        $rows[] = array($r["mem_firstname"],
            $r["mem_lsstname"], $r["email_id"],
            $r["mem_contact_num"], $r["mem_spousename"],
            $r["num_of_children"], $r["child_1_info"], $r["child_2_info"],
            $r["child_3_info"], $r["creation_date"]);
    }
    print json_encode($rows);
}
?>