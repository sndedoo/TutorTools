<?php
  require_once("db.php");
  $ovalue=0;
  if(isset($_GET["orank"])) $ovalue = $_GET["orank"];

  $sql = "SELECT tutor_num, sum(meetingeval_overall)/count(meetingeval_overall) AS overall, DISTINCT meetingeval_overall AS rate FROM tutor t, meetingevaluation m WHERE t.tutor_num=m.tutor_num AND m.tutor_num=".$ovalue;
  $result = $mydb->query($sql);

  $data = array();
  for($x=0; $x<mysqli_num_rows($result); $x++) {
    $data[] = mysqli_fetch_assoc($result);
  }

  echo json_encode($data);
?>