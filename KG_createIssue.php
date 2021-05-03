

<!DOCTYPE html>
<html>
    <head>
        <title> Create Issue </title>
        <meta charset = "utf-8"/>
        <meta author = "Kirk Graham"/>

        <!--<link rel = "stylesheet" href = "CSS/style.css" type = "text/css"/>
        <link rel = "stylesheet" href = "CSS/box.css" type = "text/css"/>-->
        
        <link rel="preconnect" href="https://fonts.gstatic.com"/>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&display=swap" rel="stylesheet"/>

        <link href= "CSS/bootstrap.min.css" rel = "stylesheet" />
        <link rel="stylesheet" type="text/css" href="Webpages.css" />
        <link rel="stylesheet" type="text/css" href="KG_table.css" />
        <script src = "jquery-3.1.1.min.js"></script>
        <script src = "js/bootstrap.min.js"></script>
        <?php 
            
            $issueName = "";
            $issueDesc = "";
            $pageOk = null;
            $error = false;
        
            if(isset($_POST["submit"])){
                if(isset($_POST["issuename"])) $issueName = $_POST["issuename"];
                if(isset($_POST["issuedesc"])) $issueDesc = $_POST["issuedesc"];


                if(empty($issueName) || empty($issueDesc)){
                    $error = true;
                }

                if(!$error){
                    require_once("db.php");
                
                
                    $sql = "insert into issue(Issue_Name, Issue_Comment)
                    values('$issueName','$issueDesc')";

                    $result = $mydb->query($sql);
                    
                    if($result = 1)
                        {
                            echo "<p> New employee record has been created</p>";
                        }
                    
                }

                
            } 

            
            
?>

    </head>

    <body class = "container-fluid">
    <div id="navEmployee" style = "margin-bottom: 5%;">
        <nav>
            <ul class="nav nav-pills">
                <li class="pillItem"><a href="Project-Homepage.html">Home</a></li>
                <li role="presentation" class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                        aria-expanded="false">Issues<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="KG_login.php">Login Page</a></li>
                        <li><a href="KG_createIssue.php">Report a Problem</a></li>
                        <li><a href="KG_issuetable.php">View Issues</a></li>
                        <li><a href="KG_modifyIssue.php">Modify Issues</a></li>
                    </ul>
                </li>


                <li role="presentation" class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                        aria-expanded="false">My Profile<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="/Thomas-ViewStudentProfile.html">View My Profile</a></li>
                        <li><a href="/SD_editProfile.html">Edit My Profile</a></li>
                        <li><a href="/SD_logIn.html">Login</a></li>
                        <li><a href="/SD_createProfile.html">Sign Up</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>


        <form method = "POST" action = "<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" name = "emailForm"
        autocomplete="on">
            <div  class = "wallpaper">
                <div class = "row ">
                    <div class = "col-sm-12">
                        <label>Title:
                            <input name = "issuename" type = "text" size = "25" autofocus/>
                            <?php 
                                if ($error && empty($issueName)){
                                    echo "<label class = 'errlbl'> Error: Please enter a title for the issue. </label>";
                                    
                                }
                            ?>
                        </label>
                            </br>
                        <label id ="User" style = margin-top:20px>
                            User Input Description:
                        </label>
                            </br>
                            <textarea name="issuedesc" rows="10" cols="50">
                            </textarea>
                                <?php 
                                if ($error && empty($issueDesc)){
                                    echo "<label class = 'errlbl'> Error: Please enter a description for the issue product name </label>";
                                }
                                ?>
                    </div>
                </div>   
                    
           
                
                    
                    

                    
                </div>
                <div>
                    <input id = "sub-button" name = "submit" type = "submit" value = "Create" >
                    <input type = "button" onclick = "parent.location='KG_issuetable.php'" value = 'Back'>
                </div>
        </div>
        
        
        </form>
        
        

    </body>

</html>