<!doctype html>
<html>

<head>
    <title>PHP Ajax</title>
    <script>
        var asyncRequest;

        function getContent() {
            var id = document.forms[0].supplierid.value;
            var z = document.getElementById("contentArea");
            if (id == 0) {
                z.innerHTML = "";
            } else {
                try {
                    asyncRequest = new XMLHttpRequest(); //create request object

                    //register event handler
                    asyncRequest.onreadystatechange = stateChange;
                    var url = "TBGraphCreation";
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
        <select name="supplierid" onchange="getContent()">
            <option value="">Select a supplier ID</option>
            <option value="Senya">Senya</option>
            <option value="2">Cam</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
    </form>
    <div id="contentArea">&nbsp;</div>
</body>

</html>