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
    $err = false; 
    
    if(isset($_GET["rid"])){
        $rid=$_GET["rid"];
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
            <?php include('navStudent.php');?>

            <div class="wallpaper">
                <h1>Edit Review</h1>
                <br /> 
                <form method="post" action="AM_MyReviews.php" autocomplete="on">
                    <p>&emsp;
                        <input type = "hidden" name="rid" value = "<?php echo $rid;?>">
                        <label for="studentname">Your Name:</label>
                        <!-- input type="text" id="studentname" name="studentname" size="25" placeholder="Enter Your Name" autofocus required/ -->
                            <?php
                                require_once("db.php");
                                echo "<select id='studentname' name='studentname' value=".$sname.">";
                                $sql = "SELECT student_num, student_first, student_last FROM Student";
                                $result = $mydb->query($sql);

                                echo "<option value=''>Select Your Name</option>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<option value='".$row["student_num"]."'>".$row["student_first"]." ".$row["student_last"]."</option>";
                                }
                                echo "</select>";
                            ?>

                        </br>&emsp;
                        <label for="tutorname">Tutor Name:</label>
                        <!-- <select id='tutorname' name='tutorname' required>
                            <option value="">Select A Tutor</option> -->
                            <?php
                                require_once("db.php");
                                echo "<select id='tutorname' name='tutorname' value=".$tname.">";
                                $sql = "SELECT tutor_num, tutor_first, tutor_last FROM Tutor";
                                $result = $mydb->query($sql);

                                echo "<option value=''>Select A Tutor</option>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<option value='".$row["tutor_num"]."'>".$row["tutor_first"]." ".$row["tutor_last"]."</option>";
                                }
                                echo "</select>";
                            ?>

                        </br>&emsp;
                        <label>Overall Rating:</label>
                        <select name="overall" value="<?php echo $orank;?>">
                            <option selected></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>

                        </br>&emsp;
                        <label>Rate Features:</label>
                        </br>&emsp;&emsp;&emsp;
                        <label class = "subrank">Attutude:</label>
                        <select name="attitude" value="<?php echo $arank;?>">
                            <option selected></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                        
                        </br>&emsp;&emsp;&emsp;
                        <label class = "subrank">Explainability: </label>
                        <select name="explain" value="<?php echo $erank;?>">
                            <option selected></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                        
                        </br>&emsp;&emsp;&emsp;
                        <label class = "subrank">Helpfulness: </label>
                        <select name="help" value="<?php echo $hrank;?>">
                            <option selected></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                        
                        </br>&emsp;
                        <label>Review Heading:</label>
                        
                        </br>&emsp;&emsp;&emsp;
                        <textarea name="heading" rows="1" width ="1000" placeholder = "Enter title here." value="<?php echo $rhead;?>"></textarea>
                        
                        </br>&emsp;
                        <label>Review:</label>
                        
                        <br />&emsp;&emsp;&emsp;
                        <textarea name="comment" rows="10" width ="1000" plactholder = "Enter comments here." value="<?php echo $rcomment;?>"></textarea>
                        
                        </br>&emsp;&emsp;&emsp;
                        <input class = "button" type="submit" value="Submit" />
                        <input class = "button" type="reset" value="Clear" />
                    </p>
                </form>
            </div>
            <section>
                <footer>&copy; 1nfinite Loop 2021. Blacksburg, VA 24060</footer>
            </section>
        </div>
    </body>
</html>