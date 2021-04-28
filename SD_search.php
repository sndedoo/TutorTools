<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profiles</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="Webpages.css" />
    <script src="jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="myScripts.js"></script>
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
<?php include ('navStudent.php') ?>
    <h1>Students</h1>
    <br>
   <form action="SD_search.php" method="post" enctype="multipart/form-data">
    <label for="firstName"> Search By Name: </label><input type="text" name="firstName" value="" placeholder="" size="20">
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

   // Use the grid system to figure out width attribute
            while($row = $result->fetch_assoc()) {
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
            echo "<p><a href='SD_viewProfiles.php'>Back To Profiles</a></p>";
        }
        else {
           echo "No results";
           echo "<p><a href='SD_viewProfiles.php'>Back To Profiles</a></p>";
        }
    }
?>


