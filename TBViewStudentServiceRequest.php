<?php
//initializes the variables
$classSelected = "";
$tutorFirstNameSelected = "";
$tutorLastNameSelected = "";
$tutorNumberSelected = "";
$selection1Made = "1";
$selection2Made = "2";
$selection3Made = "3";
$selection = array();
$tutorID = "";
$tutorSelected = "";
$classSelected = "";
$error = false;
$loginOK = null;
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search for tutors or class</title>
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

        .errlabel{
            color: red;
            font-weight: bolder;
        }
    </style>
    <script>

    </script>
</head>

<body>

    <!--Creates action when submit button is clicked-->
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

        </br>
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
        <h2>Search for a class here:</h2>
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

        </br>

    </form>

    </br>

    <?php

    //sets variables using post method after submit button is clicked
    if (isset($_POST["submit"])) {
        if (isset($_POST["classSelected"])) $classSelected = $_POST["classSelected"];
        if (isset($_POST["tutorFirstNameSelected"])) $tutorFirstNameSelected = $_POST["tutorFirstNameSelected"];
        if (isset($_POST["tutorLastNameSelected"])) $tutorLastNameSelected = $_POST["tutorLastNameSelected"];
        if (isset($_POST["tableSelected"])) $tableSelected = $_POST["tableSelected"];

        require_once("db.php");
        $count = 0;

        //pulls relevant information from the database
        $sql = "SELECT Tutor_Num, Tutor_First, Tutor_Last, Tutor_GradYr, Tutor_Email, Tutor_Class1, Tutor_Class2, Tutor_Class3, 
        Tutor_Class4, Meeting.Meet_Time, Meeting.Meet_Location FROM Tutor JOIN Meeting ON Tutor.Meet_ID = Meeting.Meet_ID 
        WHERE Tutor_Class1= '$classSelected' OR Tutor_Class2= '$classSelected'OR Tutor_Class3= '$classSelected'OR 
        Tutor_Class4= '$classSelected'OR Tutor_First= '$tutorFirstNameSelected'OR Tutor_Last= '$tutorLastNameSelected'";

        $result = $mydb->query($sql);


        //allows user to search by class name
        while ($row = mysqli_fetch_array($result)) {
        }
        $result = $mydb->query($sql);

        if ($classSelected != "" && ($classSelected == $row["Tutor_Class1"] || $classSelected == $row["Tutor_Class2"] || $classSelected == $row["Tutor_Class3"] || $classSelected == $row["Tutor_Class4"] || $classSelected == $row["Tutor_Class4"] || $tutorFirstNameSelected == $row["Tutor_First"] || $tutorLastNameSelected == $row["Tutor_Last"])) {
            $sql = "SELECT Tutor_Num, Tutor_First, Tutor_Last, Tutor_GradYr, Tutor_Email FROM Tutor 
            WHERE Tutor_Class1= '$classSelected' OR Tutor_Class2= '$classSelected'OR 
            Tutor_Class3= '$classSelected'OR Tutor_Class4= '$classSelected'OR Tutor_First= '$tutorFirstNameSelected'
            OR Tutor_Last= '$tutorLastNameSelected'";


            echo "<table name = tableSelected id = $count><thead><tr>
                <th class='orange'>Tutor ID</th>
                <th class='orange'>First Name</th>
                <th class='orange'>Last Name</th>
                <th class='orange'>Graduation Year</th>
                <th class='orange'>Tutor_Email</th>
                <th class='orange'>Meeting Time</th>
                <th class='orange'>Meeting Location</th>
                <th class='orange'>Class Requested</th>";

            while ($row = mysqli_fetch_array($result)) {
                $tutorNumberSelected = $row["Tutor_Num"];


                echo $selection[] = "<tbody><tr class = selectedRow name = classSearch id = $count value = $count>
                <td class='lightOrange' name = tutorNumber id = $tutorNumberSelected>" . $tutorNumberSelected . "</td>
                <td class='lightOrange'>" . $row["Tutor_First"] . "</td>
                <td class='lightOrange'>" . $row["Tutor_Last"] . "</td>
                <td class='lightOrange'>" . $row["Tutor_GradYr"] . "</td>
                <td class='lightOrange'>" . $row["Tutor_Email"] . "</td>
                <td class='lightOrange'>" . $row["Meet_Time"] . "</td>
                <td class='lightOrange'>" . $row["Meet_Location"] . "</td>
                <td class='lightOrange'>" . $classSelected . "</td>";


                //stores all tutors that teach the selected class into an array
            }
            echo "</tr></tbody></table>";
            //allows user to search by first name
        } else {
            $result = $mydb->query($sql);
            if ($tutorFirstNameSelected != "") {
                if ($selection2Made != "") {
                    while ($row = mysqli_fetch_array($result)) {

                        $tutorNumberSelected = $row["Tutor_Num"];

                        echo $selection[] = "<table><thead><tr> 
                        <th class='orange'>Tutor ID</th>                      
                        <th class='orange'>First Name</th>                       
                        <th class='orange'>Last Name</th>
                        <th class='orange'>Graduation Year</th>
                        <th class='orange'>Tutor_Email</th>
                        <th class='orange'>Class 1</th>
                        <th class='orange'>Class 2</th>
                        <th class='orange'>Class 3</th>
                        <th class='orange'>Class 4</th>
                        <th class='orange'>Meeting Time</th>
                        <th class='orange'>Meeting Location</th>
                        

                        </tr></thead><tbody><tr class = returnedRow id = $count>
                        <td class='lightOrange' name = tutorNumber id = $tutorNumberSelected>" . $tutorNumberSelected . "</td>
                        <td class='lightOrange'>" . $tutorFirstNameSelected . "</td>
                        <td class='lightOrange'>" . $row["Tutor_Last"] . "</td>
                        <td class='lightOrange'>" . $row["Tutor_GradYr"] . "</td>
                        <td class='lightOrange'>" . $row["Tutor_Email"] . "</td>
                        <td class='lightOrange'>" . $row["Tutor_Class1"] . "</td>
                        <td class='lightOrange'>" . $row["Tutor_Class2"] . "</td>
                        <td class='lightOrange'>" . $row["Tutor_Class3"] . "</td>
                        <td class='lightOrange'>" . $row["Tutor_Class4"] . "</td>
                        <td class='lightOrange'>" . $row["Meet_Time"] . "</td>
                        <td class='lightOrange'>" . $row["Meet_Location"] . "</td>
                        
                        </tr></tbody></table>";

                        echo "</br>";

                        $count++;
                    }
                }


                //allows user to search by last name
            } else {
                if ($selection3Made != "") {

                    while ($row = mysqli_fetch_array($result)) {

                        $tutorNumberSelected = $row["Tutor_Num"];

                        echo $selection[] = "<table><thead><tr>
                        <th class='orange'>Tutor ID</th> 
                        <th class='orange'>First Name</th>                       
                        <th class='orange'>Last Name</th>
                        <th class='orange'>Graduation Year</th>
                        <th class='orange'>Tutor_Email</th>
                        <th class='orange'>Class 1</th>
                        <th class='orange'>Class 2</th>
                        <th class='orange'>Class 3</th>
                        <th class='orange'>Class 4</th>
                        <th class='orange'>Meeting Time</th>
                        <th class='orange'>Meeting Location</th>
                        

                        </tr></thead><tbody><tr class = returnedRow id = $count>
                        <td class='lightOrange' id = $tutorNumberSelected>" . $tutorNumberSelected . "</td>
                        <td class='lightOrange'>" . $row["Tutor_First"] . "</td>
                        <td class='lightOrange'>" . $tutorLastNameSelected . "</td>
                        <td class='lightOrange'>" . $row["Tutor_GradYr"] . "</td>
                        <td class='lightOrange'>" . $row["Tutor_Email"] . "</td>
                        <td class='lightOrange'>" . $row["Tutor_Class1"] . "</td>
                        <td class='lightOrange'>" . $row["Tutor_Class2"] . "</td>
                        <td class='lightOrange'>" . $row["Tutor_Class3"] . "</td>
                        <td class='lightOrange'>" . $row["Tutor_Class4"] . "</td>
                        <td class='lightOrange'>" . $row["Meet_Time"] . "</td>
                        <td class='lightOrange'>" . $row["Meet_Location"] . "</td>
                        </tr></tbody></table>";

                        echo "</br>";
                        $count++;
                    }
                    echo "</br>";
                }
            }
        }
    }



    ?>



    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <h2>After you search for a class enter the information below:</h2>
        </br>
        <label id="classLabel">Please enter a tutor ID here:
            <input name="tutorID" type="text" size="30" placeholder='e.g. "3"' autofocus="" value="<?php echo $tutorID; ?>">
        </label>
        </br>
        <label id="classLabel">Please enter a first name here:
            <input name="tutorSelected" type="text" size="30" placeholder='e.g. "Cam"' autofocus="" value="<?php echo $tutorSelected; ?>">
        </label>
        </br>
        <label id="classLabel">Please enter a class the tutor teaches here:
            <input name="classSelected" type="text" size="30" placeholder='e.g. "BIT 4444"' autofocus="" value="<?php echo $classSelected; ?>">
        </label>
        </br>
        <button name="signUp">Sign Up for a class</button>

        <?php
        if (isset($_POST["signUp"])) {
            if (isset($_POST["tutorID"])) $tutorID = $_POST["tutorID"];
            if (isset($_POST["tutorSelected"])) $tutorSelected = $_POST["tutorSelected"];
            if (isset($_POST["classSelected"])) $classSelected = $_POST["classSelected"];

            if (empty($tutorID) || empty($tutorSelected) || empty($classSelected)) {
                $error = true;
            }

            if (!$error) {
                //check company name and supplier ID with the database record
                require_once("db.php");
                $sql = "SELECT Tutor_Num, Tutor_First, Tutor_Class1, Tutor_Class2, Tutor_Class3, Tutor_Class4 FROM Tutor WHERE Tutor_Num='$tutorID'";
                $result = $mydb->query($sql);

                $row = mysqli_fetch_array($result);
                if ($row) {
                    if ((strcmp($tutorSelected, $row["Tutor_First"]) == 0) && (strcmp($classSelected, $row["Tutor_Class1"]) == 0) || (strcmp($classSelected, $row["Tutor_Class2"]) == 0) || (strcmp($classSelected, $row["Tutor_Class3"]) == 0) || (strcmp($classSelected, $row["Tutor_Class4"]) == 0)) {
                        $loginOK = true;
                    } else {
                        $loginOK = false;
                    }
                }

                if ($loginOK) {
                    //set session variable to remember the company name and supplier ID
                    session_start();
                    $_SESSION["tutorID"] = $tutorID;
                    $_SESSION["tutorSelected"] = $tutorSelected;
                    $_SESSION["classSelected"] = $classSelected;
                    Header("Location:TBViewStudentSchedule.php");
                }
                
            }
            echo "</br>";
            if (!is_null($loginOK) && $loginOK == false) echo "<span class='errlabel'>The information entered does not match any record in our database.  Double check entries to ensure they match records.  Use search bar above to verify.</span></br>";
            if ($error && empty($classSelected)) echo "<span class='errlabel'> please enter class name</span></br>";
            if ($error && empty($tutorSelected)) echo "<span class='errlabel'> please enter tutor's first name</span></br>";
            if ($error && empty($tutorID)) echo "<span class='errlabel'> please enter tutor's ID</span></br>"; 
        }
        ?>
    </form>




</body>

</html>