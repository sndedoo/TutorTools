<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Service Request</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="Thomas-Webpages.css" />
    <script src="jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="myScripts.js"></script>
    <meta author="Thomas Beamon">
    <meta descriptions="This page allows a student to search for a tutor that teaches the class they are looking for">

</head>

<body>
    <nav class="navBar">

        <ul class="nav nav-pills">
            <li class="pillItem"><img src="tutoring-image1.jpg" id="companyLogo" width="100" height="65" alt="Company Logo"></li>
            <li class="pillItem"><a href="Project-Homepage.html">Homepage</a></li>
            <li class="active pillItem"><a href="#">New Service Request</a></li>
            <li class="pillItem"><a href="Thomas-ViewStudentSchedule.html">View My Schedule</a></li>
            <li class="pillItem"><a href="Thomas-ViewStudentProfile.html">View My Profile</a></li>
            <li class="pillItem"><a href="Thomas-EditAndBuildProfile.html">Edit/Build My Profile</a></li>
        </ul>
    </nav>

    <!--Student can select what class they are looking for-->
    <nav class="navBar">
        <ul class="nav nav-pills nav-fill">
            <li class="nav-item">
                <a class="nav-link" href="#">Class 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Class 2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Class 3</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Class 4</a>
            </li>
        </ul>
    </nav>

    <div class="tutorInformation">
        <!--Insert connection to Tutor profile picture here-->
        <img src="tutoring-image2.jpg" id="profilePicture" width="200" height="200" alt="Student Profile Picture">
    </div>

    <!--Sign up table for students to sign up for a time slot with tutors-->
    <div class="signUpTable">
        <!--Will need to create a loop to assign id values because they will eventually differ in length-->
        <table>
            <th colspan="2">
                Available Tutor Times
            </th>
            <tr>
                <td>
                    Available Time 1
                </td>
                <td>
                    <button onClick="signUp(this.id)" class="signUpButton" id="1">Sign Up</button>
                </td>
            </tr>
            <tr>
                <td>
                    Available Time 2
                </td>
                <td>
                    <button onClick="signUp(this.id)" class="signUpButton" id="2">Sign Up</button>
                </td>
            </tr>
            <tr>
                <td>
                    Available Time 3
                </td>
                <td>
                    <button onClick="signUp(this.id)" class="signUpButton" id="3">Sign Up</button>
                </td>
            </tr>
            <tr>
                <td>
                    Available Time 4
                </td>
                <td>
                    <button onClick="signUp(this.id)" class="signUpButton" id="4">Sign Up</button>
                </td>
            </tr>
        </table>
    </div>

    <!--Rate for particular class-->
    <div class="rate">
        <p>This is where the rate will go</p>

    </div class="basicInformation">
    <!--View Tutor Name-->
    <p>Here is where the tutor name will go when we link it to the database</P>
    <!--Insert Connection to tutor bio-->
    <p id="tutorBio">Here is where we will link the tutor's bio</p>
    <div>
        <ul class="TutorRatings">
            <li>Overall Rating:
                <input name="TutorRating" type="range" min="0" max="10" step="1" value="">
            </li>
            <li>Attitude Rating:
                <input name="TutorRating" type="range" min="0" max="10" step="1" value="">
            </li>
            <li>Explaination Rating:
                <input name="TutorRating" type="range" min="0" max="10" step="1" value="">
            </li>
            <li>Helpfulness rating
                <input name="TutorRating" type="range" min="0" max="10" step="1" value="">
            </li>
        </ul>
    </div>
    <button id="emailTutor"><a href="mailto:tbeamon@vt.edu?subject=Are you available?&body=Hello I was inquiring about a tutoring sesssion at *Specific Time* and am wondering if we could meet.">Here is where the tutor's email will be displayed:</a></button>
    <div class="Copyright">Copyright of TutorTools &copy;</div>
</body>