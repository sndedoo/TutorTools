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
    </head>
    <body>
        <div class="container-fluid">
            <!--navigation bar-->
            <h1>My Reviews</h1> 
            <br />
            <?php
                $rid = 0;
                $sname = "";
                $tname = "";
                $orank = 0;
                $arank = 0;
                $erank = 0;
                $hrank = 0;
                $rhead = "";
                $rcomment = "";

                if(isset($_POST["id"])) $rid=$_POST["id"];
                if(isset($_POST["studentname"])) $sname=$_POST["tutorname"];
                if(isset($_POST["tutorname"])) $tname=$_POST["tutorname"];
                if(isset($_POST["overall"])) $orank=$_POST["overall"];
                if(isset($_POST["attitude"])) $arank=$_POST["attitude"];
                if(isset($_POST["explain"])) $erank=$_POST["explain"];
                if(isset($_POST["help"])) $hrank=$_POST["help"];
                if(isset($_POST["heading"])) $rhead=$_POST["heading"];
                if(isset($_POST["comment"])) $rcomment=$_POST["comment"];

                require_once("db.php");

                if($prodid == "") {
                    $sql = "INSERT INTO meetingevaluation(meetingeval_id, meetingeval_student, meetingeval_tutor, meetingeval_overall, meetingeval_attitude, meetingeval_explain, meetingeval_helpful, meetingeval_heading, meetingeval_review) VALUES ('$rid', '$sname' , '$tname', $orank, $arank, $erank, $hrank, '$rhead', '$rcomment')"; 
                    $result = $mydb->query($sql);
                    
                    while($row = mysqli_fetch_array($result)){
                        echo"<p>
                                Tutor Name: $tname 
                                Rating:$orank
                                <button><a href='AM_EditReview.php'>Edit</a></button>
                                <button onclick='deleteReview()'>Delete</button>
                                <br />
                                <u>$rhead</u>
                                <br />
                                $rcomment  
                            </p>";
                    }
                } else {
                    $sql = "UPDATE meetingevaluation SET meetingeval_name='$tname', meetingeval_overall=$orank, meetingeval_attitude=$arank, meetingeval_explain=$erank, meetingeval_helpful=$hrank, meetingeval_heading='$rhead', meetingeval_review='$rcomment'WHERE meetingeval_id='$rid'AND meetingeval_id='$meetingeval_student'"; 
                    $result = $mydb->query($sql);

                    while($row = mysqli_fetch_array($result)){
                        echo"<p>
                                Tutor Name: $tname 
                                Rating:$orank
                                <button><a href='AM_EditReview.php'>Edit</a></button>
                                <button onclick='deleteReview()'>Delete</button>
                                <br />
                                <u>$rhead</u>
                                <br />
                                $rcomment  
                            </p>";
                    }
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