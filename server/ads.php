  <?php

  include_once 'common/connection.php';

  $result = mysqli_query($con, "SELECT * FROM tbl_ads ORDER BY id ASC");

  $rows = array();
  while ($r = mysqli_fetch_assoc($result)) {
      $rows[] = array($r['ad_url'], $r['ad_image_name']);
  }
  print json_encode($rows);

  mysqli_close($con);
  ?>
