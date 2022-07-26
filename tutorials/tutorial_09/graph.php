<?php include "db_conn.php"; ?>
<html>

<head>
  <title>Users Graph</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {
      packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Years', 'Ages'],
        <?php
        $query = "select * from users";
        $res = mysqli_query($conn, $query);
        while ($data = mysqli_fetch_array($res)) {
          $year = $data['year'];
          $age = $data['age'];
        ?>['<?php echo $year; ?>', <?php echo $age; ?>],
        <?php
        }
        ?>
      ]);

      var options = {
        title: 'My Daily CRUD Activities',
        pieHole: 0.4,
      };

      var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
      chart.draw(data, options);
    }
  </script>
</head>

<body>
  <div id="donutchart" style="width: 900px; height: 500px; margin:auto;"></div>
  <div class="text-center">
    <a href="index.php" class="link-primary font-weight-bold">Read</a>
    <a href="create.php" class="link-primary font-weight-bold pl-5">Create</a>
  </div>
</body>

</html>