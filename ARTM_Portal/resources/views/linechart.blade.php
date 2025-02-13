<x-app-layout>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Late Entries'],
          @foreach($data as $entry)
            ['{{ \Carbon\Carbon::parse($entry[0])->format('F Y') }}', {{ $entry[1] }}],
          @endforeach
        ]);

        var options = {
          title: 'Late Slip Entries Over Time',
          curveType: 'function',
          legend: { position: 'bottom' },
          hAxis: {
            title: 'Month',
            format: 'MMM yyyy'
          },
          vAxis: {
            title: 'Number of Late Entries'
          }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body class="flex items-center justify-center min-h-screen bg-gray-100 white:bg-gray-900">
    <div class="w-full max-w-4xl p-4 bg-white white:bg-gray-800 rounded-lg shadow-md">
      <div id="curve_chart" style="width: 100%; height: 500px"></div>
    </div>
  </body>
</x-app-layout>