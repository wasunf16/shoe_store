<?php
session_start();
include('functions.php');

$conn = new ConnectDB();
$result = $conn->query("SELECT * FROM tbl_cargo");

// print_r($result);

$label = array();
$data = array();
foreach ($result as $row) :
    $label[] = $row['cg_name'];
    $data[] = $row['cg_amount'];
endforeach;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap5/bootstrap.min.css">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.0.2/chart.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <canvas id="myChart" width="300" height="200"></canvas>
            </div>
        </div>
    </div>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: <?php echo json_encode($label); ?>,
                datasets: [{
                    label: 'จำนวนคงเหลือ',
                    data: <?php echo json_encode($data); ?>,
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],
                    // borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1.
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>