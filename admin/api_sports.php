<?php
include_once '../common/connection.php';

$sql="SELECT * FROM tbl_sports_registration";
$result = mysqli_query($con,$sql);

$rows = array();
while($r = mysqli_fetch_assoc($result)) {
    $rows[] = array($r["reg_num"], $r["captain"], $r["phone"], $r["email"], $r["game"], $r["age_group"], $r["fee"], $r["paid_status"]);
}
print json_encode($rows);

mysqli_close($con);
?>
