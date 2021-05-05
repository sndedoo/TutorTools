<?php
  require_once("db.php");

  $sql = "select tutor(Tutor_First) as FirstName, count(Meet_ID) as empCount from tutor";

  $result = $mydb->query($sql);

  $data = array();
  for($x=0; $x<mysqli_num_rows($result); $x++) {
    $data[] = mysqli_fetch_assoc($result);
  }

  echo json_encode($data);
 ?>
