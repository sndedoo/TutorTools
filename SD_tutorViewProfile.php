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
<?php include('navTutor.php');?>
    <?php
    session_start();
    // $email = $_SESSION["email"];
    // if(isset($_GET["email"])) $email=$_GET["email"];

    require_once("db.php");
    $sql = "SELECT * FROM tutor WHERE Tutor_Email ='".$_SESSION["email"]."'";

    // $sql = "SELECT * FROM student WHERE Student_Email ='".$_SESSION["email"]."'";
    // $sql = "SELECT Student_First, Student_Last, Student_GradYr  FROM student";
    $result = $mydb->query($sql);

    if($row = mysqli_fetch_array($result)){


    echo "<div class='wallpaper'><table border='1'>

    <thead><tr>
    
    <th>First Name</th>
    <th>Last Name</th>
    <th>About Me</th>
    <th>Phone Number</th>
    <th>City</th>
    <th>State</th>
    <th>Gender</th>

    
    
    
    </tr></thead>";
    
        echo "<tbody><tr>";
        echo "<td>".$row['Tutor_First']."</td>";
        echo "<td>".$row['Tutor_Last']."</td>";
        echo "<td>".$row['bio']."</td>";
        echo "<td>".$row['phone']."</td>";
        echo "<td>".$row['Tutor_City']."</td>";
        echo "<td>".$row['Tutor_State']."</td>";
        echo "<td>".$row['gender']."</td>";


        
        echo "</tr></tbody>";
        echo "</table></div>";
    }
    ?>

    <p><a href="SD_tutorEditProfile.php">Edit Your Profile</a></p>
</body>
</html>