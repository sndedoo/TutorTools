<?php
  require_once("db.php");
  $issueid = '';
  if(isset($_GET['issueID'])) $issueid = $_GET['issueID'];
  $sql = "select COUNT(issue_id) as 'Total_Issues', date_format(Issue_Date, '%d') as 'Days' from Issue 
            Group by date_format(Issue_Date, '%d')"
            ;
  $result = $mydb->query($sql);

  $data = array();
  for($x=0; $x<mysqli_num_rows($result); $x++) {
    $data[] = mysqli_fetch_assoc($result);
  }

  echo json_encode($data);
 ?>
