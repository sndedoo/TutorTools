<!DOCTYPE HTML>
<html>
    <head>
        <title>My Reviews</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="Webpages.css" />
        <link rel="stylesheet" type="text/css" href="AM_Form.css" />
        <script src="jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="myScripts.js"></script>
        <meta author="Allie Ahwee-Marrah">
        <meta descriptions="This page allows a user to review the reviews they've written">
        <style>
            td, th {
            text-align: left;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <!--navigation bar-->
            <div class="wallpaper">
                <h1>My Reviews</h1> 
                <br />
                <?php
                    $rid = 0;
                    $sname = 0;
                    $tname = 0;
                    $orank = 0;
                    $arank = 0;
                    $erank = 0;
                    $hrank = 0;
                    $rhead = "";
                    $rcomment = "";
                
                    if(isset($_POST["id"])) $rid=$_POST["id"];
                    if(isset($_POST["studentname"])) $sname=$_POST["studentname"];
                    if(isset($_POST["tutorname"])) $tname=$_POST["tutorname"];
                    if(isset($_POST["overall"])) $orank=$_POST["overall"];
                    if(isset($_POST["attitude"])) $arank=$_POST["attitude"];
                    if(isset($_POST["explain"])) $erank=$_POST["explain"];
                    if(isset($_POST["help"])) $hrank=$_POST["help"];
                    if(isset($_POST["heading"])) $rhead=$_POST["heading"];
                    if(isset($_POST["comment"])) $rcomment=$_POST["comment"];

                    require_once("db.php");
                    
                    echo "<table><thead><tr><th></th></thead><tbody>";

                    if($rid != "") {
                        $sql = "UPDATE meetingevaluation SET tutor_num='$tname', meetingeval_overall='$orank', meetingeval_attitude='$arank', meetingeval_explain='$erank', meetingeval_helpful='$hrank', meetingeval_heading='$rhead', meetingeval_review='$rcomment' WHERE meetingeval_id='$rid'"; 
                        $result = $mydb->query($sql);

                        echo"<tr><td><br /><b>Tutor Name: </b><u>$tname</u>
                            <b>&emsp;Overall Rating: </b><u>$orank</u>
                            &emsp;<button><a href='AM_EditReview.php'>Edit</a></button>
                            <button onclick='deleteReview()'>Delete</button>
                            <br />&emsp;Attitude: <u>$arank</u>
                            &nbsp;Explainability: <u>$erank</u>
                            &nbsp;Helpfulness: <u>$hrank</u>
                            <br />&emsp;<u>$rhead</u>
                            <br />&emsp;$rcomment</td></tr>";
                        echo "</tbody></table>";
                    } else {
                        $sql = "INSERT INTO meetingevaluation(tutor_num, student_num, meetingeval_overall, meetingeval_attitude, meetingeval_explain, meetingeval_helpful, meetingeval_heading, meetingeval_review) VALUES ('$tname', '$sname', '$orank', '$arank', '$erank', '$hrank', '$rhead', '$rcomment')"; 
                        $result = $mydb->query($sql);
                        /*
                        while($row=mysqli_fetch_array($result)){
                            echo"<tr><td><br /><b>Tutor Name: </b><u>".$row["tname"]."</u>
                            <b>&emsp;Overall Rating: </b><u>".$row["meetingeval_overall"]."</u>
                            &emsp;<button><a href='AM_EditReview.php'>Edit</a></button>
                            <button onclick='deleteReview()'>Delete</button>
                            <br />&emsp;Attitude: <u>".$row["meetingeval_attitude"]."</u>
                            &nbsp;Explainability: <u>".$row["meetingeval_explain"]."</u>
                            &nbsp;Helpfulness: <u>".$row["meetingeval_helpful"]."</u>
                            <br />&emsp;<u>".$row["meetingeval_heading"]."</u>
                            <br />&emsp;".$row["meetingeval_review"]."</td></tr>";
                        } echo "</tbody></table>";*/
                        echo"<tr><td><br /><b>Tutor Name: </b><u>$tname</u>
                            <b>&emsp;Overall Rating: </b><u>$orank</u>
                            &emsp;<button><a href='AM_EditReview.php'>Edit</a></button>
                            <button onclick='deleteReview()'>Delete</button>
                            <br />&emsp;Attitude: <u>$arank</u>
                            &nbsp;Explainability: <u>$erank</u>
                            &nbsp;Helpfulness: <u>$hrank</u>
                            <br />&emsp;<u>$rhead</u>
                            <br />&emsp;$rcomment</td></tr>";
                        echo "</tbody></table>";
                    }
                ?>

                <script>
                    function deleteReview() {
                        conf = confirm("Are you sure you want to delete this review?");
                        <?php
                            $sql = "DELETE FROM meetingevaluation WHERE meetingeval_id='$rid'"; 
                            $result = $mydb->query($sql);
                        ?>
                    }
                </script>
            </div>
      </div>
    </body>
</html>