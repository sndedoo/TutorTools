<!DOCTYPE html>
<html lang="en">
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
    <style>
        h1 {text-align: left;}
        p {text-align: left;}
        table tr td {
            text-align: left;
            margin-left: 1em;
        }
    </style>
</head>
    

    <?php include('navStudent.php'); ?>
    <?php
    
    if (isset($_GET['firstName']))
    {
        require_once("db.php");
        $firstname = $_GET['firstName'];
        $sql = "SELECT * FROM student WHERE Student_First='$firstname'";

        
        
        $result = $mydb->query($sql);
        
        if ($result->num_rows > 0) {
            
            if($row = $result->fetch_assoc()) {
                echo "<div class='row'>";
                echo "<div class='col-xs-12 col-sm-10 col-md-8 col-lg-6'>";
                echo '<h1>'.$row["Student_First"]." ".$row["Student_Last"]."'s Profile</h1>";
                echo '<table class="table">';
                echo '<tr><td>Email:</td><td>'.$row["Student_Email"].'</td></tr>';
                echo '<tr><td>City:</td><td>'.$row["City"].'</td></tr>';
                echo '<tr><td>State:</td><td>'.$row["State"].'</td></tr>';
                echo '<tr><td>Biography:</td><td>'.$row["About_Me"].'</td></tr>';
                echo '<tr><td>Birthday:</td><td>'.$row["birthday"].'</td></tr>';
                echo '<tr><td>Graduation Year:</td><td>'.$row["Student_GradYr"].'</td></tr>';
                echo '<tr><td>Gender:</td><td>'.$row["gender"].'</td></tr>';


                
            }
            echo '</table>';
            echo "</div>";
            echo "</div>";
            echo "<p><a href='SD_viewProfiles.php'>Back To Profiles</a></p>";
        }
        else {
           echo "0 results";
           echo "<p><a href='SD_viewProfiles.php'>Back To Profiles</a></p>";
        }
    }
    else {
        

        require_once("db.php");
        echo '<h2>All our members:</h2>';

        $sql = "SELECT * FROM student";
        
        $result = $mydb->query($sql);
        
        if ($result->num_rows > 0) {
   
            while($row = $result->fetch_assoc()) {
                
                echo '<hr />';
                echo '<table>';
                echo '<tr><td>Student_Num:</td><td>'.$row["Student_Num"].'</td></tr>';
                echo '<tr><td>Student_Email:</td><td><img src="'.$row["Student_Email"].'" width="100px" /></td></tr>';
                echo '<tr><td>Student_First:</td><td>'.$row["Student_First"].'</td></tr>';
                echo '<tr><td>Student_Last:</td><td>'.$row["Student_Last"].'</td></tr>';
                echo '<tr><td>State:</td><td>'.$row["State"].'</td></tr>';
                echo '</table>';
                
            }
            echo "<p><a href='SD_viewProfiles.php'>Back To Profiles</a></p>";
        }
        else {
           echo "0 results";
           echo "<p><a href='SD_viewProfiles.php'>Back To Profiles</a></p>";
        }
    }
?>