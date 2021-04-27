<?php
  require_once("db.php");
  $num = 0;
  if(isset($_GET['Student_Num'])) $num =$_GET['Student_Num'];

  $sql = "SELECT courseName, courseCredits FROM enrollment 
  INNER JOIN 
      student ON student.Student_Email = enrollment.Student_Email
  INNER JOIN 
      Courses ON Courses.CourseID = enrollment.CourseID
   WHERE student.Student_Num ='$num'";


  

  $result = $mydb->query($sql);

  $data = array();
  for($x=0; $x<mysqli_num_rows($result); $x++) {
    $data[] = mysqli_fetch_assoc($result);
  }

  echo json_encode($data);
 ?>
