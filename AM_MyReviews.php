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
        <script>
            //default event handler
            $(function(){
                $("#search").change(function(){
                    var id = $('#search').val();
                    if(id==0){
                        $("#contentArea").html("");
                    } else {
                        $.ajax({
                            url:"AM_DisplayReview.php?id="+id,
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
    <body>
    <div class="container-fluid">
            <!--navigation bar-->
            <?php include('navStudent.php');?>

            <div class="wallpaper">                
                <h1>My Reviews</h1><br />
                <p>Select Your Name</p>
                <form method="get" action="AM_DisplayReviews.php">
                    <?php
                        require_once("db.php");
                        
                        //display the product recod in a table format
                        echo "<select name='student_num' id='search'>";

                        $sql = "SELECT student_num, student_first, student_last FROM student";
                        $result = $mydb->query($sql);
                        echo "<option value='0'>All students</option>";
                        
                        //else statement test
                        //echo "<option value='5'>5</option>";
                        
                        //$result should be a resultset
                        while($row = mysqli_fetch_array($result)){
                            echo "<option value='".$row["student_num"]."'>".$row["student_first"]." ".$row["student_last"]."</option>";
                        }
                        echo "</select>";
                    ?>
                </form>
                <div id="contentArea">&nbsp;</div>
            </div>
        </div>
    </body>
</html>