<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
		var $tennis = 7;
		var $volleyball = 2;
		var $throwball = 3;
		
        var data = google.visualization.arrayToDataTable([
          ['Event', 'Enrollments'],
          ['Tennis',     $tennis],
          ['Volleyball',      $volleyball],
          ['Throwball',  $throwball]
        ]);

        var options = {
          title: 'Enrollments - as of 8/14'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
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
    window.open('data:application/vnd.ms-excel,' + $('#sportsInfo').html());
};
</script>
</head>
<body>

<div id="piechart" style="width: 500px; height: 250px;"></div>

<?php
include_once '../common/connection.php';

$sql="SELECT * FROM tbl_sports_registration ORDER by game, age_group";
$result = mysqli_query($con,$sql);

echo "<br><br>";
echo "<div id='sportsInfo'> <table>
<tr>
<th>Reg Id</th>
<th>Captain</th>
<th>Contact#</th>
<th>Email ID</th>
<th>TTA Sports Event</th>
<th>Category</th>
<th>Fee</th>
<th>Status</th>
</tr>";
$total = 0;
setlocale(LC_MONETARY, 'en_US');
while($row = mysqli_fetch_array($result)) {
    $phone_num = preg_replace('/[^0-9]/', '', $row['phone']);
    $phone_num = "(" . substr($phone_num, 0, 3) . ") " . substr($phone_num, 3, 3) . "-" . substr($phone_num, 6);
    echo "<tr>";
	echo "<td>" . $row['reg_num'] . "</td>";
    echo "<td>" . $row['captain'] . "</td>";
    echo "<td>" . $phone_num . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['game'] . "</td>";
	if ( $row['game'] == "Tennis" )
		echo "<td>" . $row['age_group'] . "</td>";
	else
		echo "<td></td>";
    echo "<td>$ " . number_format($row['fee'], 2) . "</td>";
	$total = $total + $row['fee'];
    echo "<td>" . $row['paid_status'] . "</td>";
    echo "</tr>";
}
	echo "<tfoot><tr>";
      echo "<th id='total' colspan='6'>Total :</th><td>$ " . number_format($total, 2) . "</td>";
    echo "</tr></tfoot>";
echo "</table> </div>";

mysqli_close($con);
?>
</body>
</html>