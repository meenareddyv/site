<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
	white-space: nowrap;
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}

input { float:right; }

</style>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type='text/javascript'>
function downloadFile() {
    window.open('data:application/vnd.ms-excel,' + $('#memberInfo').html());
};
</script>
</head>
<body>

<?php
include_once '../common/connection.php';

$value = $_GET['v'];
$query = $_GET['q'];

$field = "mem_firstname";
if ( $query == "lname" ) {
	$field = "mem_lsstname";
} elseif ( $query == "phone" ) {
	$field = "mem_contact_num";
} elseif ( $query == "email" ) {
	$field = "email_id";
}

$sql="SELECT * FROM tbl_member_registration WHERE $field like '%$value%'";
$result = mysqli_query($con,$sql);

echo "<a href='getmemberpage.php'>New Search</a>";
echo "<input type='button' onclick=\"downloadFile()\" value='Export Table Data to Excel'/>";
echo "<br><br>";
echo "<div id='memberInfo'> <table>
<tr>
<th>#</th>
<th>Firstname</th>
<th>Lastname</th>
<th>Phone Number</th>
<th>Email ID</th>
<th>Spouse Name</th>
<th>Child - 1</th>
<th>Child - 2</th>
<th>Child - 3</th>
</tr>";

$index = 1;
while($row = mysqli_fetch_array($result)) {
    $phone_num = preg_replace('/[^0-9]/', '', $row['mem_contact_num']);
    $phone_num = "(" . substr($phone_num, 0, 3) . ") " . substr($phone_num, 3, 3) . "-" . substr($phone_num, 6);
    echo "<tr>";
	echo "<td>" . $index++ . "</td>";
    echo "<td>" . $row['mem_firstname'] . "</td>";
    echo "<td>" . $row['mem_lsstname'] . "</td>";
    echo "<td>" . $phone_num . "</td>";
    echo "<td>" . $row['email_id'] . "</td>";
    echo "<td>" . $row['mem_spousename'] . "</td>";
	
	$cInfo = "";
	$childInfo = explode("-",$row['child_1_info']);
	if ( $childInfo[0] != "" )
		$cInfo = $childInfo[0] . " (" . strtoupper(substr($childInfo[1],0,1)) . "/" . $childInfo[2] . ") ";
	echo "<td>" . $cInfo . "</td>";
	$childInfo = explode("-",$row['child_2_info']);
	if ( $childInfo[0] != "" )
		$cInfo = $childInfo[0] . " (" . strtoupper(substr($childInfo[1],0,1)) . "/" . $childInfo[2] . ") ";
	else
		$cInfo = "";
	echo "<td>" . $cInfo . "</td>";
	$childInfo = explode("-",$row['child_3_info']);
	if ( $childInfo[0] != "" )
		$cInfo = $childInfo[0] . " (" . strtoupper(substr($childInfo[1],0,1)) . "/" . $childInfo[2] . ") ";
	else
		$cInfo = "";
	echo "<td>" . $cInfo . "</td>";
    echo "</tr>";
}
echo "</table> </div>";

mysqli_close($con);

?>

</body>
</html>