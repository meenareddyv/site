<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<style>
.img-style {
	height: 80px;
	width: 100%;
	border-bottom: 1px solid #000;
}
</style>
<script>
  function siteVisited(id){
	  alert(id.value);
	  }
</script>

<?php
include_once '../common/connection.php';

$result = mysqli_query ($con, "SELECT * FROM tbl_ads order by id asc" );

if ($result == null) {
	echo "<p>No results found.</p>";
}

$num = mysqli_num_rows ( $result );

if ($num > 0) {
	while ($r = mysqli_fetch_array($result)){
		echo "<table style='border-top:1px solid #911;margin:2px;width:100%'>";
		echo "<tr><td><a href='". $r ['ad_url'] ."' onclick='window.open(this.href); return false;'><img src='../ads/". $r ['ad_image_name'] ."' class='img-style'/></a></td></tr>";
		echo "</table>";
	}
}
?>







