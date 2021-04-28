<?php
session_start();

// echo "<p> Hello, ".$_SESSION["stuEmail"]."</p>";

$fName = "";
$lName = "";
$about = "";
$phone = "";
// $mailAddy = "";
$city = "";
$state = "";
// $zip = "";
// $birthday = "";
// $zip = "";
// $gradYear ="";
$birthday = "";
$gender = "";

$email = $_SESSION['email'];
$error = false;

if (isset($_POST["update"])) {
    if(isset($_POST["fName"])) $fName = $_POST["fName"];
    if(isset($_POST["lName"])) $lName = $_POST["lName"];
    if(isset($_POST["about"])) $about = $_POST["about"];
    if(isset($_POST["phone"])) $phone = $_POST["phone"];
    if(isset($_POST["mailAddy"])) $mailAddy = $_POST["mailAddy"];
    if(isset($_POST["city"])) $city = $_POST["city"];
    if(isset($_POST["state"])) $state = $_POST["state"];
    if(isset($_POST["zip"])) $zip = $_POST["zip"];
    if(isset($_POST["gradYear"])) $gradYear = $_POST["gradYear"];
    if(isset($_POST["birthday"])) $birthday = $_POST["birthday"];
    if(isset($_POST["gender"])) $gender = $_POST["gender"];

    require_once('db.php');

    $sql = "UPDATE tutor SET
        Tutor_First = '$fName', 
        Tutor_Last = '$lName', 
        bio = '$about', 
        phone = '$phone', 
        Tutor_City = '$city', 
        Tutor_State = '$state',
        -- zip = '$zip',
        -- Student_GradYr = '$gradYear',
        -- birthday = '$birthday',
        gender = '$gender'
        WHERE Tutor_Email ='$email'
        ";
        $result=$mydb->query($sql);

        Header("Location: SD_tutorViewProfile.php");
} elseif (isset($_POST["delete"])) {

    require_once('db.php');

    $sql = "DELETE FROM tutor WHERE Tutor_Email ='$email'
        ";
        $result=$mydb->query($sql);
        Header("Location: SD_createProfile.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="Webpages.css" />
    <script src="jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="myScripts.js"></script>
</head>

<body class="container-fluid">
<?php include('navTutor.php');?>

    <div class="wallpaper">
    <h1>Edit Your Profile </h1>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">

        <!-- <br/>
        <label for="photo">Upload Photo:</label>
        <input type="file" id="photo" name="photo"> -->

        <br>

        <label for="fName">First name:</label>
        <input type="text" name="fName" id="fName" placeholder="First Name" size="25" value="<?php if(empty($fName)) echo $fName; ?>"> 
        <br/>

        <label for="lName">Last name:</label>
        <input type="text" name="lName" id="lName" placeholder="Last name" size="25" value="<?php if(empty($lName)) echo $lName; ?>"> 
        <br/>

        <label for="about">About Me</label>
        <textarea id="about" name="about"
        rows="5" cols="33"><?php if(!empty($about)) echo $about; ?></textarea>
        
        <br>

        <label for="phone">Phone Number:</label>
        <input type="tel" name="phone" id="phone" placeholder="Phone Number" value="<?php if(empty($phone)) echo $phone;?>">

        
        <br/>

        <label for="city">city:</label>
        <input type="text" name="city" placeholder="city " id="city" value="<?php if(empty($city)) echo $city;?>">

        <br/>

        <label for="state">State:</label>
        <select name="state" id="state">
            <option value="VA" selected>
                Virginia
            </option>
            <option value="VA">
                Maryland
            </option>
            <option value="VA">
                DC
            </option>
        </select>

        <br>


        <p>Please select your gender:</p>
        <input type="radio" id="male" name="gender" value="male">
            <label for="male">Male</label><br>
        <input type="radio" id="female" name="gender" value="female">
            <label for="female">Female</label><br>
        <input type="radio" id="other" name="gender" value="other">
            <label for="other">Other</label>

        <br>
        <br>

        <input type="submit" name="update" value="Save Changes">
        <input type="submit" name="delete" value="Delete Profile">

    </form>

    <p><a href="SD_logOut.php">Log Out</a></p>
    </div>
</body>
</html>