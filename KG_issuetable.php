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
    <link href= "CSS/bootstrap.min.css" rel = "stylesheet" />
    <!--<link rel="stylesheet" type="text/css" href="Webpages.css" /> -->
    <link rel="stylesheet" type="text/css" href="KG_table.css" />

    <!--Javascript/Jquery-->
    <script src = "jquery-3.1.1.min.js"></script>
    <script src="jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="myScripts.js"></script>
    
    
</head>

<body>

    <nav class="navbar navbar-inverse">
        
        
        <div class="container-fluid">
            

            <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">Page 1</a></li>
            <li><a href="#">Page 2</a></li>
            <li><a href="#">Page 3</a></li>
            </ul>
        </div>
    </nav>

    <div class = "container-fluid">
        <div class = "row">
            <div class = "col-sm-2 border">
                <img src = "Images/pie_chart.jpg"/>
                <p><input type = "button" onclick = "parent.location='issuetable.html'" value = 'View Analytics'></p>
            </div>
            <div class = "col-sm-8" style = "background-color:gray">
                <div class="tableFixHead">

                  <?php 
                  echo "
                    <table>
                      <thead>
                        <tr>
                            <th>ID</th>
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
                  <input type = "button" onclick = "parent.location='KG_createIssue.php'" value = 'Create Issue'>
                    <input type = "button" onclick = "parent.location='KG_modifyIssue.php'" value = 'Modify Issue'>
            </div>
        </div>
        

    </div>


</body>