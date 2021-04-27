<?php
  require_once("db.php");
  $sId = 0;
  if(isset($_GET['supplierID'])) $sId =$_GET['supplierID'];

  $sql = "select productID, ProductName, unitprice * unitsinstock as totalValue from products where SupplierID = $sId";

  $result = $mydb->query($sql);

  $data = array();
  for($x=0; $x<mysqli_num_rows($result); $x++) {
    $data[] = mysqli_fetch_assoc($result);
  }

  echo json_encode($data);
 ?>
