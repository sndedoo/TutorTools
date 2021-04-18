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
        if(strcmp($emp_pass, $row["password"]) ==0 ){
          $loginOK=true;
        } 
        
        
      }

      if($loginOK) {
        //set session variable to remember the username
        session_start();
        $_SESSION["sesPass"] = $emp_pass;
        $_SESSION["sesEmail"] = $emp_email;
        $_SESSION["sessDate"] = date("H:is a");
        Header("Location:KG_issuetable.html");
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
        <link rel = "stylesheet" href = "CSS/box.css" type = "text/css"/>
        
        <link rel="preconnect" href="https://fonts.gstatic.com"/>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&display=swap" rel="stylesheet"/>

        <link href= "CSS/bootstrap.min.css" rel = "stylesheet" />
        
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
            <div class = "row col-md-12">
                <img src ="Image/download.png"/>
            </div>

            <form class = "form-inline" method = "POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" 
            autocomplete="on">

                <div class = "gray" style = "padding-bottom:20px;">
                   
                    <div class = "space row text-center">
                        <h1 >
                            Login
                        </h1>
                    </div>
                        
                    
                    <div class = "row">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="email" placeholder="kgraham">
                        </div>
                        
                    </div>
                    <div class = "row">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" >
                            <?php if(is_null($loginOK) && $loginOK==false) echo "<span class='errlabel'>Email and password do not match do not match.</span>"; ?>
                        </div> 

                    </div>
                    <div class = "row">
                        <button type="submit" class="btn btn-default">Login</button>
                        <button type= "submit" class="btn btn-default">Forgot Password</button>
                    </div>
                </div>
            </form>
        </div>
        <table>
            
                <?php
                require_once("db.php");
                $sql = "select Emp_first from employee";
                $result = $mydb->query($sql);
                $row=mysqli_fetch_array($result);

                while($row = mysqli_fetch_array($result)){
                    echo "<tr><td>".$row["Emp_first"]."</td></tr>";
                }
            


               ?>
            

        </table>
        
        
        
    </body>

</html>