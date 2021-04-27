<?php
session_start();

// echo "<p> Hello, ".$_SESSION["stuEmail"]."</p>";

$course1 = "";
$course1cred = "";
$course2 = "";
$course2cred = "";
$course3 = "";
$course3cred = "";
$course4 = "";
$course4cred = "";
$course5 = "";
$course5cred = "";
$course6 = "";
$course6cred = "";


$email = $_SESSION['stuEmail'];
$error = false;

if (isset($_POST["update"])) {
    if(isset($_POST["course1"])) $course1 = $_POST["course1"];
    if(isset($_POST["course1cred"])) $course1cred = $_POST["course1cred"];
    if(isset($_POST["course2"])) $course2 = $_POST["course2"];
    if(isset($_POST["course2cred"])) $course2cred = $_POST["course2cred"];
    if(isset($_POST["course3"])) $course3 = $_POST["course3"];
    if(isset($_POST["course3cred"])) $course3cred = $_POST["course3cred"];
    if(isset($_POST["course4"])) $course4 = $_POST["course4"];
    if(isset($_POST["course4cred"])) $course4cred = $_POST["course4cred"];
    if(isset($_POST["course5"])) $course5 = $_POST["course5"];
    if(isset($_POST["course5cred"])) $course5cred = $_POST["course5cred"];
    if(isset($_POST["course6"])) $course6 = $_POST["course6"];
    if(isset($_POST["course6cred"])) $course6cred = $_POST["course6cred"];

    require_once('db.php');

    $sql = "UPDATE student SET
        course_1 = '$course1', 
        course_1_credits = '$course1cred', 
        course_2 = '$course2', 
        course_2_credits = '$course2cred', 
        course_3 = '$course3', 
        course_3_credits = '$course3cred', 
        course_4 = '$course4',
        course_4_credits = '$course4cred',
        course_5 = '$course5',
        course_5_credits = '$course5cred',
        course_6 = '$course6',
        course_6_credits = '$course6cred'
        WHERE Student_Email ='$email'
        ";
        $result=$mydb->query($sql);

        Header("Location: SD_viewCourses.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Your Courses</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="Webpages.css" />
    <script src="jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="myScripts.js"></script>
</head>

<body class="container-fluid">
<?php include('navStudent.php');?>

    <div class="wallpaper">
    <h1>Edit Your Courses </h1>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">


        <label for="course1">Course 1:</label>
        <input type="text" name="course1">
        <br>
        <label for="course1cred">Course 1 Credits:</label>
        <input type="num" name="course1cred">
        <br>

        <label for="course2">Course 2:</label>
        <input type="text" name="course2">
        <br>
        <label for="course2cred">Course 2 Credits:</label>
        <input type="num" name="course2cred">
        <br>

        <label for="course3">Course 3:</label>
        <input type="text" name="course3">
        <br>
        <label for="course3cred">Course 3 Credits:</label>
        <input type="num" name="course3cred">
        <br>

        <label for="course4">Course 4:</label>
        <input type="text" name="course4">
        <br>
        <label for="course4cred">Course 4 Credits:</label>
        <input type="num" name="course4cred">
        <br>

        <label for="course5">Course 5:</label>
        <input type="text" name="course5">
        <br>
        <label for="course5cred">Course 5 Credits:</label>
        <input type="num" name="course5cred">
        <br>

        <label for="course6">Course 6:</label>
        <input type="text" name="course6">
        <br>
        <label for="course6cred">Course 6 Credits:</label>
        <input type="num" name="course6cred">
        <br>

        
        <input type="submit" name="update" value="Save Changes">
        <!-- <input type="submit" name="delete" value="Delete Profile"> -->

    </form>

    <p><a href="SD_logOut.php">Log Out</a></p>
    </div>
</body>
</html>