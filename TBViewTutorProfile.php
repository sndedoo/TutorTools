<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign up profile page</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="Thomas-Webpages.css" />
    <script src="jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="myScripts.js"></script>
    <meta author="Thomas Beamon">
    <meta descriptions="This page allows a student to search for a tutor that teaches the class they are looking for">

    <script>
        function my_function(test) {
            var request = new XMLHttpRequest();
            request.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    alert(this.responseText);
                }
            };
            request.open("GET", "TBViewStudentServiceRequest.php?test", true);
            request.send();
        }
    </script>
</head>

<body>
    <nav class="navBar">

        <ul class="nav nav-pills">
            <li class="pillItem"><img src="tutoring-image1.jpg" id="companyLogo" width="100" height="65" alt="Company Logo"></li>
            <li class="pillItem"><a href="Thomas-Project-Homepage.html">Homepage</a></li>
            <li class="pillItem"><a href="Thomas-Student-Service-Request.html">New Service Request</a></li>
            <li class="pillItem"><a href="Thomas-ViewStudentSchedule.html">View My Schedule</a></li>
            <li class="active pillItem"><a href="Thomas-ViewStudentProfile.html">View My Profile</a></li>
            <li class="pillItem"><a href="Thomas-EditAndBuildProfile.html">Edit/Build My Profile</a></li>
        </ul>
    </nav>

    <!--Insert connection to student profile picture here-->
    <img src="" class="profilePicture" width="125" height="125" alt="Student Profile Picture">

    <?php
    if (isset($_POST["signUpButton1"])) {
        if (isset($_POST["selectedTable"])) $selectedTable = $_POST["selectedTable"];

        echo $selectedTable;
    }
    ?>

</body>