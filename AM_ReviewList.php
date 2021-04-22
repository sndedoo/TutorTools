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
        <meta descriptions="This page allows a student to create a review for a tutor">
    </head>

    <body>
        <div class="container-fluid">
            <!--navigation bar-->

            <h1>Review List</h1> 

            <br />
            <h3>Search for a Tutor/Student</h3>
            <div class="search-container">
                <form action="/action_page.php">
                  <input type="text" placeholder="Search..." name="search">
                  <button type="submit">Search</button>
                  <button><a href="Allie-reviewAnalysis.php">Average Ranking</a></button>
                </form>
            </div>

            <br />
            <div class="review">
                <?php
                    $tsearch = "";
                    if(isset($_POST["search"])) $tsearch=$_POST["search"];

                    require_once("db.php");

                    $sql = "SELECT * FROM meetingevaluation WHERE MeetingEval_tutor=$tsearch"; 
                    $result = $mydb->query($sql);
                    
                    while($row = mysqli_fetch_array($result)){
                        echo"<p>
                                Tutor Name: $tname 
                                Rating:$orank
                                <br />
                                <u>$rhead</u>
                                <br />
                                $rcomment  
                            </p>";
                    }
                ?>
            </div>
        </div>
    </body>
</html>