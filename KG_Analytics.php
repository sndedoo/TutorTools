<!DOCTYPE html>
<html>
<head>
    <title> Issue Analytics </title>
    <meta charset = "utf-8"/>
    <meta author = "Kirk Graham"/>

    <link rel = "stylesheet" href = "css/style.css" type = "text/css"/>
    <link rel = "stylesheet" href = "css/box.css" type = "text/css"/>
        
    <link rel="preconnect" href="https://fonts.gstatic.com"/>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&display=swap" rel="stylesheet"/>

    <link href= "css/bootstrap.min.css" rel = "stylesheet" />
    <link rel="stylesheet" type="text/css" href="Webpages.css" />
    <link rel="stylesheet" type="text/css" href="KG_table.css"/>
    <script src = "jquery-3.1.1.min.js"></script>
    <script src = "js/bootstrap.min.js"></script>
    <style>

        .bar {
        fill: maroon;
        }

        .bar:hover {
        fill: brown;
        }

        .axis--x path {
        display: none;
        }

        </style>
</head>
    <body>
        <div class = "container-fluid">
        <?php include('navEmp.php');?>
            <div class = "wallpaper">
                <h1>Total Issues by Day of Month</h1>
            <svg width="960" height="500"></svg>
            <script src="https://d3js.org/d3.v4.min.js"></script>
            <script>









                    var svg = d3.select("svg"),
                        margin = {top: 20, right: 20, bottom: 30, left: 40},
                        width = +svg.attr("width") - margin.left - margin.right,
                        height = +svg.attr("height") - margin.top - margin.bottom;

                    var x = d3.scaleBand().rangeRound([0, width]).padding(0.1),
                        y = d3.scaleLinear().rangeRound([height, 0]);
                        console.log(y(3));

                    var g = svg.append("g")
                        .attr("transform", "translate(" + margin.left + "," + margin.top + ")");
            
            //specify our data source
            /*
            d3.tsv("data.tsv", function(d) {
            d.frequency = +d.frequency;
            return d;
            }, function(error, data) {
            */

            //Display barchart
            //Get selected supplier id from index
            //revise Get data page to get data fr that supplier
                <?php 

                $issueid = 0;
                    if(isset($_GET['issueID'])) $issueid = $_POST('issueID');
                ?>



            //Get json data
            d3.json("KG_GetData.php?issueid=" + <?php echo $issueid;?>, function(error, data){
            if(error) throw error;

            data.forEach(function(d){
                d.letter = d.Days;
                d.frequency = +d.Total_Issues;
            })

            

            if (error) throw error;

            x.domain(data.map(function(d) { return d.letter; }));
            y.domain([0, d3.max(data, function(d) { return d.frequency; })]);

            g.append("g")
                .attr("class", "axis axis--x")
                .attr("transform", "translate(0," + height + ")")
                .call(d3.axisBottom(x));

            g.append("g")
                .attr("class", "axis axis--y")
                .call(d3.axisLeft(y).ticks(4, "s"))
                .append("text")
                .attr("transform", "rotate(-90)")
                .attr("y", 6)
                .attr("dy", "0.71em")
                .attr("text-anchor", "end")
                .text("Frequency");

            g.selectAll(".bar")
                .data(data)
                .enter().append("rect")
                .attr("class", "bar")
                .attr("x", function(d) { return x(d.letter); })
                .attr("y", function(d) { return y(d.frequency); })
                .attr("width", x.bandwidth())
                .attr("height", function(d) { return height - y(d.frequency); });
            });

            </script>
            
        </div>
        <input type = "button" onclick = "parent.location='KG_issuetable.php'" value = 'Back'>
        </div>
    </body>
</html>
