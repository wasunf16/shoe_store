<?php include('header.php'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.0.2/chart.min.js"></script>
</head>

<body>
    <?php
    $obj = new Report();
    ?>
    <?php include('navbar.php'); ?>

    <div class="container-fluid">
        <div class="row my-4">
            <?php include('sidebar.php'); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="row mt-2">
                    <!-- <h2>หน้าหลัก</h2>
                    <hr> -->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <table class="table table-hover">
                                    <thead>
                                        <tr class="table-info">
                                            <th colspan="3" class="text-center">
                                                <h3>รายงาน</h3>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td width="30%" class="table-danger">
                                                <h5>รายการสั่งซื้อทั้งหมด</h5>
                                            </td>
                                            <td class="table-light">
                                                <h5><?php echo $obj->reportSellCountTotal(); ?> รายการ</h5>
                                            </td>
                                            <td width="7%"><a href="order_show.php" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="table-danger">
                                                <h5>รายการสินค้าทั้งหมด</h5>
                                            </td>
                                            <td class="table-light">
                                                <h5><?php echo number_format($obj->reportCargoTotal()); ?> รายการ</h5>
                                            </td>
                                            <td width="7%"><a href="cargo_show.php" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="table-danger">
                                                <h5>การจัดส่งทั้งหมด</h5>
                                            </td>
                                            <td class="table-light">
                                                <h5><?php echo $obj->reportShipmentCountTotal(); ?> รายการ</h5>
                                            </td>
                                            <td width="7%"><a href="shipment_show.php" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="table-danger">
                                                <h5>ยอดขายทั้งหมด</h5>
                                            </td>
                                            <td class="table-light">
                                                <h5><?php echo number_format($obj->reportSellTotal()); ?> บาท</h5>
                                            </td>
                                            <td width="7%"><a href="report_sell.php?action=day" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="table-danger">
                                                <h5>ผู้ใช้งานทั้งหมด</h5>
                                            </td>
                                            <td class="table-light">
                                                <h5><?php echo $obj->reportUserCountTotal(); ?> คน</h5>
                                            </td>
                                            <td width="7%"><a href="user_show.php" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="table-danger">
                                                <h5>สมาชิกทั้งหมด</h5>
                                            </td>
                                            <td class="table-light">
                                                <h5><?php echo $obj->reportMemberCountTotal(); ?> คน</h5>
                                            </td>
                                            <td width="7%"><a href="member_show.php" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="container">
                                    <canvas id="Chart1"></canvas>
                                    <?php
                                    $obj = new ConnectDB();
                                    $result = $obj->query("SELECT * FROM tbl_cargo ORDER BY cg_view DESC");

                                    $label = array();
                                    $data = array();
                                    foreach ($result as $row) :
                                        $label[] = $row['cg_code'];
                                        $data[] = $row['cg_view'];
                                    endforeach;
                                    ?>
                                    <script>
                                        var ctx = document.getElementById('Chart1').getContext('2d');
                                        var myChart = new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels: <?php echo json_encode($label); ?>,
                                                datasets: [{
                                                    label: 'จำนวนการดู',
                                                    data: <?php echo json_encode($data); ?>,
                                                    backgroundColor: ['rgb(54, 162, 235)'],
                                                    //borderColor: 'rgba(54, 162, 235, 1)',
                                                    borderWidth: 1.
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                },
                                                plugins: {
                                                    title: {
                                                        display: true,
                                                        text: 'การดูสินค้า'
                                                    }
                                                }
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="container">
                                    <canvas id="Chart2" width="400" height="400"></canvas>
                                    <?php
                                    $obj = new ConnectDB();
                                    $result = $obj->query("SELECT tp.tp_name,SUM(cg_amount) as sumType FROM tbl_cargo as cg INNER JOIN tbl_type_product as tp ON cg.cg_type_id = tp.tp_id GROUP BY tp.tp_name");

                                    $label = array();
                                    $data = array();
                                    foreach ($result as $row) :
                                        $label[] = $row['tp_name'];
                                        $data[] = $row['sumType'];
                                    endforeach;
                                    ?>
                                    <script>
                                        var ctx = document.getElementById('Chart2').getContext('2d');
                                        var myChart = new Chart(ctx, {
                                            type: 'doughnut',
                                            data: {
                                                labels: <?php echo json_encode($label); ?>,
                                                datasets: [{
                                                    label: 'จำนวน',
                                                    data: <?php echo json_encode($data); ?>,
                                                    backgroundColor: ['rgb(255, 99, 132)',
                                                        'rgb(54, 162, 235)',
                                                        'rgb(255, 205, 86)'
                                                    ],
                                                    //borderColor: 'rgba(54, 162, 235, 1)',
                                                    borderWidth: 1.
                                                }]

                                            },
                                            options: {
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                },
                                                plugins: {
                                                    title: {
                                                        display: true,
                                                        text: 'จำนวนสินค้าในคลัง แบ่งเป็นประเภท'
                                                    }
                                                }
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="container">
                                    <canvas id="Chart3"></canvas>
                                    <?php
                                    $obj = new ConnectDB();
                                    $result = $obj->query("SELECT * FROM tbl_cargo ORDER BY cg_amount DESC");

                                    $label = array();
                                    $data = array();
                                    foreach ($result as $row) :
                                        $label[] = $row['cg_code'];
                                        $data[] = $row['cg_amount'];
                                    endforeach;
                                    ?>
                                    <script>
                                        var ctx = document.getElementById('Chart3').getContext('2d');
                                        var myChart = new Chart(ctx, {
                                            type: 'doughnut',
                                            data: {
                                                labels: <?php echo json_encode($label); ?>,
                                                datasets: [{
                                                    label: 'จำนวนคงเหลือ',
                                                    data: <?php echo json_encode($data); ?>,
                                                    backgroundColor: ['rgb(255, 99, 132)',
                                                        'rgb(54, 162, 235)',
                                                        'rgb(255, 205, 86)'
                                                    ],
                                                    //borderColor: 'rgba(54, 162, 235, 1)',
                                                    borderWidth: 1.
                                                }]

                                            },
                                            options: {
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                },
                                                plugins: {
                                                    title: {
                                                        display: true,
                                                        text: 'จำนวนสินค้าในคลัง'
                                                    }
                                                }
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </main>
    </div>
    </div>
    <?php include('call_datatable.php'); ?>
    <script src="../bootstrap5/bootstrap.bundle.min.js"></script>
</body>

</html>