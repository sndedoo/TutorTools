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

    <?php
    require_once("db.php");

    $row=$_GET['id'];

    $query = "DELETE * FROM meeting WHERE Meet_ID = '$row'";

    $data = mysqli_query($conn, $query);

    if($data){
        echo "<h2>This appointment has been canceled.</h2>";
    }
    else{
        echo "<h2>Failed to cancel appointment, please try again.</h2>";
    }
    ?>

    <p>Want to go back?<a href="AG_ModifyCancelRequest.php"> click here </a>

</body>
</html> 
