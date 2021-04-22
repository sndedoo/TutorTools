<?php
$firstName = "";
$lastName = "";
$email = "";
$password = "";
$address = "";
$city = "";
$state = 0;
$error = false;

if (isset($_POST["submit"])) {
    if(isset($_POST["firstName"])) $firstName = $_POST["firstName"];
    if(isset($_POST["lastName"])) $lastName = $_POST["lastName"];
    if(isset($_POST["email"])) $email = $_POST["email"];
    if(isset($_POST["password"])) $password = $_POST["password"];
    if(isset($_POST["address"])) $address = $_POST["address"];
    if(isset($_POST["city"])) $city = $_POST["city"];
    if(isset($_POST["state"])) $state = $_POST["state"];

    if(empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($address) || empty($city) || $state<0) {
        $error = true;
      }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Profile</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="Webpages.css" />
    <script src="jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="myScripts.js"></script>
</head>

<body class="container-fluid">
    <h1>Create a Profile </h1>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">

        <p>First name 
        <br/> 
        <input type="text" name="firstName" placeholder="First Name" value="<?php if(!empty($firstName)) echo $firstName; ?>">
        <?php
        if ($error=true && empty($firstName)) {
          echo "<label>Error: Please enter your first name.</label>";
        }
      ?> 
        <br/>

        Last name 
        <br/>
        <input type="text" name="lastName" placeholder="Last Name" value="<?php if(!empty($lastName)) echo $lastName; ?>">
        <?php
        if ($error=true && empty($lastName)) {
          echo "<label>Error: Please enter your last name.</label>";
        }
      ?>
        <br/>

        Email
        <br/>
        <input type="email" name="email" placeholder="Email" value="<?php if(!empty($email)) echo $email; ?>">
        <?php
        if ($error=true && empty($email)) {
          echo "<label>Error: Please enter your email.</label>";
        }
      ?>
        <br/>

        Create Password
        <br/>
        <input type="password" name="password" placeholder="Password" value="<?php if(!empty($password)) echo $password; ?>">
        <?php
        if ($error=true && empty($password)) {
          echo "<label>Error: Please enter your password.</label>";
        }
      ?>
        <!-- <br/>
        Confirm Password
        <br/>
        <input type="password" name="passwordConfirm" placeholder="Password"> -->
        <br/>

        Street Address
        <br/>
        <input type="text" name="address" placeholder="Street Address" size="30" value="<?php if(!empty($address)) echo $address; ?>">
        <?php
        if ($error=true && empty($address)) {
          echo "<label>Error: Please enter your address.</label>";
        }
      ?>
        <br/>

        City
        <br/>
        <input type="text" name="city" placeholder="City" value="<?php if(!empty($city)) echo $city; ?>">
        <?php
        if ($error=true && empty($city)) {
          echo "<label>Error: Please enter your city.</label>";
        }
      ?>
        <br/>

        State
        <br/>
        <select name="State" id="">
        <?php
          echo "<option value='0'> </option>";

          require_once("db.php");
          $sql="select State from student order by State";
          //execute the $sql statement and get the $result back

          while($row=mysqli_fetch_array($result)){
            //<option value='1'>1</option>
            echo "<option value='".$row["State"]."'>".$row["State"]."</option>";
          }
        ?>
        </select>
        <br>

        Tutor or Student?
        <br>
        <input type="radio" name="student">Student
        <input type="radio" name="tutor">Tutor
        <input type="radio" name="tutor">Employee
        <br/>
        <input type="submit" name="submit" value="Create Account"/>
        <input type="reset" name="clear" value="Clear Entry"/>
        <br>
        Already have an Account?<a href="/Senya - LogIn.html">Log In</a></p> 
    </form>
</body>

</html>