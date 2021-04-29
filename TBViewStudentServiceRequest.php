<?php

//initializes the variables
$classSelected = "";
$tutorFirstNameSelected = "";
$tutorLastNameSelected = "";
$selection = array();
$selection1Made = "1";
$selection2Made = "2";
$selection3Made = "3";
?>

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

    </script>

</head>

<body>

    <!--Creates action when submit button is clicked-->
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <nav class="navBar">

            <ul class="nav nav-pills">
                <li class="pillItem"><img src="Image/Tutor Tools Logo.png" id="companyLogo" width="100" height="65" alt="Company Logo"></li>
                <li class="pillItem"><a href="Project-Homepage.html">Homepage</a></li>
                <li class="active pillItem"><a href="#">New Service Request</a></li>
                <li class="pillItem"><a href="Thomas-ViewStudentSchedule.html">View My Schedule</a></li>
                <li class="pillItem"><a href="Thomas-ViewStudentProfile.html">View My Profile</a></li>
                <li class="pillItem"><a href="Thomas-EditAndBuildProfile.html">Edit/Build My Profile</a></li>
            </ul>
        </nav>

        <!--Search bar for a specific class-->
        <label id="classLabel">Search for class:
            <input name="classSelected" type="text" size="30" placeholder='e.g. "BIT 4444"' autofocus="" value="<?php echo $classSelected; ?>">
        </label>

        </br>

        <!--Search bar for a specific tutor firstname-->
        <label id="tutorFirstNameLabel">Search for tutor first name:
            <input name="tutorFirstNameSelected" type="text" size="30" placeholder='e.g. "Cam"' autofocus="" value="<?php echo $tutorFirstNameSelected; ?>">
        </label>

        </br>

        <!--Search bar for a specific tutor Lastname-->
        <label id="tutorLabel">Search for tutor last name:
            <input name="tutorLastNameSelected" type="text" size="30" placeholder='e.g. "Combs"' autofocus="" value="<?php echo $tutorLastNameSelected; ?>">
        </label>

        </br>

        <input type="submit" name="submit" value="Submit" />


    </form>

    </br>

    <?php

    //sets variables using post method after submit button is clicked
    if (isset($_POST["submit"])) {
        if (isset($_POST["classSelected"])) $classSelected = $_POST["classSelected"];
        if (isset($_POST["tutorFirstNameSelected"])) $tutorFirstNameSelected = $_POST["tutorFirstNameSelected"];
        if (isset($_POST["tutorLastNameSelected"])) $tutorLastNameSelected = $_POST["tutorLastNameSelected"];
        if (isset($_POST["SignUpButton1"])) $selection1Made = $_POST["SignUpButton1"];
        if (isset($_POST["SignUpButton2"])) $selection2Made = $_POST["SignUpButton2"];
        if (isset($_POST["SignUpButton3"])) $selection3Made = $_POST["SignUpButton3"];

        require_once("db.php");
        $count = 0;

        //pulls relevant information from the database
        $sql = "SELECT Tutor_First, Tutor_Last, Tutor_GradYr, Tutor_Email, Tutor_Class1, Tutor_Class2, Tutor_Class3, Tutor_Class4, Meeting.Meet_Time, Meeting.Meet_Location FROM Tutor JOIN Meeting ON Tutor.Meet_ID = Meeting.Meet_ID WHERE Tutor_Class1= '$classSelected' OR Tutor_Class2= '$classSelected'OR Tutor_Class3= '$classSelected'OR Tutor_Class4= '$classSelected'OR Tutor_First= '$tutorFirstNameSelected'OR Tutor_Last= '$tutorLastNameSelected'";
        $result = $mydb->query($sql);

        //allows user to search by class name
        while ($row = mysqli_fetch_array($result)) {
        }
        $result = $mydb->query($sql);
        if ($classSelected != "" && ($classSelected == $row["Tutor_Class1"] || $classSelected == $row["Tutor_Class2"] || $classSelected == $row["Tutor_Class3"] || $classSelected == $row["Tutor_Class4"] || $classSelected == $row["Tutor_Class4"] || $tutorFirstNameSelected == $row["Tutor_First"] || $tutorLastNameSelected == $row["Tutor_Last"])) {
            $sql = "SELECT Tutor_First, Tutor_Last, Tutor_GradYr, Tutor_Email FROM Tutor WHERE Tutor_Class1= '$classSelected' OR Tutor_Class2= '$classSelected'OR Tutor_Class3= '$classSelected'OR Tutor_Class4= '$classSelected'OR Tutor_First= '$tutorFirstNameSelected'OR Tutor_Last= '$tutorLastNameSelected'";

            $selection = array();
            while ($row = mysqli_fetch_array($result)) {
                echo $selection[] = "<table><thead> <tr><th class='orange'>First Name</th><th class='orange'>Last Name</th><th class='orange'>Graduation Year</th><th class='orange'>Tutor_Email</th><th class='orange'>Meeting Time</th><th class='orange'>Meeting Location</th><th class='orange'>Class Requested</th><th class='orange'>Sign Up</th></tr></thead><tbody><tr class = returnedRow id = $count><td class='lightOrange'>" . $row["Tutor_First"] . "</td><td class='lightOrange'>" . $row["Tutor_Last"] . "</td><td class='lightOrange'>" . $row["Tutor_GradYr"] . "</td><td class= 'lightOrange'>" . $row["Tutor_Email"] . "</td><td class= 'lightOrange'>" . $row["Meet_Time"] . "</td><td class= 'lightOrange'>" . $row["Meet_Location"] . "</td><td class= 'lightOrange'>" . $classSelected . "</td><td class= 'lightOrange'><a href = 'TBViewTutorProfile.php'><button name = SignUpButton1>Sign Up</button></td></tr></tbody></table>";

                //stores all tutors that teach the selected class into an array
                echo "</br>";
                echo $selection[$count];

                $count++;
                echo "</br>";
            }
            
            //allows user to search by first name
        } else {
            $result = $mydb->query($sql);
            if ($tutorFirstNameSelected != "") {
                if ($selection2Made != "") {
                    while ($row = mysqli_fetch_array($result)) {
                        echo $selection2Made = "<table><thead> <tr><th class='orange'>First Name</th><th class='orange'>Last Name</th><th class='orange'>Graduation Year</th><th class='orange'>Tutor_Email</th><th class='orange'>Class 1</th><th class='orange'>Class 2</th><th class='orange'>Class 3</th><th class='orange'>Class 4</th><th class='orange'>Meeting Time</th><th class='orange'>Meeting Location</th><th class='orange'>Sign Up</th></tr></thead><tbody><tr class = returnedRow id = $count><td class='lightOrange'>" . $tutorFirstNameSelected . "</td><td class='lightOrange'>" . $row["Tutor_Last"] . "</td><td class='lightOrange'>" . $row["Tutor_GradYr"] . "</td><td class= 'lightOrange'>" . $row["Tutor_Email"] . "</td><td class='lightOrange'>" . $row["Tutor_Class1"] . "</td><td class='lightOrange'>" . $row["Tutor_Class2"] . "</td><td class='lightOrange'>" . $row["Tutor_Class3"] . "</td><td class='lightOrange'>" . $row["Tutor_Class4"] . "</td><td class= 'lightOrange'>" . $row["Meet_Time"] . "</td><td class= 'lightOrange'>" . $row["Meet_Location"] . "</td><td class= 'lightOrange'><a><button name = SignUpButton2>Sign Up</button></td></tr></tbody></table>";
                        $count++;
                        echo "</br>";
                    }
                }
                echo $selection2Made;

                //allows user to search by last name
            } else {
                if ($selection3Made != "") {

                    while ($row = mysqli_fetch_array($result)) {
                        echo $selection3Made = "<table><thead> <tr><th class='orange'>First Name</th><th class='orange'>Last Name</th><th class='orange'>Graduation Year</th><th class='orange'>Tutor_Email</th><th class='orange'>Class 1</th><th class='orange'>Class 2</th><th class='orange'>Class 3</th><th class='orange'>Class 4</th><th class='orange'>Meeting Time</th><th class='orange'>Meeting Location</th><th class='orange'>Sign Up</th></tr></thead><tbody><tr class = returnedRow id = $count><td class='lightOrange'>" . $row["Tutor_First"] . "</td><td class='lightOrange'>" . $tutorLastNameSelected . "</td><td class='lightOrange'>" . $row["Tutor_GradYr"] . "</td><td class= 'lightOrange'>" . $row["Tutor_Email"] . "</td><td class='lightOrange'>" . $row["Tutor_Class1"] . "</td><td class='lightOrange'>" . $row["Tutor_Class2"] . "</td><td class='lightOrange'>" . $row["Tutor_Class3"] . "</td><td class='lightOrange'>" . $row["Tutor_Class4"] . "</td><td class= 'lightOrange'>" . $row["Meet_Time"] . "</td><td class= 'lightOrange'>" . $row["Meet_Location"] . "</td><td class= 'lightOrange'><a><button name = SignUpButton3>Sign Up</button></td></tr></tbody></table>";
                        $count++;
                    }
                    echo "</br>";
                }
                echo $selection3Made;
            }
        }
    }
    ?>


</body>

</html>