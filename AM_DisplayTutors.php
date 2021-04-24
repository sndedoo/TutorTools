<!doctype html>
  <html>
    <head>
      <title>Tutor Reviews</title>
      <style>
        td, th {
          text-align: left;
        }
      </style>
    </head>
    <body>
      <?php
        $id = 0;
        
        if(isset($_GET['id'])) $id=$_GET['id'];
        require_once("db.php");
        echo "<table><thead><tr><th></th></thead><tbody>";

        //$sql="SELECT CONCAT(tutor_first, ' ', tutor_last) AS TutorName FROM tutor WHERE tutor_num=".$id.;
        //$sql="SELECT CONCAT(tutor_first, ' ', tutor_last) AS TutorName FROM tutor INNER JOIN MeetingEvaluation ON MeetingEval.Tutor_Num = Tutor.Tutor_Num WHERE tutor_num=".$id;
        $sql="SELECT CONCAT(tutor_first, ' ', tutor_last) AS tname, meetingeval_overall, meetingeval_attitude, meetingeval_helpful, meetingeval_explain, meetingeval_heading, meetingeval_review FROM tutor t, meetingevaluation m WHERE t.tutor_num=m.tutor_num AND m.tutor_num=".$id;
        $result = $mydb->query($sql);

        while($row=mysqli_fetch_array($result)){
          echo"<tr><td><br /><b>Tutor Name: </b><u>".$row["tname"]."</u>
              <b>&emsp;Overall Rating: </b><u>".$row["meetingeval_overall"]."</u>
              <br />&emsp;Attitude: <u>".$row["meetingeval_attitude"]."</u>
              &nbsp;Explainability: <u>".$row["meetingeval_explain"]."</u>
              &nbsp;Helpfulness: <u>".$row["meetingeval_helpful"]."</u>
              <br />&emsp;<u>".$row["meetingeval_heading"]."</u><br />
              &emsp;".$row["meetingeval_review"]."</td></tr>";
        } echo "</tbody></table>";
        /* while($row=mysqli_fetch_array($result)){
          echo"<tr><td><br /><b>Tutor Name: </b><u>".$row["tname"]."</u>
              <b> Rating: </b><u>".$row["meetingeval_overall"]."</u>
              <br />&emsp;<u>".$row["meetingeval_heading"]."</u><br />&emsp;"
              .$row["meetingeval_review"]."</td></tr>";
        } echo "</tbody></table>"; */
      ?>
    </body>
  </html>
  