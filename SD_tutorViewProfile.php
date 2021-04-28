<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="Webpages.css" />
    <script src="jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="myScripts.js"></script><script>
      var clickCount =1;
      //default event handler
      $(function(){
        $("#img0").click(function(){
          //get content from the server using XMLHttpRequest
          if(clickCount % 2 ==1) {
            $.ajax({
              url:"SD_viewTutorAjax.php",
              async:true,
              success: function(result){
                $("#contentArea").html(result);
              }
            })
          } else {
            $("#contentArea").html("");
          }
          clickCount++;
        });
      })
    </script>
  </head>

  <body>
    <?php include('navTutor.php');?>
    <img id="img0" src="click.jpg" />
    <br /><br />
    <div id="contentArea">&nbsp;</div>
  </body>
</html>