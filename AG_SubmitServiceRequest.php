<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Service Request Submissiont</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <script src="jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <meta author="Alejandro Gonzales">

    <link rel="stylesheet" href="Webpages.css"/>
</head>
<body>
    <?php include('navStudent.php');?>

    <h1 style="text-align: left; ">All Appointments</h1>
    <br/>

    <script>
    //ajax in jQuery
    $(function(){
      $("#Meet_Time").change(function(){
        $.ajax({
          url:"AG_ServicesDB.php?id=" + $("#Meet_Time").val(),
          async:true,
          success: function(result){
            $("#contentArea").html(result);
          }
        })
      })
    })
	</script>

<label> Submit Service Request (Meeting ID): &nbsp;&nbsp;
    <select name="Meet_Time" id="Meet_Time">
      <?php
        require_once("db.php");
        $sql = "SELECT Meet_ID FROM meeting ORDER BY Meet_ID";
        $result = $mydb->query($sql);

        while($row=mysqli_fetch_array($result)){
          echo "<option value='".$row["Meet_ID"]."'>".$row["Meet_ID"]."</option>";
        }
      ?>
    </select>
  </label>
  <div id="contentArea">&nbsp;</div>

    <form action="AG_ModifyCancelRequest.php#service">
      <input type="submit" name="Meet_Time" value="Submit Request"/>
    </form>

    <?php
    $sql = "SELECT Meet_ID, Meet_Time, Meet_Location, Concat(Format(Stu_Payment,2)) AS 'Stu_Payment'
            FROM meeting";
    $result = $mydb->query($sql);

    echo "<div class='wallpaper'>
    <table class='table table-hover' border='1'>
    <thead><tr>
    <th>Meeting ID</th>
    <th>Meeting Time</th>
    <th>Meeting Location</th>
    <th>Student Payment</th>
    </tr></thead>";

    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>".$row["Meet_ID"]."</td><td>".$row["Meet_Time"]."</td><td>".$row["Meet_Location"]."</td><td>"."$".$row["Stu_Payment"]."</td>";
        echo "</tr>";
    }
        echo "</table></div>";
    ?>
    </div>
</body>
</html>
