<?php
$email = "";
$password = "";
// $remember = false;
$error = false;
$loginOK = null;

if (isset($_POST["submit"])) {
    if(isset($_POST["stuEmail"])) $email=$_POST["stuEmail"];
    if(isset($_POST["stuPassword"])) $password=$_POST["stuPassword"];
  
    if(empty($email) || empty($password)) {
      $error=true;
    }
  
    if (!$error) {
      require_once("db.php");
      $sql = "SELECT Student_Email, Student_Password FROM student WHERE Student_Email='$email' AND Student_Password='$password'";
      $result = $mydb->query($sql);
  
      $row=mysqli_fetch_array($result);
  
      if ($row){
        if (strcmp($email, $row["Student_Email"]) == 0 && strcmp($password, $row["Student_Password"]) == 0) {
          $loginOK = true;
        // } elseif (!$error) {
        //     require_once("db.php");
        //     $sql = "SELECT Tutor_Email, Tutor_Password FROM tutor WHERE Tutor_Email='$email' AND Tutor_Password='$password'";
        //     $result = $mydb->query($sql);
        
        //     $row=mysqli_fetch_array($result);
        
        //     if ($row){
        //       if (strcmp($email, $row["Tutor_Email"]) == 0 && strcmp($password, $row["Tutor_Password"]) == 0) {
        //         $loginOK = true;

        } else {
          $loginOK = false;
        }
  
        if($loginOK) {
          session_start();
          $_SESSION["stuEmail"] = $email;
          $_SESSION["stuPassword"] = $password;
          setcookie("lastLoginTime", date("F j, Y, g:i a"), time()+60*60*24*2, "/");  //e.g., March 10, 2001, 5:16 pm
          Header("Location: TBProjectHomepage.html");
        } elseif (!$loginOK) {
          echo "<p>Make sure you have entered the correct information.</p>";
        }
  
      } else {
        echo "<p>The User does not exist. Please Try Again</p>";
      }
    }
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="Webpages.css" />
    <script src="jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="myScripts.js"></script>
</head>
<body class="container-fluid">
    <h1>Log In</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <p>
        Email
        <br/>
        <input type="email" name="stuEmail" placeholder="Email" size="25" value="<?php
        if(!empty($email))
          echo $email;
      ?>">
      <?php
        if ($error=true && empty($email)) {
          echo "<label>Error: Please enter an email.</label>";
        }
      ?>
        <br/>
        Password
        <br/>
        <input type="password" name="stuPassword" placeholder="Password" size="25" value="<?php
        if(!empty($password))
          echo $password;
      ?>">
      <?php
        if ($error=true && empty($password)) {
          echo "<label>Error: Please enter a password.</label>";
        }
      ?>
        
        <br>
        <!-- <input type="checkbox" name="student">Remember Me
        <br> -->
        
        <input type="submit" name="submit" value="Login"/> 
        <br>
        <a href="/SD_passwordRecovery.html">Forgot Your Password?</a>
        <br>
        Need an Account?<a href="/SD_createProfile.html">Create an Account</a>
    </p>
    </form>
</body>
</html>