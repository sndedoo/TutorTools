<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Service Request Submissiont</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <script src="jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <meta author="Alejandro Gonzales">

    <link rel="stylesheet" href="Webpages.css"/>
</head>
<body>
<?php
  $id = 0;
  if(isset($_GET['id'])) $id=$_GET['id'];

  require_once("db.php");

  $sql = "";
  if($id==0)
    $sql ="SELECT Meet_ID, Meet_Time, Meet_Location, Concat(Format(Stu_Payment,2)) AS 'Stu_Payment' FROM meeting";
  else {
    $sql ="SELECT * FROM meeting WHERE Meet_ID=".$id;
    }
  $result = $mydb->query($sql);

  echo "<div class='wallpaper'>";
  echo "<table class='table table-hover' border='1'>";
  echo "<thead>";
  echo "<th>Meeting ID</th><th>Meeting Time</th><th>Meeting Location</th><th>Student Payment</th>";
  echo "</thead>";

    while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>".$row["Meet_ID"]."</td><td>".$row["Meet_Time"]."</td><td>".$row["Meet_Location"]."</td>
            <td>".$row["Stu_Payment"]."</td><td>";
      echo "</tr>";
    }
    echo "</table></div>";

  ?>
</body>
</html>
