<!DOCTYPE html>

<html>
    <head>
        <title>
            Display Products
        </title>
	    <meta charset=UTF-8/>
        <link rel="stylesheet" type="text/css" href="KG_table.css"/>
    </head>

    <body>

        <?php 
            $issueid = 0;
            if(isset($_GET['issueid'])) $issueid = $_GET['issueid'];
        ?>
        


            <?php      
                require_once('db.php');
                

                echo
                    "<table class = 'ajaxTable'>
                        <thead>
                            <tr class = 'maroon'>
                                <th>Issue Date</th>
                                <th>Issue Name</th>
                                <th>Issue Comment</th>         
                            </tr>
                    </thead>
                    <br>
                    <table class = 'ajaxTable'>
                    <tbody>";
                    
                    //if there is a value in parameter (productid), return record of product id
                    $sql = "select issue_date, issue_name, issue_comment from issue where issue_id = '$issueid'";
                    $result = $mydb->query($sql);
                    while($row = mysqli_fetch_array($result)){
                            echo "<tr><td>".$row['issue_date']."</td><td>".$row['issue_name']."</td><td>".$row['issue_comment']."</td></tr>";
                    }


                    
                        echo
                        "</tbody>
                    </table>";
            ?>
        
        
        
        </table>
            
        
    
    
    
    </body>
</html>