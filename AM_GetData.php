<?php
  require_once("db.php");
  //$tutid=0;
  //if(isset($_GET["tid"])) $tutid = $_GET["tid"];

  $sql= "SELECT CONCAT(tutor_first, ' ', tutor_last) AS 'tutorname', avg(meetingeval_overall) as overall FROM tutor t, meetingevaluation m 
  WHERE t.tutor_num=m.tutor_num 
  Group by tutorname";
  //$sql = "SELECT CONCAT(tutor_first, ' ', tutor_last) AS 'tutorname', avg(meetingeval_overall) as overall, FROM meetingevaluation WHERE tutor_num=$tutid";
  //$sql = "SELECT tutor_num, avg(meetingeval_overall) AS overall FROM tutor t, meetingevaluation m WHERE t.tutor_num=m.tutor_num;
  $result = $mydb->query($sql);

  $data = array();
  for($x=0; $x<mysqli_num_rows($result); $x++) {
    $data[] = mysqli_fetch_assoc($result);
  }

  echo json_encode($data);
?>