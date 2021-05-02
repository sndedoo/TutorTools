<!doctype html>

<html>

    <head>
        <title>
            hw12q2
        </title>
    </head>
    <body>
        <?php 
            $issueid = "";
            $issueName = "";
            $issueDesc = "";
            
            
            /*Variables above should be initialzied if POST is successful*/
            if(isset($_POST["frmissueid"])) $issueid = $_POST["frmissueid"];
            if(isset($_POST["issuename"])) $issueName = $_POST["issuename"];
            if(isset($_POST["issuedesc"])) $issueDesc = $_POST["issuedesc"];
            
            require_once("db.php");
            echo "<p>$issueid</p>";
                    
            $sql = "update issue set issue_name = '$issueName', issue_comment = '$issueDesc' where issue_id = $issueid";
            $result = $mydb->query($sql);
                
            if($result = 1){
                echo "<p> Updated issue record has been created</p>";
                header("HTTP/1.1 307 Temprary Redirect");
                header("Location: KG_issueTable.php");
            }
        ?>


        <!--Adds record to database -->
        


        

    </body>


</html>