<!DOCTYPE HTML>
<html>
    <head>
        <title>Tutor Reviews</title>
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
        <meta descriptions="This page allows a student to create a review for a tutor">
        <script src="jquery-3.1.1.min.js"></script>
        <script>
            //default event handler
            $(function(){
                $("#search").change(function(){
                    var id = $('#search').val();
                    if(id==0){
                        $("#contentArea").html("");
                    } else {
                        $.ajax({
                            url:"AM_TutorDisplay.php?id="+id,
                            async:true,
                            success: function(result){
                                $("#contentArea").html(result);
                            }
                        })
                    }
                });
            })
        </script>
        </head>
    </head>

    <body>
        <div class="container-fluid">
            <!--navigation bar-->
            <?php include('navTutor.php');?>

            <div class="wallpaper">                
                <h1>Reviews About Me</h1><br />
                <p>Find Your Name</p>
                <form method="get" action="AM_TutorDisplay.php">
                    <?php
                        require_once("db.php");
                        
                        //display the product recod in a table format
                        echo "<select name='tutor_num' id='search'>";

                        $sql = "SELECT tutor_num, tutor_first, tutor_last FROM Tutor";
                        $result = $mydb->query($sql);
                        echo "<option value='0'>All Tutors</option>";
                        
                        //else statement test
                        //echo "<option value='5'>5</option>";
                        
                        //$result should be a resultset
                        while($row = mysqli_fetch_array($result)){
                            echo "<option value='".$row["tutor_num"]."'>".$row["tutor_first"]." ".$row["tutor_last"]."</option>";
                        }
                        echo "</select>";
                        echo "<button><a href='AM_TutorAnalysis.php'>Ranking Comparison</a></button>";
                    ?>
                </form>
                <div id="contentArea">&nbsp;</div>
            </div>
        </div>
    </body>
</html>