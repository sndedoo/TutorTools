<?php
    include('SD_container.php');
    if (isset($_GET['firstName']))
    {
        require_once("db.php");
        $firstname = $_GET['firstName'];
        $sql = "SELECT * FROM student WHERE Student_First='$firstname'";
        
        $result = $mydb->query($sql);
        
        if ($result->num_rows > 0) {
            
            if($row = $result->fetch_assoc()) {
                echo '<h1>'.$row["Student_First"]."'s Profile</h1>";
                echo '<table>';
                echo '<tr><td>Student_Last:</td><td>'.$row["Student_Last"].'</td></tr>';
                echo '<tr><td>Student_GradYr:</td><td><img src="'.$row["Student_GradYr"].'" width="100px" /></td></tr>';
                echo '<tr><td>Student_First:</td><td>'.$row["Student_First"].'</td></tr>';
                echo '<tr><td>Student_Last:</td><td>'.$row["Student_Last"].'</td></tr>';
                echo '<tr><td>Student_Email:</td><td>'.$row["Student_Email"].'</td></tr>';
            }
            echo '</table>';
        }
        else {
           echo "0 results";
        }
    }
    else {
        

        require_once("db.php");
        echo '<h2>All our members:</h2>';

        $sql = "SELECT * FROM student";
        
        $result = $mydb->query($sql);
        
        if ($result->num_rows > 0) {
   
            while($row = $result->fetch_assoc()) {
                
                echo '<hr />';
                echo '<table>';
                echo '<tr><td>Student_Num:</td><td>'.$row["Student_Num"].'</td></tr>';
                echo '<tr><td>Student_Email:</td><td><img src="'.$row["Student_Email"].'" width="100px" /></td></tr>';
                echo '<tr><td>Student_First:</td><td>'.$row["Student_First"].'</td></tr>';
                echo '<tr><td>Student_Last:</td><td>'.$row["Student_Last"].'</td></tr>';
                echo '<tr><td>State:</td><td>'.$row["State"].'</td></tr>';
                echo '</table>';
                
            }
        }
        else {
           echo "0 results";
        }
    }
?>