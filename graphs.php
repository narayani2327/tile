<?php
    include('connection.php'); 
?>
<html>
  <head>
    <link rel="stylesheet" href="home.css">
    <link rel="icon" href="./images/logo.jpg">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['type', 'count'],
          <?php
            $sql="select type,count(type) from sales group by type";
            $fire=mysqli_query($con,$sql);
            while($result=mysqli_fetch_assoc($fire)){
                echo"['".$result['type']."',".$result['count(type)']."],";
            }
          ?>
        ]);
        var options = {
          title: 'Type sales graph'
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
      google.charts.setOnLoadCallback(drawCha);
      function drawCha() {
        var dat = google.visualization.arrayToDataTable([
          ['size', 'count'],
          <?php
            $sql="select size,count(size) from sales group by size";
            $fire=mysqli_query($con,$sql);
            while($result=mysqli_fetch_assoc($fire)){
                if($result['size']!="NULL")
                echo"['".$result['size']."',".$result['count(size)']."],";
            }
          ?>
        ]);
        var optio = {
          title: 'Size sales graph'
        };
        var cha = new google.visualization.PieChart(document.getElementById('piech'));
        cha.draw(dat, optio);
      }
      google.charts.setOnLoadCallback(drawCh);
      function drawCh() {
        var da = google.visualization.arrayToDataTable([
          ['name', 'count'],
          <?php
            $sql="select name,count(name) from sales group by name";
            $fire=mysqli_query($con,$sql);
            while($result=mysqli_fetch_assoc($fire)){
                if($result['name']!="NULL")
                echo"['".$result['name']."',".$result['count(name)']."],";
            }
          ?>
        ]);
        var optio = {
          title: 'Name sales graph'
        };
        var ch = new google.visualization.PieChart(document.getElementById('piec'));
        ch.draw(da, optio);
      }
      google.charts.setOnLoadCallback(draww);
      function draww() {
        var DATA = google.visualization.arrayToDataTable([
          ['type', 'count'],
          <?php
            $sql="select material,count(material) from sales group by material";
            $fire=mysqli_query($con,$sql);
            while($result=mysqli_fetch_assoc($fire)){
                if($result['material']!="NULL")
                echo"['".$result['material']."',".$result['count(material)']."],";
            }
          ?>
        ]);
        var opti = {
          title: 'Material of taps sales graph'
        };
        var chara = new google.visualization.PieChart(document.getElementById('pie'));
        chara.draw(DATA, opti);
      }
      google.charts.setOnLoadCallback(draw);
      function draw() {
        var datta = google.visualization.arrayToDataTable([
          ['type', 'count'],
          <?php
            $sql="select color,count(color) from sales group by color";
            $fire=mysqli_query($con,$sql);
            while($result=mysqli_fetch_assoc($fire)){
                if($result['color']!="NULL")
                echo"['".$result['color']."',".$result['count(color)']."],";
            }
          ?>
        ]);
        var opti = {
          title: 'Color of sanitary sales graph'
        };
        var charr = new google.visualization.PieChart(document.getElementById('piecha'));
        charr.draw(datta, opti);
      }
      google.charts.setOnLoadCallback(drawC);
      function drawC() {
        var datta = google.visualization.arrayToDataTable([
          ['shape', 'count'],
          <?php
            $sql="select shape,count(shape) from sales group by shape";
            $fire=mysqli_query($con,$sql);
            while($result=mysqli_fetch_assoc($fire)){
                if($result['shape']!="NULL")
                echo"['".$result['shape']."',".$result['count(shape)']."],";
            }
          ?>
        ]);
        var optionna = {
          title: 'Shape of sanitary sales graph'
        };
        var c = new google.visualization.PieChart(document.getElementById('pi'));
        c.draw(datta, optionna);
      }
    </script>
  </head>
  <body>
    <h1>Graphs</h1>
    <div class="graph">
        <div id="piechart"></div>
        <div id="piech"></div>
        <div id="piec"></div>
        <div id="pie"></div>
        <div id="piecha"></div>
        <div id="pi"></div>
    </div>
    <a href="./home.php" class="back">Back</a>';
  </body>
</html>
