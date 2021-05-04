<?php
  $username="";
  $password="";
  $error = false;
  $loginOK = null;

  if(isset($_POST["submit"])){
    if(isset($_POST["email"])) $emp_email=$_POST["email"];
    if(isset($_POST["password"])) $emp_pass=$_POST["password"];
    

    
    if(empty($emp_email) || empty($emp_pass)) {
      $error=true;
    }

    if(!$error){


      //check username and password with the database record
      require_once("db.php");
      $sql = "SELECT Emp_Password from employee where Emp_Email = '$emp_email'";
      $result = $mydb->query($sql);

      $row=mysqli_fetch_array($result);
      if ($row){
        if(strcmp($emp_pass, $row["Emp_Password"]) ==0 ){
          $loginOK=true;
        } else {
            $loginOk=false;
            $error = true;
        }
        //COOKIES
        if(!empty($emp_email) && $remember == "yes") {
            setcookie("emp_email", $emp_email, time()+60*60*24*7, "/");
          }
        
        
      }

      if($loginOK) {
        //set session variable to remember the username
        session_start();
        $_SESSION["sesPass"] = $emp_pass;
        $_SESSION["sesEmail"] = $emp_email;
        $_SESSION["sessDate"] = '';
        Header("Location:KG_issuetable.php");
      }
      
    }
  }


 ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login </title>
        <meta charset = "utf-8"/>
        <meta author = "Kirk Graham"/>

        <link rel = "stylesheet" href = "CSS/style.css" type = "text/css"/>
        <link rel = "stylesheet" href = "css/box.css" type = "text/css"/>
        
        <link rel="preconnect" href="https://fonts.gstatic.com"/>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&display=swap" rel="stylesheet"/>

        <link href= "CSS/bootstrap.min.css" rel = "stylesheet" />
        <link rel="stylesheet" type="text/css" href="Webpages.css" />
        <link rel="stylesheet" type="text/css" href="KG_table.css" />
        <script src = "jquery-3.1.1.min.js"></script>
        <script src = "js/bootstrap.min.js"></script>
        <style>
            .space {
                margin-top: 15%;
            }
            .gray {
                background-color: gray;
            }


        </style>
    </head>

    <body>
        
        <div class = "container-fluid">
            

            <form class = "form-inline" method = "POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" 
            autocomplete="on">

                <div class = "text-center" style = "padding-bottom:20px;">
                   
                    <div class = "space row text-center">
                        <h1 >
                            Login: <br>Employee
                        </h1>
                    </div>
                        
                    
                    <div class = " row">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="email">
                            <?php if(empty($emp_email) && $error==true) {
                                echo "<span class='errlabel'>Insert username.</span>"; }
                            ?>
                            
                        </div>
                        
                    </div>
                    <div class = "row">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" >
                            <?php if(empty($emp_pass) && $error==true) echo "<span class='errlabel'>Insert Password.</span>"; 
                                    elseif($loginOK == false && $error == true) echo "<span class='errlabel'>Password doesn't match.</span>"?>
                        </div> 

                    </div>
                    <div class = "row">
                        <button type="submit" name="submit" value= "Login" class="btn btn-default">Login</button>
                        
                    </div>
                </div>
            </form>
        </div>
        
        
        
    </body>

</html>