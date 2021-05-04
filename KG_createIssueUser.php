

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
        <script>
             $(function(){
                $('#issuedesc').html($('#issuedesc').html().trim());

                    
                });
        
        </script>
        <?php 
            session_start();
            date_default_timezone_set("America/New_York");
            $_SESSION['sessDate']= date('Y-m-d H:i:s');

            $issueName = "";
            $issueDesc = "";
            $issueTime = $_SESSION['sessDate'];
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
                
                
                    $sql = "insert into issue(Issue_Date, Issue_Name, Issue_Comment) values('$issueTime','$issueName', '$issueDesc')";

                    $result = $mydb->query($sql);
                    
                    if($result = 1)
                        {
                            echo "<p> New employee record has been created<br>
                            Press the back button below to return to the homepage</p>";
                        }
                    
                }

                
            } 

?>

    

    </head>

    <body class = "container-fluid">
        


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
                            <textarea id = "issuedesc" name="issuedesc" rows="10" cols="50">
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
                    <input type = "button" onclick = "parent.location='TBProjectHomepage.php'" value = 'Home'>
                </div>
        </div>
        
        
        </form>
        
        

    </body>

</html>