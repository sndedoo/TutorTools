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

    <link rel="stylesheet" href="Webpages.css"/>
</head>
<body>
    <?php include('navStudent.php');?>

    <form method = "post" action="AG_ModifyService.php">
         Appointment Meeting Time:<input type="datetime-local" name="Meet_Time" value="<?php echo $Meet_ID; ?>" style="margin-left: 1%;"/>
        <br />
        <p></p>
         Appointment Meeting Location:<input type="text" name="Meet_Location" value="<?php echo $Meet_Location?>" placeholder="Location..." style="margin-left: 1%;"/>
        <br />
        <p></p>
         Appointment Student Payment:<input type="number" name="Stu_Payment" value="<?php echo $Stu_Payment?>" placeholder=">$0.01" style="margin-left: 1%;"/>
        <br />
        <p></p>
        <input type="submit" name="modify" value="Finalize Modification" style="margin-left: 5%;"/>
    </form>

    <?php

    $query=mysqli_query("SELECT * FROM meeting WHERE Meet_ID='$id'");

    while($row=mysqli_fetch_array($query)){
        $Meet_ID=$row['id'];
        $Meet_Time=$row['Meet_Time'];
        $Meet_Location=$row['Meet_Location'];
        $Stu_Payment=$row['Stu_Payment'];
    }

    if(isset($_POST['modify'])){
        $Meet_Time=$_POST['Meet_Time'];
        $Meet_Location=$_POST['Meet_Location'];
        $Stu_Payment=$_POST['Stu_Payment'];

        mysqli_query("UPDATE meeting SET Meet_Time='$Meet_Time', Meet_Location='$Meet_Location', Stu_Payment='$Stu_Payment' WHERE Meet_ID='$id'");
        echo "<h2>Appointment has been modified</h2>";
    }
    else{
        echo "<h2>Error modifying this appointment, please try again.</h2>";
    }
    ?>


    <p>Want to go back?<a href="AG_ModifyCancelRequest.php"> click here </a></p>


</body>
</html> 
