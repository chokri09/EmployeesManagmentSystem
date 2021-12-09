@extends('home')



@section('content')
<?php
$dbhandle = new mysqli('127.0.0.1', 'root', '','Laravelemployee');
echo $dbhandle->connect_error;

$query = "SELECT  ContratType, count(ContratType)  FROM employees group by ContratType";
$res = 	$dbhandle->query($query);





?>




<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
		
		['ContratType','ContratType'],
         <?php
		 
		 //fetch_assoc(): lit une ligne de résultat MySql dans un tableau associatif //
		 
		 while ($row=$res->fetch_assoc()) {
			 
			 echo "['".$row['ContratType']."',".$row['count(ContratType)']."],"; 
			 
		 }
		 
		 
		 
		 
		 ?>
        ]);

        var options = {
          title: 'type of contract percentage',
		  is3D:true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
 
    <div id="piechart" style="width: 800px; height: 500px;"></div>
  </body>
</html>

</td>

<td>


<?php  
$dbhandle = new mysqli('127.0.0.1', 'root', '','Laravelemployee');
echo $dbhandle->connect_error;

$query = "SELECT  firstName, salary  FROM employees group by firstName";
$res = 	$dbhandle->query($query);






?>
<td>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Employee',  'Salary'],
		  <?php
		 
		 //fetch_assoc(): lit une ligne de résultat MySql dans un tableau associatif //
		 
		 while ($row=$res->fetch_assoc()) {
			 
			 echo "['".$row['firstName']."',".$row['salary']."],"; 
			 
		 }
		 
		 
		 
		 
		 ?>
          
        ]);

        var options = {
          title: 'employees salary',
          vAxis: {title: ''},
          isStacked: true
        };

        var chart = new google.visualization.SteppedAreaChart(document.getElementById('chart_div'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 900px; height: 500px;"></div>
  </body>
</html>
</td>
</td>
</table>

</div>
                </div>
            </div>

@endsection