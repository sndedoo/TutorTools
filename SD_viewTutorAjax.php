<!DOCTYPE html>
<html lang="en">
<head>

    <title>My Profile</title>
    
</head>
<body>

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