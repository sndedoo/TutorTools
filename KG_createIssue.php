

<!DOCTYPE html>
<html>
    <head>
        <title> Create Issue </title>
        <meta charset = "utf-8"/>
        <meta author = "Kirk Graham"/>

        <link rel = "stylesheet" href = "CSS/style.css" type = "text/css"/>
        <link rel = "stylesheet" href = "CSS/box.css" type = "text/css"/>
        
        <link rel="preconnect" href="https://fonts.gstatic.com"/>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&display=swap" rel="stylesheet"/>

        <link href= "CSS/bootstrap.min.css" rel = "stylesheet" />
        
        <script src = "jquery-3.1.1.min.js"></script>
        <script src = "js/bootstrap.min.js"></script>
        <?php 
            
            $issueName = "";
            $issueDesc = "";
            $err = false;
        
            if(isset($_POST["submit"])){
                if(isset($_POST["issuename"])) $issueName = $_POST["issuename"];
                if(isset($_POST["issuedesc"])) $issueDesc = $_POST["issuedesc"];
            } else {
                $err = true;
            }
            
            //Adds record to database
            require_once("db.php");
            {
                
                $sql = "insert into issue(Issue_Name, Issue_Comment)
                values('$issueName','$issueDesc')";

                $result = $mydb->query($sql);


                if($result = 1){echo "<p> New employee record has been created</p>";}
            } 
            
?>

    </head>

    <body>
        <nav class="navbar navbar-inverse">
        
        
            <div class="container-fluid">
                <div class="navbar-header">
                    <img src = "Image/download.png"/>
                </div>
    
                <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Page 1</a></li>
                <li><a href="#">Page 2</a></li>
                <li><a href="#">Page 3</a></li>
                </ul>
            </div>
        </nav>


        <form method = "POST" action = "mailto:kirkgraham1@gmail.com" enctype="multipart/form-data" name = "emailForm"
        autocomplete="on">
            <div class = "border container-fluid">
                <div class = "row text-center ">
                    <div class = "col-sm-12 auto" style = width:50%>
                        <label>Name:
                            <input name = "issuename" type = "text" size = "25" required autofocus/>
                            <?php 
                                if ($err && empty($issuename)){
                                    echo "<label class = 'errlbl'> Error: Please enter a title for the issue. </label>";
                                    
                                }
                            ?>
                        </label>
                    </div>
                </div>   
                    
            </div>
                <div class = "row">
                    <div>
                        <label id ="User" style = margin-top:20px>
                            User Input Description
                        </label>
                        <textarea name="issuedesc" rows="10" cols="50">
                        </textarea>
                        <?php 
                    if ($err && empty($issueDesc)){
                        echo "<label class = 'errlbl'> Error: Please enter a description for the issue product name </label>";
                    }
                ?>
                    </div>
                    

                    
                </div>
                <div>
                    <input id = "sub-button" type = "submit" value = "Create">
                    <input type = "button" onclick = "parent.location='KG_issuetable.html'" value = 'Back'>
                </div>
        </div>
        
        
        </form>
        
        

    </body>

</html>