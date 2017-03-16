<?php

include_once 'common/connection.php';


{ // GET Call
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



    { // GET
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


    { // GET Call
    $sql="SELECT * FROM tbl_cultural_registration ORDER BY date_created DESC";
    $result = mysqli_query($con,$sql);

    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = array($r["name_of_event"], 
            $r["owner_of_event"], 
            $r["mobile_number"], $r["type_of_event"], 
            $r["number_of_participants"], $r["duration_in_minutes"], 
            $r["email_id"], $r["message"], $r["date_created"]);
    }
    print json_encode($rows);
}

mysqli_close($con);
?>

