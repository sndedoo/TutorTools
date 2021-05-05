<?php
global $tutorFirstNameSelected;
?>

<!DOCTYPE html>
<html>

<head>
    <title>Create/Vew tutor Review</title>
    <link rel="stylesheet" type="text/css" href="Webpages.css" />
    <script>
        var asyncRequest;

        function getContent() {
            var id = document.forms[0].firstNameSelected.value;
            var z = document.getElementById("contentArea");
            if (id == 0) {
                z.innerHTML = "";
            } else {
                try {
                    asyncRequest = new XMLHttpRequest(); //create request object

                    //register event handler
                    asyncRequest.onreadystatechange = stateChange;
                    var url = "graphCreation.php?id=" + id;
                    asyncRequest.open('GET', url, true); // prepare the request
                    asyncRequest.send(null); // send the request
                } catch (exception) {
                    alert("Request failed");
                }
            }
            function stateChange() {
                // if request completed successfully
                if (asyncRequest.readyState == 4 && asyncRequest.status == 200) {
                    document.getElementById("contentArea").innerHTML =
                        asyncRequest.responseText; // places text in contentArea
                }
            }
        }
    </script>
</head>

<body>
    <form>
        <select name="firstNameSelected" onchange="getContent()">
            <?php
            require_once("db.php");
            $sql = "SELECT Tutor_First FROM Tutor";
            $result = $mydb->query($sql);
            echo "<option id = 'tutorFirstNameSelected' value =''>" . 'Select A Tutor' . "</option>";
            while ($row = mysqli_fetch_array($result)) {
                $tutorFirstNameSelected = $row["Tutor_First"];
                echo "<option id = 'tutorFirstNameSelected' value ='$tutorFirstNameSelected'>" . $tutorFirstNameSelected . "</option>";
            }
            ?>
    </form>
    <div id="contentArea">&nbsp;</div>

</body>

</html>