<?php
$email = "";
$password = "";
$remember = "no";
$error = false;
$loginOK = null;

if (isset($_POST["submit"])) {
    if(isset($_POST["email"])) $email=$_POST["email"];
    if(isset($_POST["passwrd"])) $password=$_POST["passwrd"];
    if(isset($_POST["remember"])) $remember=$_POST["remember"];

  
    if(empty($email) || empty($password)) {
      $error=true;
    }

    if(!empty($email) && $remember == "yes") {
      setcookie("email", $email, time()+60*60*24*7, "/");
    }
  
    if (!$error && $_POST['userSelect'] == 'Student') {
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
          $_SESSION["email"] = $email;
          $_SESSION["passwrd"] = $password;
          // setcookie("lastLoginTime", date("F j, Y, g:i a"), time()+60*60*24*2, "/");  
          Header("Location: TBProjectHomepage.php");
        } elseif (!$loginOK) {
          echo "<p>Make sure you have entered the correct information.</p>";
        }
  
      } else {
      echo '<script language="javascript">';
      echo 'alert("This User does not exist. Please Try Again")';
      echo '</script>';
        // echo "<p>The User does not exist. Please Try Again</p>";
      }
    } elseif (!$error && $_POST['userSelect'] == 'Tutor') {
      require_once("db.php");
      $sql = "SELECT Tutor_Email, Tutor_Password FROM tutor WHERE Tutor_Email='$email' AND Tutor_Password='$password'";
      $result = $mydb->query($sql);
  
      $row=mysqli_fetch_array($result);
  
      if ($row){
        if (strcmp($email, $row["Tutor_Email"]) == 0 && strcmp($password, $row["Tutor_Password"]) == 0) {
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
          $_SESSION["email"] = $email;
          $_SESSION["passwrd"] = $password;
          // setcookie("lastLoginTime", date("F j, Y, g:i a"), time()+60*60*24*2, "/");  
          Header("Location: TBTutorHomepage.php");
        } elseif (!$loginOK) {
          echo "<p>Make sure you have entered the correct information.</p>";
        }
  
      } else {
        echo '<script language="javascript">';
        echo 'alert("This User does not exist. Please Try Again")';
        echo '</script>';
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
  <div class="wallpaper">
    <h1>Log In</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <p>
        Email
        <br/>
        <input type="email" name="email" placeholder="Email" size="25" value="<?php
        if(!empty($email))
          echo $email;
          elseif (isset($_COOKIE['email'])) {
            echo $_COOKIE['email'];
          }
      ?>">
      <?php
        if ($error=true && empty($email)) {
          echo "<label>Please enter an email.</label>";
        }
      ?>
        <br/>
        Password
        <br/>
        <input type="password" name="passwrd" placeholder="Password" size="25" value="<?php
        if(!empty($password))
          echo $password;
      ?>">
      <?php
        if ($error=true && empty($password)) {
          echo "<label>Please enter a password.</label>";
        }
      ?>
        <br>
        <label for="userSelect">Tutor or Student?</label> 
        
        <select name="userSelect" >
          <option value="" selected> </option>  
          <option value="Student">Student</option>
          <option value="Tutor">Tutor</option>
        <?php
        if ($error=true && ($_POST['userSelect'] == '')) {
          echo "<label>Please enter your user type.</label>";
        }
        ?>
        </select>
        
        <br>
        <input type="checkbox" name="remember" value="yes"><label for="remember">Remember me</label>
        <br>

        <br>
        
        <input type="submit" name="submit" value="Login"/> 
        <br>
        Need an Account?<a href="SD_createProfile.php">Create an Account</a>
    </p>
    </form>
    </div>
</body>
</html>