<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="Webpages.css" />
    <script src="jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="myScripts.js"></script>
</head>
</head>
<body>
<?php include('navStudent.php');?>
    <?php
    session_start();
    // $email = $_SESSION["stuEmail"];
    // if(isset($_GET["stuEmail"])) $email=$_GET["stuEmail"];

    require_once("db.php");
    $sql = "SELECT * FROM student WHERE Student_Email ='".$_SESSION["stuEmail"]."'";

    // $sql = "SELECT * FROM student WHERE Student_Email ='".$_SESSION["stuEmail"]."'";
    // $sql = "SELECT Student_First, Student_Last, Student_GradYr  FROM student";
    $result = $mydb->query($sql);

    if($row = mysqli_fetch_array($result)){
        echo "<div class='wallpaper'><table border='1'>

        <thead><tr>
    
        <th>course_1</th>
        <th>course_1_credits</th>
        <th>course_2</th>
        <th>course_2_credits</th>
        <th>course_3</th>
        <th>course_3_credits</th>
        <th>course_4</th>
        <th>course_4_credits</th>
        <th>course_5</th>
        <th>course_5_credits</th>
        <th>course_6</th>
        <th>course_6_credits</th>
    
        
        
        
        </tr></thead>";
        
            echo "<tbody><tr>";
            echo "<td>".$row['course_1']."</td>";
            echo "<td>".$row['course_1_credits']."</td>";
            echo "<td>".$row['course_2']."</td>";
            echo "<td>".$row['course_2_credits']."</td>";
            echo "<td>".$row['course_3']."</td>";
            echo "<td>".$row['course_3_credits']."</td>";
            echo "<td>".$row['course_4']."</td>";
            echo "<td>".$row['course_4_credits']."</td>";
            echo "<td>".$row['course_5']."</td>";
            echo "<td>".$row['course_5_credits']."</td>";
            echo "<td>".$row['course_6']."</td>";
            echo "<td>".$row['course_6_credits']."</td>";
    
    
            
            echo "</tr></tbody>";
            echo "</table></div>";
        }
        ?>
    
        <p><a href="SD_editCourses.php">Edit Your Courses</a></p>
</body>
</html>