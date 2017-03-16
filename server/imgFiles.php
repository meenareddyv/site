<?php

  $folder = "../resources/images/" . $_GET["folder"];
  
  print json_encode(array_diff(scandir($folder), array('.', '..')));

?>
