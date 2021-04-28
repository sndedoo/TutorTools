<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="Webpages.css" />
    <script src="jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="myScripts.js"></script>
    <style>
        table tr td {
            text-align: left;
            margin-left: 1em;
        }
    </style>
</head>
<body>
                <h2>Profile</h2>";
                <table class="table">';
                <tr><td>Email:</td><td>'.$row["Student_Email"].'</td></tr>';
                <tr><td>City:</td><td>'.$row["City"].'</td></tr>';
                <tr><td>State:</td><td>'.$row["State"].'</td></tr>';
                <tr><td>Biography:</td><td>'.$row["About_Me"].'</td></tr>';
                <tr><td>Birthday:</td><td>'.$row["birthday"].'</td></tr>';
                <tr><td>Graduation Year:</td><td>'.$row["Student_GradYr"].'</td></tr>';
                <tr><td>Gender:</td><td>'.$row["gender"].'</td></tr>';
                // <tr><td>Firstname:</td><td>'.$row["Student_First"].'</td></tr>';
                // <tr><td>Lastname:</td><td>'.$row["Student_Last"].'</td></tr>';
                // <tr><td>Email:</td><td>'.$row["Student_Email"].'</td></tr>';
                </table>';
                <hr />';
</body>
</html>