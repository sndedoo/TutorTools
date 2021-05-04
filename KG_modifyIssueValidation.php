<!doctype html>

<html>

    <head>
        <title>
            hw12q2
        </title>
    </head>
    <body>
        <?php 
            session_start();
            date_default_timezone_set("America/New_York");
            $_SESSION['sessDate']= date('Y-m-d H:i:s');
            
            $issueid = '';
            $issueName = '';
            $issueDesc = '';
            $sessionTime = $_SESSION['sessDate'];
            
            
            /*Variables above should be initialzied if POST is successful*/
            if(isset($_POST["frmissueid"])) $issueid = $_POST["frmissueid"];
            if(isset($_POST["issuename"])) $issueName = $_POST["issuename"];
            if(isset($_POST["issuedesc"])) $issueDesc = $_POST["issuedesc"];
            
            
            require_once("db.php");
            echo "<p>Hello"."$issueid</p>";
                    
            $sql = "update issue set issue_name = '$issueName', issue_comment = '$issueDesc', issue_date ='$sessionTime' where issue_id = $issueid";
            $result = $mydb->query($sql);
                
            if($result = 1){
                
                header("HTTP/1.1 307 Temprary Redirect");
                header("Location: KG_issueTable.php");
            }
            
        ?>


        
        


        

    </body>


</html>