<?php 
  include "config.php";

  $rid = 0;
  console.log('test2');
  if(isset($_POST['rid'])){
    $rid = mysqli_real_escape_string($con,$_POST['rid']);
  }
  if($rid > 0){
    // Check record exists
    console.log('test3');
    $checkRecord = mysqli_query($con,"SELECT * FROM meetingevaluation WHERE meetingeval_id=".$rid);
    $totalrows = mysqli_num_rows($checkRecord);

    if($totalrows > 0){
      // Delete record
      $query = "DELETE FROM meetingevaluation WHERE meetingeval_id=".$rid;
      console.log('test4');
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