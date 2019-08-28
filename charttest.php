<?php
$con = mysqli_connect('localhost', 'root', '', 'reamisDB');
?>
<!DOCTYPE HTML>
<html>
<head>
    <link href="StyleSheet.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
    <title></title>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        google.load("visualization", "1", {packages: ["corechart"]});
        google.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([

                ['lg_art', 'liegenschften'],
                <?php
                $query = "SELECT * from class";

                $exec = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($exec)) {

                    echo "['" . $row['lg_art'] . "'," . $row['liegenschaften'] . "],";
                }
                ?>

            ]);

            var options = {
                title: 'Anzahl der Liegenschaften pro Liegenschafts Art',

                pieHole: 0.4,
                pieSliceTextStyle: {
                    color: 'black',
                },
                seriesDefaults: {
                    rendererOptions: {
                        barPadding: 0,
                        barMargin: 0,
                    },
                    pointLabels: {
                        show: true,
                        stackedValue: true
                    }

                },

            };
            var chart = new google.visualization.PieChart(document.getElementById("columnchart12"));
            chart.draw(data, options);
        }

    </script>

</head>
<body>
<div class="plh"><h1>Reamis</h1>
    <h2>real estate asset management system</h2>
</div>
<div class="contch">
    <div id="columnchart12"></div>
</div>
<button class=ZB onclick="window.location.href= 'auswahl.php'">Zurück</button>

</body>
<footer>
    <p>Copyright reamis ag</p>
</footer>
</html>

