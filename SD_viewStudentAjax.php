<!DOCTYPE html>
<html lang="en">

<head>
<link href="css/bootstrap.min.css" rel="stylesheet" />
    
    <title>My Profile</title>
    <style>
        h1 {text-align: left;}
        h2{
            text-align: left;
            font-weight: bold;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            color: #8B1F41;
        }
        p {text-align: left;}
        table tr td {
            text-align: left;
            margin-left: 1em;
        }
    </style>
</head>
<body class="container fluid">
    <?php
    session_start();
    // $email = $_SESSION["email"];
    // if(isset($_GET["email"])) $email=$_GET["email"];

    require_once("db.php");
    $sql = "SELECT * FROM student WHERE Student_Email ='".$_SESSION["email"]."'";

    // $sql = "SELECT * FROM student WHERE Student_Email ='".$_SESSION["email"]."'";
    // $sql = "SELECT Student_First, Student_Last, Student_GradYr  FROM student";
    $result = $mydb->query($sql);

    // if($row = mysqli_fetch_array($result)){
        if($row = $result->fetch_assoc()) {
            echo "<div class='row'>";
            echo "<div class='col-xs-12 col-sm-10 col-md-8 col-lg-6'>";
            echo '<h2>'.$row["Student_First"]." ".$row["Student_Last"]."'s Profile</h2>";
            echo '<table class="table">';
            echo '<tr><td>Email:</td><td>'.$row["Student_Email"].'</td></tr>';
            echo '<tr><td>City:</td><td>'.$row["City"].'</td></tr>';
            echo '<tr><td>State:</td><td>'.$row["State"].'</td></tr>';
            echo '<tr><td>Biography:</td><td>'.$row["About_Me"].'</td></tr>';
            echo '<tr><td>Birthday:</td><td>'.$row["birthday"].'</td></tr>';
            echo '<tr><td>Graduation Year:</td><td>'.$row["Student_GradYr"].'</td></tr>';
            echo '<tr><td>Gender:</td><td>'.$row["gender"].'</td></tr>';
            echo '</table>';
            echo '<hr />';
            echo "</div>";
            echo "</div>";
            
        }


    // echo "<div class='wallpaper'><table border='1' class='table'>

    // <thead><tr>
    
    // <th>First Name</th>
    // <th>Last Name</th>
    // <th>About Me</th>
    // <th>Phone Number</th>
    // <th>Mailing Address</th>
    // <th>City</th>
    // <th>State</th>
    // <th>ZIP Code</th>
    // <th>Graduation Year</th>
    // <th>Birthday</th>
    // <th>Gender</th>

    
    
    
    // </tr></thead>";
    
    //     echo "<tbody><tr>";
    //     echo "<td>".$row['Student_First']."</td>";
    //     echo "<td>".$row['Student_Last']."</td>";
    //     echo "<td>".$row['About_Me']."</td>";
    //     echo "<td>".$row['Phone']."</td>";
    //     echo "<td>".$row['Street_Address']."</td>";
    //     echo "<td>".$row['City']."</td>";
    //     echo "<td>".$row['State']."</td>";
    //     echo "<td>".$row['zip']."</td>";
    //     echo "<td>".$row['Student_GradYr']."</td>";
    //     echo "<td>".$row['birthday']."</td>";
    //     echo "<td>".$row['gender']."</td>";


        
    //     echo "</tr></tbody>";
    //     echo "</table></div>";
    // }
    ?>

    <p><a href="SD_editProfile.php">Edit Your Profile</a></p>
</body>
</html>