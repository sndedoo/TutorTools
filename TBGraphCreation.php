<!doctype html>
<html>

<head>
    <title>Graphs</title>
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


    <?php
    $id = 0;
    if (isset($_GET['id'])) $id = $_GET['id'];

    require_once("db.php");

    $sql = "SELECT Tutor_First, Tutor_Last FROM tutor WHERE Tutor_First=" . $id;
    $result = $mydb->query($sql);

    if ($row = mysqli_fetch_array($result)) {
        echo "Your Tutor name is " . $row["Tutor_First"] . " " . $row["Tutor_Last"];
    } else {
        echo "Your Tutor name cannot be found.";
    }

    ?>

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

d3.json("TBgetData.php", function(error, data){
  if(error) throw error;

  data.forEach(function(d){
    d.letter = d.hireyear;
    d.frequency = +d.empCount;
  })

  console.log(data);

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

</body>

</html>