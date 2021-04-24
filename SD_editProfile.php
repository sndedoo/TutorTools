<?php
session_start();

echo "<p> Hello, ".$_SESSION["stuEmail"]."</p>";

$fName = "";
$lName = "";
$about = "";
$phone = "";
$mailAddy = "";
$city = "";
$state = "";
$zip = "";
$birthday = "";
$zip = "";
$birthday = "";
$gender = "";

$studentNum = "";
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
    if(isset($_POST["birthday"])) $birthday = $_POST["birthday"];
    if(isset($_POST["gender"])) $gender = $_POST["gender"];

    if(isset($_POST["studentNum"])) $studentNum = $_POST["studentNum"];

    require_once('db.php');

    $sql = "UPDATE student SET
        Student_First = '$fName', 
        Student_Last = '$lName', 
        About_Me = '$about', 
        Phone = '$phone', 
        Street_Address = '$mailAddy', 
        City = '$city', 
        State = '$state',
        zip = '$zip',
        birthday = '$birthday'
        gender = '$gender'
        WHERE Student_Num = '$studentNum'";
        $result=$mydb->query($sql);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Your Profile</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="Webpages.css" />
    <script src="jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="myScripts.js"></script>
    <script>
    </script>
</head>

<body class="container-fluid">
<div id="navStudent">
    <nav class="navBar">
        <ul class="nav nav-pills">
            <li class="pillItem"><a href="Project-Homepage.html">Home</a></li>
            <li  role="presentation" class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Meetings<span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="/TBStudentServiceRequest.html">Schedule Meeting</a></li>
                    <li><a href="/TBViewStudentSchedule.html">View Student Schedule</a></li>
                    <li><a href="/SD_profileSearch.html">Search By Major</a></li>
                </ul>
            </li>
            <li role="presentation" class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"
                role="button" aria-haspopup="true" aria-expanded="false">Review<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="AM_CreateReview.html">Create A Review</a></li>
                    <li><a href="AM_MyReviews.html">My Reviews</a></li>
                    <li><a href="AM_ReviewList.html">Tutor Reviews</a></li>
                </ul>   
            </li>
            <li class="pillItem"><a href="ViewStudentSchedule.html">View My Schedule</a></li>
            <li role="presentation" class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Issues<span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="KG_createIssue.php">Report a Problem</a></li>
                    <li><a href="KG _viewIssues.html">View My Issues</a></li>
                    

                </ul>
            </li>
            </ul>
            </nav>
</div>

    <div class="wallpaper">
    <h1>Edit Your Profile </h1>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">

        <br/>
        <label for="photo">Upload Photo:</label>
        <input type="file" id="photo" name="photo">

        <br>

        <label for="fName">First name:</label>
        <input type="text" name="fName" id="fName" placeholder="First Name" size="25" value="<?php if(empty($fName)) echo $fName; ?>"> 
        <br/>

        <label for="lName">Last name:</label>
        <input type="text" name="lName" id="lName" placeholder="Last name" size="25" value="<?php if(empty($lName)) echo $lName; ?>"> 
        <br/>

        <label for="about">About Me</label>
        <textarea id="about" name="about"
        rows="5" cols="33"><?php if(empty($about)) echo $about; ?></textarea>
        
        <br>

        <label for="phone">Phone Number:</label>
        <input type="tel" name="phone" id="phone" placeholder="Phone Number" value="<?php if(empty($phone)) echo $phone;?>">

        <br/>

        <label for="mailAddy">Mailing Address:</label>
        <input type="text" name="mailAddy" id="mailAddy" placeholder="Mailing Address" value="<?php if(empty($mailAddy)) echo $mailAddy;?>">

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

        <Label for="zip">ZIP Code</Label>
        <input type="text" name="zip" id="zip" pattern="[0-9]{5}" title="Five digit zip code" value="<?php if(empty($zip)) echo $zip;?>">

        <br>

        <label for="birthday">Graduation Year:</label>
        <select name="birthday" id="birthday">
            <option value="" selected> </option>  
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
        </select>

        <br>

        <label for="birthday">Birthday:</label>
        <input type="date" id="birthday" name="birthday" value="<?php if(empty($birthday)) echo $birthday;?>">
        <br>

        <p>Please select your gender:</p>
        <input type="radio" id="male" name="gender" value="male">
            <label for="male">Male</label><br>
        <input type="radio" id="female" name="gender" value="female">
            <label for="female">Female</label><br>
        <input type="radio" id="other" name="gender" value="other">
            <label for="other">Other</label>

        <br>
        Enter Your Student ID to Verify:
            <input type="number" id="studentNum" name="studentNum" value="<?php if(empty($studentNum)) echo $studentNum;?>">
        <br>

        <input type="submit" name="update" value="Save Changes">
        <input type="submit" name="delete" value="Delete Profile">

    </form>

    <p><a href="SD_logOut.php">Log Out</a></p>
    </div>
</body>
</html>