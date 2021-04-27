
<?php 
//display all users
require_once("db.php");
$sql = "SELECT * FROM student";
$result = $mydb->query($sql);

if ($result->num_rows > 0) {
    echo '<table>';
    while($row = $result->fetch_assoc()) {
        $firstname = $row["Student_First"];
        echo '<tr><td><a class="btn" href="SD_profiles.php?firstName='.$firstname.'">'.$firstname.'</a><br /></td></tr>';
    }
    echo '</table>';
}
else {
    echo "No people found";
}
?>
