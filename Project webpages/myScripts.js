
//"tbeamon@vt.edu" will be changed to whatever email is used on the specific page
function signUp(clickedId) {
    var test;
    var locationPrompt = prompt("Please identify a location to meet:");
    var signUpPrompt = confirm("By selecting yes an email will be sent to the tutor confirming the time and location");
    console.log(signUpPrompt);
    if (signUpPrompt == true) {
        console.log(signUpPrompt);
        test = $("#emailTutor").click();
        console.log(test);
    }
    console.log(test);

    var count = 0;
    console.log(signUpPrompt);



    console.log(locationPrompt);

    if (signUpPrompt == true) {
        function addRow() {
            console.log(clickedId);
            var table = document.getElementById("myTable");
            console.log(table);
            var row = table.insertRow(0);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            cell1.innerHTML = "available time " + clickedId;
            cell2.innerHTML = locationPrompt;
        }

    }

    console.log(count);

}

