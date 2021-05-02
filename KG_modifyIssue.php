<!DOCTYPE html>
<?php
            
            $issueid = "";
            $issueName = "";
            $issueDesc = "";
            
            $error = false;

            if(isset($_POST["submit"])){
                if(isset($_POST["frmissueid"])) $issueid = $_POST["frmissueid"];
                if(isset($_POST["issuename"])) $issueName = $_POST["issuename"];
                if(isset($_POST["issuedesc"])) $issueDesc = $_POST["issuedesc"];
    
    
                if(!empty($issueName) && !empty($issueDesc)){
                    header("HTTP/1.1 307 Temprary Redirect");
                    header("Location: KG_modifyIssueValidation.php");
                } else {
                    $error = true;
                }
    
    
                
            } 
            

        ?>

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

    
                    $("#frmissueid").val($("#selectIssueID").val());
                    $('#issuedesc').html($('#issuedesc').html().trim());

                    //Click counter revealing Modification form 

                    if(issueid  != ""){
                        $("#modifyForm").attr("class", "reveal wallpaper");
                        $("#buttonModify").attr("class", "reveal");
                    } else {
                        $("#buttonModify").attr("class", "hidden");
                        $("#modifyForm").attr("class", "hidden");
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
                    
                })

            })

            //For Modify

        </script>

        
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
            >
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
                <input id = "buttonModify" class = "hidden" name = "modify" type = "button" value = "Modify" />
                </form>
                <!--
                
                HIDDEN ROW 
                -->
            
                <form method = "POST" class = "hidden" action = "<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" id = "modifyForm"
        autocomplete="on">
                    <div id = "modifyInfo" class = "row wallpaper">
                        <div class = "col-sm-12">
                            <label>ID:
                                <input id = "frmissueid" type = "text" name = "frmissueid" />

                            </label></br>
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
                            <input id = "buttonModify" name = "submit" type = "submit" value = "Submit Changes" />
                    </div>   
                </form>
                <div class = "col-sm-12">
                        <input type = "button" onclick = "parent.location='KG_issuetable.php'" value = 'Back'>
                </div>
            
        </div>
        
        

    </body>

</html>