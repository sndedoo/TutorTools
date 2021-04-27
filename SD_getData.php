<?php
  require_once("db.php");
  $num = 0;
  if(isset($_GET['Student_Num'])) $num =$_GET['Student_Num'];

  // $sql = "select Student_Num, CONCAT(Student_First, " ", Student_Last) AS 'Student Name', unitprice * unitsinstock as totalValue from student where Student_Num = $num";
  $sql = "select Student_First, course_1_credits+ course_2_credits + course_3_credits AS Credits from student where Student_Num = $num";

  //create another associative table to display all courses

  

  $result = $mydb->query($sql);

  $data = array();
  for($x=0; $x<mysqli_num_rows($result); $x++) {
    $data[] = mysqli_fetch_assoc($result);
  }

  echo json_encode($data);
 ?>
