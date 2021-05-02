<!DOCTYPE html>
<html>
    <head>
        <title> Modify Issue </title>
        <meta charset = "utf-8"/>
        <meta author = "Kirk Graham"/>

        <link rel = "stylesheet" href = "CSS/style.css" type = "text/css"/>
        <link rel = "stylesheet" href = "CSS/box.css" type = "text/css"/>
        
        <link rel="preconnect" href="https://fonts.gstatic.com"/>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&display=swap" rel="stylesheet"/>

        <link href= "CSS/bootstrap.min.css" rel = "stylesheet" />
        <link rel="stylesheet" type="text/css" href="Webpages.css" />
        <link rel="stylesheet" type="text/css" href="KG_table.css"/>
        <script src = "jquery-3.1.1.min.js"></script>
        <script src = "js/bootstrap.min.js"></script>
        
        <style>
            .border{
                border: 1px solid black;
            }
            .auto{
                margin: auto;
            }

        </style>

        <script>
            $(function(){
                var clickcounter = 1;
                $("#selectIssueID").change(function(){
                    var issueid = $("#selectIssueID").val();

                    if(issueid  != ""){
                        $("#buttonDelete").attr("class","reveal");
                        $("#buttonModify").attr("class", "reveal");
                    } else {
                        $("#buttonDelete").attr("class","hidden");
                        $("#buttonModify").attr("class", "hidden");
                    }
                    
                    $.ajax({
                        url: "KG_Display.php?issueid= " +issueid,
                        async: true,
                        success: function(result) {
                            $("#contentarea").html(result);
                            
                        }
                    })
                });
                
                $("#buttonModify").click(function(){
                    $("#issueID").val($("#selectIssueID").val());
                    clickcounter++;
                    if(clickcounter%2 ==0){
                        $("#modifyForm").attr("class", "reveal wallpaper");
                    } else {
                        $("#modifyForm").attr("class", "hidden");
                    }
                })

            })

            //For Modify

        </script>

        <?php
            
            $issueid = "";
            $issueName = "";
            $issueDesc = "";
            $pageOk = null;
            $error = false;

            if(isset($_POST["delete"])){
                if(isset($_POST["selectIssueID"])) $issueid = $_POST["selectIssueID"];
                
                //delete record

                require_once('db.php');
                $sql = "delete from Issue where issue_id=$issueid";
                $result = $mydb->query($sql);

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

        <div class = "wallpaper">
            <form method = "POST" action = "<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" name = "ID Form"
            autocomplete="on">
                <div class = "border">
                
                        <div class = "col-sm-12 auto text-center" style = width:10%>
                            <label>IDs:
                            </label>
                            <select name = "selectIssueID" id = "selectIssueID">
                                <option></option>
                                <?php
                                    require_once("db.php");

                                    $sql = "select Issue_id from issue";
                                    $result = $mydb->query($sql);

                                    //Each option will be a product id
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<option>".$row['Issue_id']."</option>";
                                    }
                                ?>
                            </select>
                    
                        </div>   
                        
                
                    
                </div>
                <div id = "contentarea">
                    
                </div>
                <!--Delete button-->
                <input id = "buttonDelete" class = "hidden" name = "delete" type = "submit" value = "Delete" />
    
                </form>
                <!--
                
                HIDDEN ROW 
                -->
            
                
                <div class = "col-sm-12">
                        <input type = "button" onclick = "parent.location='KG_issuetable.php'" value = 'Back'>
                </div>
            
        </div>
        
        

    </body>

</html>