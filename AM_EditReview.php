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
    $err = false; 
       
    if (isset($_POST["submit"])) {
        if(isset($_POST["id"])) $rid=$_POST["id"];
        if(isset($_POST["studentname"])) $sname=$_POST["tutorname"];
        if(isset($_POST["tutorname"])) $tname=$_POST["tutorname"];
        if(isset($_POST["overall"])) $orank=$_POST["overall"];
        if(isset($_POST["attitude"])) $arank=$_POST["attitude"];
        if(isset($_POST["explain"])) $erank=$_POST["explain"];
        if(isset($_POST["help"])) $hrank=$_POST["help"];
        if(isset($_POST["heading"])) $rhead=$_POST["heading"];
        if(isset($_POST["comment"])) $rcomment=$_POST["comment"];
        if(!empty($tname) && !empty($sname) && !empty($rhead) && !empty($rcomment)) {
            header("HTTP/1.1 307 Temprary Redirect"); 
            header("Location: AM_MyReviews.php");
        } else {
            $err = true;
        }
    }
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Edit Review</title>
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
            <div class="wallpaper">
                <h1>Edit Review</h1> 
                <br />
                <form align = left method="post" action="AM_myReviews.php" autocomplete="on">
                    <input type="hidden" name="department" value="BIT" />
                    
                    <p>&emsp;
                        <input type="hidden" id="id" name="id" size="25"/>
                        <label for="studentname">Your Name:</label>
                        <input type="text" id="studentname" name="studentname" size="25" placeholder="John Doe" autofocus required/>

                        </br>&emsp;
                        <label for="tutorname">Tutor Name:</label>
                        <input type="text" id="tutorname" name="tutorname" size="25" placeholder="John Doe" required/>

                        </br>&emsp;
                        <label>Overall Rating:</label>
                        <select name="overall">
                            <option selected>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>

                        </br>&emsp;
                        <label>Rate Features:</label>
                        </br>&emsp;&emsp;&emsp;
                        <label class = "subrank">Attutude:</label>
                        <select name="attitude">
                            <option selected>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                        
                        </br>&emsp;&emsp;&emsp;
                        <label class = "subrank">Explainability: </label>
                        <select name="explain">
                            <option selected>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>

                        </br>&emsp;&emsp;&emsp;
                        <label class = "subrank">Helpfulness: </label>
                        <select name="help">
                            <option selected>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>

                        </br>&emsp;
                        <label>Review Heading:</label>

                        </br>&emsp;&emsp;&emsp;
                        <input class = "reviewhead" name="heading" type="text" size="25" />

                        </br>&emsp;
                        <label>Review:</label>

                        <br />&emsp;&emsp;&emsp;
                        <textarea name="comment" rows="10" width ="1000">Enter comments here.</textarea>

                        </br>&emsp;&emsp;&emsp;
                        <input class = "button" type="submit" value="Submit" />
                        <a href="AM_MyReviews.php"><input type="button" value="Cancel" /></a>
                    </p>
                </form>
            </div>

            <section>
                <footer>&copy; 1nfinite Loop 2021. Blacksburg, VA 24060</footer>
            </section>
        </div>
    </body>
</html>