<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Out</title>
</head>
<body>
    <?php
    session_start();

    $email = $_SESSION["stuEmail"];
    $_SESSION = array();
    
    //unset($_SESSION["stuEmail"]);

    session_destroy();

    Header("Location: SD_logIn.php");
    ?>

</body>
</html>