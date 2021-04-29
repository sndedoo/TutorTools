<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Service Request Submissiont</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <script src="jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <meta author="Alejandro Gonzales">

    <!--Module 3 style sheet link-->
    <link rel="stylesheet" href="Module3.css"/>
</head>
<body>
    <div class="container-fluid">
    
    <!--Description of this page-->
    <div>
        <h1 class="blue"><img src="Image/Tutor Tools Logo.png" alt="Error loading image" align = "left" height="150"/>
            Use Case 1: Submit a bid to a service request
        </h1>
    </div>    
    <!--Navigation Bar-->
    <nav> 
        <ul class = "nav nav-pills nav-justified">
            <li><a href="TutorHomepage.html">Homepage</a></li>
            <li role = "presentation" class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"
                role="button" aria-haspopup="true" aria-haspopup="false">Services<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="AG_SearchServiceRequest.php">Search for an Appointment</a></li>
                    <li><a href="AG_ModifyCancelRequest.php">Modify an Appointment</a></li>
                    <li><a href="AG_ModifyCancelRequest.php">Cancel an Appointment</a></li>
                </ul>
            </li>
            <li><a href = "TBViewStudentSchedule.php">View Schedule</a></li>
            <li><a href = "SD_profiles.php">View My Profile</a></li>
        </ul>
    </nav>

    

    <div class="inline">  
    <p> 
        Existing bids/responses on the webside... search bar here
        <br>
        <br>
        Appointments associated with the profile will be listed here
        <br>
        <br>
        Along with a checkbox to the right that will allow the user to select the appointment
        <br>
        <br>
    </p> </div>
    <div class="inline_2"> 
    <p> Profile information </p>
    </div>  
    

    <p> 
        Bid for a service request with submit button 
        <br>
        <br>
        The button then takes them to Use Case 2 & 3 webpage with a warning message before proceeding
    </p>

   
    </div>
</body>
</html>
