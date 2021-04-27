<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Load</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="Webpages.css" />
    <script src="jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="myScripts.js"></script>
</head>
<body>
    <?php include ('SD_container.php') ?>
    <form action="SD_show.php" method="get">
    <label for="Student_Num">Your Student ID:</label>
    <select name="Student_Num">

    <?php
    session_start();
    $email = $_SESSION['stuEmail'];
    
	require_once("db.php");
	$sql = "SELECT Student_Num FROM student WHERE Student_Email ='$email'";
	$result = $mydb->query($sql);
    
    
    while($row = mysqli_fetch_array($result)){
      echo "<option value='".$row["Student_Num"]."'>".$row["Student_Num"]."</option>";
    }
   ?>
    </select>

    <input type="submit" name="submit" value="View Courseload">
    
    </form>
</body>
</html>