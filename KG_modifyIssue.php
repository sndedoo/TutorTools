<!DOCTYPE html>
<html>
    <head>
        <title> Modify Issue </title>
        <meta charset = "utf-8"/>
        <meta author = "Kirk Graham"/>

        <link rel = "stylesheet" href = "CSS/style.css" type = "text/css"/>
        <link rel = "stylesheet" href = "CSS/box.css" type = "text/css"/>
        
        <link rel="preconnect" href="https://fonts.gstatic.com"/>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&display=swap" rel="stylesheet"/>

        <link href= "CSS/bootstrap.min.css" rel = "stylesheet" />
        
        <script src = "jquery-3.1.1.min.js"></script>
        <script src = "js/bootstrap.min.js"></script>
        
        <style>
            .border{
                border: 1px solid black;
            }
            .auto{
                margin: auto;
            }

        </style>
    </head>

    <body>
        <nav class="navbar navbar-inverse">
        
        
            <div class="container-fluid">
                <div class="navbar-header">
                    <img src = "Image/download.png"/>
                </div>
    
                <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Page 1</a></li>
                <li><a href="#">Page 2</a></li>
                <li><a href="#">Page 3</a></li>
                </ul>
            </div>
        </nav>


        <form method = "POST" action = "mailto:kirkgraham1@gmail.com" enctype="multipart/form-data" name = "emailForm"
        autocomplete="on">
            <div class = "border container-fluid">
                <div class = "row text-center ">
                    <div class = "col-sm-6 auto" style = width:50%>
                        <label>Name:
                            <input name = "name" type = "text" size = "25" required autofocus/>
                        </label>
                    </div>
                    
                    <div class = "col-sm-6 auto" style = width:40%>
                        <p id = "priority" >
                            <label>Priority:
                                <select name = "priority">
                                    <option selected>Low</option>
                                    <option>Medium</option>
                                    <option>High</option>
                                </select>
                            </label>
                        </p>
                    </div>
                    

                    
                </div>   

                <div class = "row border"> 
                    <div class = "col-sm-6 auto" style = width:50%>
                        <label>Deadline:  
                            <input name = "deadline" type = "date" />
                        </label>
                    </div>
                    
                    <div class = "col-sm-6 auto" style = width:40%>
                        <p id = "status">
                            <label>Status:
                                <select name = "status">
                                    <option selected>Not Started</option>
                                    <option>Complete</option>
                                    <option>In Progess</option>
                                </select>
                            </label>
                        </p>
                    </div>
            </div>
                <div class = "row">
                    <div>
                        <label id ="User" style = margin-top:20px>
                            User Input Description
                        </label>
                        <textarea name="user-desc" rows="10" cols="50">
                        </textarea>
                    </div>
                    

                    
                </div>
                <div>
                    <input id = "sub-button" name = "submit" type = "submit" value = "Modify">
                    <input type = "button" onclick = "parent.location='KG_issuetable.php'" value = 'Back'>
                    
            </form>
                </div>
        </div>
        
        
        </form>


    </body>

</html>