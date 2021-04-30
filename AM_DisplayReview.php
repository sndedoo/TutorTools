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
            $id = 0;
        
            if(isset($_GET['id'])) $id=$_GET['id'];
            if(isset($_POST["rid"])) $rid=$_POST["rid"];
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

            if($rid == "") {
                $sql = "INSERT INTO meetingevaluation(tutor_num, student_num, meetingeval_overall, meetingeval_attitude, meetingeval_explain, meetingeval_helpful, meetingeval_heading, meetingeval_review) VALUES ('$tname', '$sname', '$orank', '$arank', '$erank', '$hrank', '$rhead', '$rcomment')"; 
                $result = $mydb->query($sql);

                $sql2="SELECT CONCAT(tutor_first, ' ', tutor_last) AS 'tutorname', meetingeval_overall, meetingeval_attitude, meetingeval_helpful, meetingeval_explain, meetingeval_heading, meetingeval_review FROM tutor t, meetingevaluation m WHERE t.tutor_num=m.tutor_num";
                $result2 = $mydb->query($sql2);

                while($row=mysqli_fetch_array($result2)){
                    //fix variables
                    echo"<tr><td><br /><b>Tutor Name: </b><u>".$row['tutorname']."</u>
                        <b>&emsp;Overall Rating: </b><u>".$row['meetingeval_overall']."</u>
                        &emsp;<button><a href='AM_EditReview.php?rid=".$row['meetingeval_id']."'>Edit</a></button>
                        
                        <button><span class='delete' data-id='<?= $rid; ?>'>Delete</span></button>
                        <br />&emsp;Attitude: <u>".$row['meetingeval_attitude']."</u>
                        &nbsp;Explainability: <u>".$row['meetingeval_explain']."</u>
                        &nbsp;Helpfulness: <u>".$row['meetingeval_helpful']."</u>
                        <br />&emsp;<u>".$row['meetingeval_heading']."</u>
                        <br />&emsp;".$row['meetingeval_review']."</td></tr>";
                } echo "</tbody></table>";
            } else {
                $sql = "UPDATE meetingevaluation SET tutor_num='$tname', meetingeval_overall='$orank', meetingeval_attitude='$arank', meetingeval_explain='$erank', meetingeval_helpful='$hrank', meetingeval_heading='$rhead', meetingeval_review='$rcomment' WHERE meetingeval_id='$rid'"; 
                //echo $sql;
                $result = $mydb->query($sql);
                
                $sql2="SELECT CONCAT(tutor_first, ' ', tutor_last) AS tutorname, meetingeval_overall, meetingeval_attitude, meetingeval_helpful, meetingeval_explain, meetingeval_heading, meetingeval_review, meetingeval_id FROM tutor t, meetingevaluation m WHERE t.tutor_num=m.tutor_num";
                $result2 = $mydb->query($sql2);

                while($row=mysqli_fetch_array($result2)){
                    //fix variables
                    echo"<tr><td><br /><b>Tutor Name: </b><u>".$row['tutorname']."</u>
                        <b>&emsp;Overall Rating: </b><u>".$row['meetingeval_overall']."</u>
                        &emsp;<button><a href='AM_EditReview.php?rid=".$row['meetingeval_id']."'>Edit</a></button>
                        
                        <button><span class='delete' data-id='<?echo=$rid ?>'>Delete</span></button>
                        <br />&emsp;Attitude: <u>".$row['meetingeval_attitude']."</u>
                        &nbsp;Explainability: <u>".$row['meetingeval_explain']."</u>
                        &nbsp;Helpfulness: <u>".$row['meetingeval_helpful']."</u>
                        <br />&emsp;<u>".$row['meetingeval_heading']."</u>
                        <br />&emsp;".$row['meetingeval_review']."</td></tr>";
                } echo "</tbody></table>";
            }
        ?>

        <script>
            $(document).ready(function(){
                // Delete 
                $('.delete').click(function(){
                    var el = this;
                    
                    // Delete id
                    //var deleteid = $(this).data('rid');
                    var deleteid = 10; //$row['meetingeval_id'];
                    //var deleteid = $row['meetingeval_id'];

                    var confirmalert = confirm("Are you sure you want to delete this review? Meetingeval_id=".concat(deleteid.toString()));
                    if (confirmalert == true) {
                        // AJAX Request
                        console.log('test1');
                        $.ajax({
                            url: 'AM_DeleteReview.php',
                            type: 'POST',
                            data: { rid:deleteid },
                            success: function(response){
                                if(response == 1){
                                    // Remove row from HTML Table
                                    $(el).closest('tr').css('background','tomato');
                                    $(el).closest('tr').fadeOut(800,function(){
                                        $(this).remove();
                                });
                                }else{
                                    alert('Invalid ID.');
                                }
                            }
                        });
                    }
                });
            });
        </script>
    </body>
</html>