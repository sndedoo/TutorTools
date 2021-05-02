<?php
global $tutorNum;
global $tutorFirst;
global $tutorLast;
global $tutorGradYr;
global $tutorEmail;
global $meetTime;
global $meetLocation;
global $studentNumber;
global $meetingNumber;
global $deleteEntry;
$modifyMeeting = "";
global $deleteMeeting;
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Schedule</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="Thomas-Webpages.css" />
    <script src="jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="myScripts.js"></script>
    <meta author="Thomas Beamon">
    <meta descriptions="This page allows a student to search for a tutor that teaches the class they are looking for">
    <style>
        .orange {
            color: white;
            background-color: #8B1F41;
            text-align: center;
            border: 1px solid;
            border-color: black;
            padding: 5px;
        }

        .lightOrange {
            background-color: #E87722;
            text-align: center;
            border: 1px solid;
            border-color: black;
            padding: 5px;
        }
    </style>
    <script>
        function signUpFunction() {
            alert("You have successfully scheduled a meeting!");

        }

        function modifyFunction() {
            prompt("Enter the information you would like to modify.")
        }


        function deleteFunction() {
            alert("You have successfully deleted a meeting!");
        }
    </script>
</head>

<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">


        <nav class="navBar">

            <ul class="nav nav-pills">
                <li class="pillItem"><img src="tutoring-image1.jpg" id="companyLogo" width="100" height="65" alt="Company Logo"></li>
                <li class="pillItem"><a href="Project-Homepage.html">Homepage</a></li>
                <li class="pillItem"><a href="Thomas-Student-Service-Request.html">New Service Request</a></li>
                <li class="active pillItem"><a href="Thomas-ViewStudentSchedule.html">View My Schedule</a></li>
                <li class="pillItem"><a href="Thomas-ViewStudentProfile.html">View My Profile</a></li>
                <li class="pillItem"><a href="Thomas-EditAndBuildProfile.html">Edit/Build My Profile</a></li>
            </ul>
        </nav>
        </br>

        <?php
        echo $deleteEntry;
        if (isset($_POST["deleteMeeting"])) $deleteMeeting = $_POST["deleteMeeting"];
        session_start();
        $tutorIDSelected = $_SESSION["tutorID"];
        $classSelected = $_SESSION["classSelected"];
        echo "</br><h1>Here is the record returned from your search: </h1></br>";
        echo $tutorNum;
        require_once('db.php');
        $sql = "SELECT *
        FROM Tutor JOIN Meeting ON Tutor.Meet_ID = Meeting.Meet_ID  WHERE Tutor_Num= '$tutorIDSelected'";
        $result = $mydb->query($sql);
        echo "<table id = scheduleTable>
            <thead>
                <tr>
                    <th class='orange'>Tutor ID</th>
                    <th class='orange'>First Name</th>
                    <th class='orange'>Last Name</th>
                    <th class='orange'>Graduation Year</th>
                    <th class='orange'>Tutor_Email</th>
                    <th class='orange'>Meeting Time</th>
                    <th class='orange'>Meeting Location</th>
                    <th class='orange'>Class Requested</th>";

        while ($row = mysqli_fetch_array($result)) {
            $tutorNum = $row["Tutor_Num"];
            $tutorFirst = $row["Tutor_First"];
            $tutorLast = $row["Tutor_Last"];
            $tutorGradYr = $row["Tutor_GradYr"];
            $tutorEmail = $row["Tutor_Email"];
            $meetTime = $row["Meet_Time"];
            $meetLocation = $row["Meet_Location"];
            $studentNumber = 1;
            echo "
            <tbody>
                <tr>
                    <td class='lightOrange' name = tutorNum>" . $tutorNum . "</td>
                    <td class='lightOrange'>" . $tutorFirst . "</td>
                    <td class='lightOrange'>" . $tutorLast . "</td>
                    <td class='lightOrange'>" . $tutorGradYr . "</td>
                    <td class='lightOrange'>" . $tutorEmail . "</td>
                    <td class='lightOrange'>" . $meetTime . "</td>
                    <td class='lightOrange'>" . $meetLocation . "</td>
                    <td class='lightOrange'>" . $classSelected . "</td>";
        }
        echo "</tr></tbody></table>";

        echo $deleteMeeting;

        if (isset($_POST["add"])) {
            require_once('db.php');
            echo $studentNumber;
            $sql = "INSERT INTO userschedule(Student_Num, Tutor_Num, Tutor_First, Tutor_Last, Tutor_GradYr, Tutor_Email, Meet_Time, Meet_Location, Class_Selected)
                    VALUES ($studentNumber,'$tutorIDSelected','$tutorFirst', '$tutorLast', '$tutorGradYr', '$tutorEmail', '$meetTime', '$meetLocation','$classSelected')";
            $result = $mydb->query($sql);
        } else if (isset($POST["modify"])) {
        } else if (isset($POST["delete"])) {
            echo"</br>";
            echo $deleteMeeting;
            require_once('db.php');
            $sql = "DELETE FROM UserSchedule WHERE Schedule_Num = 2";
            $result = $mydb->query($sql);
            
        }
        ?>
        <input type="submit" name="add" value="Add Meeting" onClick="signUpFunction()">
        </br>
        </br>
        </br>

        <label>Enter the meeting number you would like to modify:
            <input name="modifyMeeting type=" text" size="30" placeholder='e.g. "1"' autofocus="" value="<?php echo $modifyMeeting; ?>">
        </label>
        <input type="submit" name="modify" value="Modify Meeting" onClick="modifyFunction()">
        <br>

        <label id="tutorLabel">Enter the meeting number you would like to delete:
            <input name="deleteMeeting" type="text" size="30" placeholder='e.g. "2"' autofocus="" value="<?php echo $deleteMeeting; ?>">
        </label>
        <input type="submit" name="delete" value="Delete Meeting" onClick="deleteFunction()">

        </br>
    </form>

    <?php
    echo "<h1>Here is your current schedule:</h1></br>";
    require_once('db.php');
    $sql = "SELECT * FROM UserSchedule";
    $result = $mydb->query($sql);

    echo "<table id = scheduleTable>
    <thead>
        <tr>
            <th class='orange'>Meeting Number</th>
            <th class='orange'>Tutor ID</th>
            <th class='orange'>First Name</th>
            <th class='orange'>Last Name</th>
            <th class='orange'>Graduation Year</th>
            <th class='orange'>Tutor_Email</th>
            <th class='orange'>Meeting Time</th>
            <th class='orange'>Meeting Location</th>
            <th class='orange'>Class Requested</th>";

    while ($row = mysqli_fetch_array($result)) {
        $meetingNumber = $row["Schedule_Num"];
        $tutorNum = $row["Tutor_Num"];
        $tutorFirst = $row["Tutor_First"];
        $tutorLast = $row["Tutor_Last"];
        $tutorGradYr = $row["Tutor_GradYr"];
        $tutorEmail = $row["Tutor_Email"];
        $meetTime = $row["Meet_Time"];
        $meetLocation = $row["Meet_Location"];
        echo "
    <tbody>
        <tr>
            <td class='lightOrange' id = meetingNumber>" . $meetingNumber . "</td>
            <td class='lightOrange' name = tutorNum>" . $tutorNum . "</td>
            <td class='lightOrange'>" . $tutorFirst . "</td>
            <td class='lightOrange'>" . $tutorLast . "</td>
            <td class='lightOrange'>" . $tutorGradYr . "</td>
            <td class='lightOrange'>" . $tutorEmail . "</td>
            <td class='lightOrange'>" . $meetTime . "</td>
            <td class='lightOrange'>" . $meetLocation . "</td>
            <td class='lightOrange'>" . $classSelected . "</td>";
    }
    echo "</tr></tbody></table>";

   
    ?>
</body>

</html>