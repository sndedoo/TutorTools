<?php
$email = "";
$password = "";
$remember = "no";
$error = false;
$loginOK = null;

if (isset($_POST["submit"])) {
    if(isset($_POST["stuEmail"])) $email=$_POST["stuEmail"];
    if(isset($_POST["stuPassword"])) $password=$_POST["stuPassword"];
    if(isset($_POST["remember"])) $remember=$_POST["remember"];

  
    if(empty($email) || empty($password)) {
      $error=true;
    }

    if(!empty($email) && $remember == "yes") {
      setcookie("stuEmail", $email, time()+60*60*24*7, "/");
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
          // setcookie("lastLoginTime", date("F j, Y, g:i a"), time()+60*60*24*2, "/");  
          Header("Location: TBProjectHomepage.php");
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
<?php include('navStudent.php');?>
  <div class="wallpaper">
    <h1>Log In</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <p>
        Email
        <br/>
        <input type="email" name="stuEmail" placeholder="Email" size="25" value="<?php
        if(!empty($email))
          echo $email;
          elseif (isset($_COOKIE['stuEmail'])) {
            echo $_COOKIE['stuEmail'];
          }
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
        <input type="checkbox" name="remember" value="yes"><label for="remember">Remember me</label>
        <br>

        <!-- Add radio button with student or tutor-->
        
        <input type="submit" name="submit" value="Login"/> 
        <br>
        <a href="/SD_passwordRecovery.html">Forgot Your Password?</a>
        <br>
        Need an Account?<a href="SD_createProfile.php">Create an Account</a>
    </p>
    </form>
    </div>
</body>
</html>