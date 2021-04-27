<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include('navStudent.php');?>
    <form action="SD_show.php" method="get">
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

    <input type="submit" name="submit" value="Submit">
    
    </form>
</body>
</html>