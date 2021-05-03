<?php 
  require_once("db.php");

  $rid = 0;
  //console.log('test2');
  if(isset($_POST['rid'])){
    $rid =$_POST['rid'];
  }
  if($rid > 0){
    // Check record exists
    //console.log('test3');
    //$checkRecord = mysqli_query($con,"SELECT * FROM meetingevaluation WHERE meetingeval_id=".$rid);
    //$totalrows = mysqli_num_rows($checkRecord);

    //if($totalrows > 0){
      // Delete record
      $sql = "DELETE FROM meetingevaluation WHERE meetingeval_id=".$rid;
      //console.log('test4');
     $mydb->query($sql);
      echo 1;
    }else{
      echo 0;
  
    }

  