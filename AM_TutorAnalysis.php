<!DOCTYPE html>
<html>
    <head>
        <title>Review Analysis</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="Webpages.css" />
        <link rel="stylesheet" type="text/css" href="AM_Form.css" />
        <script src="jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="myScripts.js"></script>
        <meta author="Allie Ahwee-Marrah">
        <meta descriptions="This page allows a student to create a review for a tutor">
        <meta charset="utf-8">
        <style>
        .bar {
        fill: steelblue;
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
        <div class="container-fluid">
            <!--navigation bar-->
            <?php include('navStudent.php');?>
            
            <div class="wallpaper">
                <h1>Review Analysis</h1><br />
                <p>Click Here to View Reviews <button><a href='AM_TutorReviews.php'>Review List</a></button></p>
                
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

                // d3.tsv("data.tsv", function(d) {
                //   d.frequency = +d.frequency;
                //   console.log(d);
                //   return d;

                <?php
                $tutorid=0;
                if(isset($_GET['tutor_num'])) $tutorid=$_GET['tutor_num'];
                ?>

                d3.json("AM_GetData.php?tid=<?php echo $tutorid;?>", function(error, data){
                if(error) throw error;

                data.forEach(function(d){
                    d.letter = d.tutorname;
                    d.frequency = +d.overall;
                })

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
        </div>
    </body>
</html>
