<?php
include_once '../includes/connection.php';
  
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $sname = $_POST['sname'];
  $mobile = $_POST['mobile'];
  $email = $_POST['email'];
  $no_of_children = $_POST['noOfChildren'];
  $child1 = $_POST['child1Name']."-".$_POST['child1Sex']."-".$_POST['child1Age'];
  $child2 = $_POST['child2Name']."-".$_POST['child2Sex']."-".$_POST['child2Age'];
  $child3 = $_POST['child3Name']."-".$_POST['child3Sex']."-".$_POST['child3Age'];
  $child4 = $_POST['child4Name']."-".$_POST['child4Sex']."-".$_POST['child4Age'];
  $child5 = $_POST['child5Name']."-".$_POST['child5Sex']."-".$_POST['child5Age'];
  
  $subject = "Member Registration";

  $cc ="info@troytelugu.org";

  $date = date('m/d/Y h:i:s a', time());

    $run_insert = mysql_query("INSERT INTO tbl_member_registration(mem_firstname,mem_lsstname,mem_contact_num,mem_spousename,num_of_children,email_id,
                              child_1_info, child_2_info, child_3_info, child_4_info, child_5_info,creation_date,modified_date)
                        VALUES('$fname','$lname','$mobile','$sname',$no_of_children, '$email', '$child1','$child2','$child3','$child4','$child5',now(),now())") or die(mysql_error()) ;

						if($run_insert){

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
      $headers .= "Reply-To: ".$email."\r\n";
      $headers .= "CC: " . $cc . "\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

      mail($email, $subject, $memMessage, $headers);
      	exit();
      } else {
      	echo "<h4 class='Error'>User exists.</h4>";
      	exit();
      }
?>