<?php session_start(); include('navStudent.php');?>
    
    
<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Courses</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="Webpages.css" />
    <script src="jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="myScripts.js"></script>
</head>
</head>
<body>
    <?php
    
    // $email = $_SESSION["email"];
    // if(isset($_GET["email"])) $email=$_GET["email"];

    require_once("db.php");
    $sql = "SELECT * FROM enrollment 
    INNER JOIN 
        student ON student.Student_Email = enrollment.Student_Email
    INNER JOIN 
        Courses ON Courses.CourseID = enrollment.CourseID
     WHERE enrollment.Student_Email ='".$_SESSION["email"]."'";
    // echo $sql;
    // $sql = "SELECT * FROM student WHERE Student_Email ='".$_SESSION["email"]."'";
    // $sql = "SELECT Student_First, Student_Last, Student_GradYr  FROM student";
    $result = $mydb->query($sql);

    echo "<div class='wallpaper'><table border='1'>

        <thead><tr>
    
        <th>Course</th>
        <th>Credits</th>
    
        
        
        
        </tr></thead>";

    while($row = mysqli_fetch_array($result)){
        
        
            echo "<tbody><tr>";
            echo "<td>".$row['courseName']."</td>";
            echo "<td>".$row['courseCredits']."</td>";
            echo "</tr>";
    
    
            
            
        }
        echo "</tbody>";
        echo "</table></div>";
        ?>
    
        <p><a href="SD_editCourses.php">Edit Your Courses</a></p>
</body>
</html>