<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Service Details & Analytics</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <script src="jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://d3js.org/d3.v4.min.js"></script>

    <!--Module 3 style sheet link-->
    <link rel="stylesheet" href="Webpages.css"/>
</head>
<body>
    <?php include('navTutor.php');?>
   

    <div class="inline">
    <p>
        List of selected service requests *admin* <br />
        Here the tutor can look up a service request made by the user by looking for their meeting id
        <br>
        <br>
        List is grouped by: Name, Tutor, Status, Service / Area and Service Request / Update
    </p>
    </div>

    <?php include('AG_Analysis.html')?>

</script>
    </div>
</body>
</html>

