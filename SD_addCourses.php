<?php
session_start();

// echo "<p> Hello, ".$_SESSION["stuEmail"]."</p>";

$course1 = "";
$course2 = "";
$course3 = "";
$course4 = "";
$course5 = "";
$course6 = "";
$error = false;


$email = $_SESSION['stuEmail'];
// $error = false;

if (isset($_POST["add"])) {
    if(isset($_POST["course1"])) $course1 = $_POST["course1"];
    if(isset($_POST["course2"])) $course2 = $_POST["course2"];
    if(isset($_POST["course3"])) $course3 = $_POST["course3"];
    if(isset($_POST["course4"])) $course4 = $_POST["course4"];
    if(isset($_POST["course5"])) $course5 = $_POST["course5"];
    if(isset($_POST["course6"])) $course6 = $_POST["course6"];

    require_once('db.php');
            try{

            $sql = "INSERT INTO enrollment (CourseID, Student_Email) values 
            ('".$course1."', '".$email."')
            ";
            $result=$mydb->query($sql);
    
            $sql = "INSERT INTO enrollment (CourseID, Student_Email) values 
            ('$course2', '$email')
            ";
            $result=$mydb->query($sql);
    
            $sql = "INSERT INTO enrollment (CourseID, Student_Email) values 
            ('$course3', '$email')
            ";
            $result=$mydb->query($sql);
    
            $sql = "INSERT INTO enrollment (CourseID, Student_Email) values 
            ('$course4', '$email')
            ";
            $result=$mydb->query($sql);
    
            $sql = "INSERT INTO enrollment (CourseID, Student_Email) values 
            ('$course5', '$email')
            ";
            $result=$mydb->query($sql);
    
            $sql = "INSERT INTO enrollment (CourseID, Student_Email) values 
            ('$course6', '$email')
            ";
            $result=$mydb->query($sql);
    
            } catch (Exception $e){
                $error = true;
            } 
            // echo $error;
        if (!$error) {
        Header("Location: SD_viewCourses.php");
        } else {
            echo 'Duplicate entry detected. Try again!';
        }

} elseif (isset($_POST["delete"])) {
    if(isset($_POST["course1"])) $course1 = $_POST["course1"];
    if(isset($_POST["course2"])) $course2 = $_POST["course2"];
    if(isset($_POST["course3"])) $course3 = $_POST["course3"];
    if(isset($_POST["course4"])) $course4 = $_POST["course4"];
    if(isset($_POST["course5"])) $course5 = $_POST["course5"];
    if(isset($_POST["course6"])) $course6 = $_POST["course6"];

    require_once('db.php');

    // $sql = "UPDATE enrollment SET
    //     course_1 = '$course1', 
    //     course_2 = '$course2',  
    //     course_3 = '$course3',
    //     course_4 = '$course4',
    //     course_5 = '$course5',
    //     course_6 = '$course6',
    //     WHERE Student_Email ='$email'
    //     ";
        $result=$mydb->query($sql);

        Header("Location: SD_viewCourses.php");

        
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Your Courses</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="Webpages.css" />
    <script src="jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="myScripts.js"></script>
</head>

<body class="container-fluid">
<?php include('navStudent.php');

require_once("db.php");
$sql = "SELECT * FROM Courses";
$result = $mydb->query($sql);
?>

<div class="wallpaper">
<h1>Add Your Courses </h1>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">

    <label for="course1">Course: </label>
    <select name="course1">
        <?php
        require_once("db.php");
        $sql = "SELECT * FROM Courses";
        $result = $mydb->query($sql);
        while($row = mysqli_fetch_array($result)){
        echo "<option value='".$row["CourseID"]."'>".$row["courseName"]."</option>";
        }
        ?>
    </select>

    <br>
    <label for="course2">Course: </label>
    <select name="course2">
        <?php
        require_once("db.php");
        $sql = "SELECT * FROM Courses";
        $result = $mydb->query($sql);
        while($row = mysqli_fetch_array($result)){
        echo "<option value='".$row["CourseID"]."'>".$row["courseName"]."</option>";
        }
        ?>
    </select>

    <br>
    <label for="course3">Course: </label>
    <select name="course3">
        <?php
        require_once("db.php");
        $sql = "SELECT * FROM Courses";
        $result = $mydb->query($sql);
        while($row = mysqli_fetch_array($result)){
        echo "<option value='".$row["CourseID"]."'>".$row["courseName"]."</option>";
        }
        ?>
    </select>

    <br>
    <label for="course4">Course: </label>
    <select name="course4">
        <?php
        require_once("db.php");
        $sql = "SELECT * FROM Courses";
        $result = $mydb->query($sql);
        while($row = mysqli_fetch_array($result)){
        echo "<option value='".$row["CourseID"]."'>".$row["courseName"]."</option>";
        }
        ?>
    </select>

    <br>
    <label for="course5">Course: </label>
    <select name="course5">
        <?php
        require_once("db.php");
        $sql = "SELECT * FROM Courses";
        $result = $mydb->query($sql);
        while($row = mysqli_fetch_array($result)){
        echo "<option value='".$row["CourseID"]."'>".$row["courseName"]."</option>";
        }
        ?>
    </select>

    <br>
    <label for="course6">Course: </label>
    <select name="course6">
        <?php
        require_once("db.php");
        $sql = "SELECT * FROM Courses";
        $result = $mydb->query($sql);
        while($row = mysqli_fetch_array($result)){
        echo "<option value='".$row["CourseID"]."'>".$row["courseName"]."</option>";
        }
        ?>
    </select>
    <br>
     <br>

    

        
        <input type="submit" name="add" value="Add Courses">
        <!-- <input type="submit" name="delete" value="Delete Course"> -->

    </form>

    <p><a href="SD_logOut.php">Log Out</a></p>
    </div>
</body>
</html>