<?php 
  include "config.php";

  $ird = 0;
  if(isset($_POST['rid'])){
    $id = mysqli_real_escape_string($con,$_POST['rid']);
  }
  if($id > 0){
    // Check record exists
    $checkRecord = mysqli_query($con,"SELECT * FROM meetingevaluation WHERE meetingeval_id=".$rid);
    $totalrows = mysqli_num_rows($checkRecord);

    if($totalrows > 0){
      // Delete record
      $query = "DELETE FROM meetingevaluation WHERE meetingeval_id=".$rid;
      mysqli_query($con,$query);
      echo 1;
      exit;
    }else{
      echo 0;
      exit;
    }
  }

  echo 0;
  exit;