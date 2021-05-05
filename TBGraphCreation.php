<!doctype html>
<html>
<head>
  <title> Php Ajax</title>
</head>
<body>
  <?php
    $id = 0;
    if(isset($_GET['id'])) $id=$_GET['id'];

    require_once("db.php");

    $sql="SELECT Tutor_First FROM tutor WHERE Tutor_First=".$id;
    $result = $mydb->query($sql);

    if($row=mysqli_fetch_array($result)){
      echo "Your tutor name is ".$row["Tutor_First"];
    } else {
      echo "Your tutor name cannot be found.";
    }

  ?>
</body>
</html>
