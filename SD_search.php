<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Your Courses</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="Webpages.css" />
    <script src="jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="myScripts.js"></script>
    <style>
h1 {text-align: center;}
h2{
    text-align: center;
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

<h1>Search by Name</h1>
   <form action="SD_search.php" method="post" enctype="multipart/form-data">
    Name:  <input type="text" name="firstName" value="" placeholder="" size="20">
    <input type="submit" value="Search" name="submit">
    </form>

<?php
    
    require_once("db.php");

    if (isset($_POST['firstName']))
    {
        
        $firstName = $_POST['firstName'];
        
        $sql = "SELECT * FROM student WHERE Student_First='$firstName';";
        
        $result = $mydb->query($sql);
        
        if ($result->num_rows > 0) {
   ?>

   

   <h3>Search results:</h3>

   <?php
            while($row = $result->fetch_assoc()) {
                echo '<h2>'.$row["Student_First"]." ".$row["Student_Last"]."'s Profile</h2>";
                echo '<table class="table">';
                echo '<tr><td>Email:</td><td>'.$row["Student_Email"].'</td></tr>';
                echo '<tr><td>City:</td><td>'.$row["City"].'</td></tr>';
                echo '<tr><td>State:</td><td>'.$row["State"].'</td></tr>';
                echo '<tr><td>Biography:</td><td>'.$row["About_Me"].'</td></tr>';
                echo '<tr><td>Birthday:</td><td>'.$row["birthday"].'</td></tr>';
                echo '<tr><td>Graduation Year:</td><td>'.$row["Student_GradYr"].'</td></tr>';
                echo '<tr><td>Gender:</td><td>'.$row["gender"].'</td></tr>';
                // echo '<tr><td>Firstname:</td><td>'.$row["Student_First"].'</td></tr>';
                // echo '<tr><td>Lastname:</td><td>'.$row["Student_Last"].'</td></tr>';
                // echo '<tr><td>Email:</td><td>'.$row["Student_Email"].'</td></tr>';
                echo '</table>';
                echo '<hr />';
                
            }
            echo "<p><a href='SD_viewProfiles.php'>Back To Profiles</a></p>";
        }
        else {
           echo "0 results";
           echo "<p><a href='SD_viewProfiles.php'>Back To Profiles</a></p>";
        }
    }
    // echo "<p><a href='SD_viewProfiles.php'>Back To Profiles</a></p>";
?>
<!-- <br>
<p><a href='SD_viewProfiles.php'>Back To Profiles</a></p> -->

