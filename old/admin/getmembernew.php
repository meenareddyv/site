<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
include_once '../admin/connection.php';

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

$sql="SELECT * FROM tbl_member_registration WHERE $field like '%$q%'";
$result = mysqli_query($con,$sql);

echo "<a href='getmemberpage.php'>New Search</a>";
echo $sql;
echo "<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Phone Number</th>
<th>Email ID</th>
<th>Spouse Name</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['mem_firstname'] . "</td>";
    echo "<td>" . $row['mem_lsstname'] . "</td>";
    echo "<td>" . $row['mem_contact_num'] . "</td>";
    echo "<td>" . $row['email_id'] . "</td>";
    echo "<td>" . $row['mem_spousename'] . "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($con);

?>

</body>
</html>