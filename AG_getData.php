<?php
  require_once("db.php");

  $sql = "SELECT Meet_Location, count(Meet_ID) AS meetCount FROM meeting GROUP BY Meet_Location";

  $result = $mydb->query($sql);

  $data = array();
  for($x=0; $x<mysqli_num_rows($result); $x++) {
    $data[] = mysqli_fetch_assoc($result);
  }

  echo json_encode($data);
 ?>
