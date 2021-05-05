<?php
  require_once("db.php");

  $sql = "select year(emp_hiredate) as hireyear, count(emp_id) as empCount from Employee group by hireyear order by hireyear";

  $result = $mydb->query($sql);

  $data = array();
  for($x=0; $x<mysqli_num_rows($result); $x++) {
    $data[] = mysqli_fetch_assoc($result);
  }

  echo json_encode($data);
 ?>
