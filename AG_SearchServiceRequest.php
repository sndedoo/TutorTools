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
   <?php include('navTutor.php');?>

   <h1 style="text-align: left;">Search Existing Appointments</h1>
   <p>Here you can view all appointments and can search for appointments based on location.</p>
   <br/>
   <h2>All Appointments</h2>

    <!---------------------------------------------------------------------------->
        <script>
        //ajax in jQuery
        $(function(){
        $("#productDropDown").change(function(){
            $.ajax({
            url:"AG_ServicesDB.php?id=" + $("#productDropDown").val(),
            async:true,
            success: function(result){
                $("#contentArea").html(result);
            }
            })
        })
        })
        </script>

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

            <p>Search for appointment based on location: <input type="text" placeholder="Location..." name="Location"/>
            <input type="submit" name="Submit" value="View"/></p>

        <?php
            //Code that pulls up rows relating to the search the user makes. 
        ?>
        
        <div id="contentArea">&nbsp;</div>
    <!----------------------------------------------------------------------------------->
    <?php
    $id = 0;
    if(isset($_GET['id'])) $id=$_GET['id'];

    require_once("db.php");

    $sql = "";
    if($id==0)
        $sql ="SELECT Meet_ID, Meet_Time, Meet_Location, Concat(Format(Stu_Payment,2)) AS 'Stu_Payment' FROM meeting";
    else {
        $sql ="SELECT * FROM meeting WHERE Meet_Time=".$id;
    }
    $result = $mydb->query($sql);

    echo "<div class='wallpaper'>";
    echo "<table class='table table-hover' border='1'>";
    echo "<thead>";
    echo "<th>Meeting ID</th><th>Meeting Time</th><th>Meeting Location</th><th>Student Payment</th>";
    echo "</thead>";

    while($row = mysqli_fetch_assoc($result)){

    echo "<tr>";
    echo "<td>".$row['Meet_ID']."</td>";
    echo "<td>".$row['Meet_Time']."</td>";
    echo "<td>".$row['Meet_Location']."</td>";
    echo "<td>"."$".$row['Stu_Payment']."</td>"; 
    echo "</tr>";
    }
    ?>
</div>
</body>
</html>
