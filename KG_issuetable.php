
<!doctype html>


<head>
    <title>
        Issue Homepage
    </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com"/>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&display=swap" rel="stylesheet"/>
    <link rel = "stylesheet" href = "CSS/style.css" type = "text/css"/>
    <link rel = "stylesheet" href = "CSS/box.css" type = "text/css"/>
        
    <link rel="preconnect" href="https://fonts.gstatic.com"/>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&display=swap" rel="stylesheet"/>

    <!--CSS Sheets-->
    <link href= "css/bootstrap.min.css" rel = "stylesheet" />
    <link rel="stylesheet" type="text/css" href="Webpages.css" />
    <link rel="stylesheet" type="text/css" href="KG_table.css" />

    <!--Javascript/Jquery-->
    <script src = "jquery-3.1.1.min.js"></script>
    <script src="jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    
    <?php 
        session_start()
    ?>
    
</head>

<body class = "container-fluid">
    
<div id="navEmployee" style = "margin-bottom: 5%;">
        <nav>
            <ul class="nav nav-pills">
                <li class="pillItem"><a href="KG_issuetable.php">Home</a></li>
                <li role="presentation" class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                        aria-expanded="false">Issues<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="KG_login.php">Login Page</a></li>
                        <li><a href="KG_createIssue.php">Report a Problem</a></li>
                        <li><a href="KG_issuetable.php">View Issues</a></li>
                        <li><a href="KG_modifyIssue.php">Modify Issues</a></li>
                        <li><a href="KG_deleteIssue.php">Delete Issues</a></li>
                    </ul>
                </li>
                <li class="pillItem"><a href="KG_Analytics.php">Analytics</a></li>

                
            </ul>
        </nav>
    </div>

    <div class= "container-fluid">
        <div class = "row">
            <div class = "col-sm-2 border">
                
                <p><input type = "button" onclick = "parent.location='KG_Analytics.php'" value = 'View Analytics'></p>
            </div>
            <div class = "col-sm-8 wallpaper">
                <div class="tableFixHead">

                  <?php 
                  echo "
                    <table class = 'issuetable'>
                      <thead class = 'maroon'>
                        <tr >
                            <th style= 'padding-left:30px'>ID</th>
                            <th>Issue Date</th>
                            <th>Issue Title</th>
                            <th>Issue Description</th>
                        </tr>
                      </thead>";

                       
                      require_once("db.php");
                      echo
                      "<tbody>";

                      $sql = "Select Issue_ID, Issue_Date, Issue_Name, Issue_Comment
                              from Issue";
                      $result = $mydb->query($sql);
                          //Insert Rows
                      while($row = mysqli_fetch_array($result)){
                        echo "<tr><td style='padding:0 15px 0 15px;' class = 'orange'>".$row['Issue_ID']."<td style='padding:0 15px 0 15px;' class = 'orange'>".$row['Issue_Date']."</td><td class = 'light-orange'>".$row["Issue_Name"]."</td><td class = 'light-orange'>".$row["Issue_Comment"]."</td></tr>";
                      }
                          
                          
                      
                        
                      echo "</tbody>
                      </table>";
                    ?>
                    
                  </div>
                  <input id = "create" type = "button" onclick = "parent.location='KG_createIssue.php'" value = 'Create Issue'>
                  <input id = "modify" type = "button" onclick = "parent.location='KG_modifyIssue.php'" value = 'Modify Issue'>
                  <input id = "delete" type = "button" onclick = "parent.location='KG_deleteIssue.php'" value = 'Delete Issue'>
            </div>
        </div>
        

    </div>


</body>