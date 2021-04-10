<?php include('header.php'); ?>

</head>

<body>

    <?php
    $obj = new ConnectDB();
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'day') {
            //day
            $result = $obj->query("SELECT *,SUM(cg_price*pl_amount) as total, DAY(pm.pm_date) as day, MONTH(pm.pm_date) as month,YEAR(pm.pm_date) as year FROM tbl_payment_list as pl INNER JOIN tbl_cargo as cg ON pl.pl_cg_id = cg.cg_id INNER JOIN tbl_payment as pm ON pl.pl_pm_code = pm.pm_code GROUP BY DAY(pm.pm_date)");
        }
        if ($_GET['action'] == 'month') {
            //month
            $result = $obj->query("SELECT *,SUM(cg_price*pl_amount) as total, MONTH(pm.pm_date) as month,YEAR(pm.pm_date) as year FROM tbl_payment_list as pl INNER JOIN tbl_cargo as cg ON pl.pl_cg_id = cg.cg_id INNER JOIN tbl_payment as pm ON pl.pl_pm_code = pm.pm_code GROUP BY MONTH(pm.pm_date)");
        }
        if ($_GET['action'] == 'year') {
            //year
            $result = $obj->query("SELECT *,SUM(cg_price*pl_amount) as total, YEAR(pm.pm_date) as year FROM tbl_payment_list as pl INNER JOIN tbl_cargo as cg ON pl.pl_cg_id = cg.cg_id INNER JOIN tbl_payment as pm ON pl.pl_pm_code = pm.pm_code GROUP BY YEAR(pm.pm_date)");
        }
    } else {
        //day
        $result = $obj->query("SELECT *,SUM(cg_price*pl_amount) as total, DAY(pm.pm_date) as day, MONTH(pm.pm_date) as month,YEAR(pm.pm_date) as year FROM tbl_payment_list as pl INNER JOIN tbl_cargo as cg ON pl.pl_cg_id = cg.cg_id INNER JOIN tbl_payment as pm ON pl.pl_pm_code = pm.pm_code GROUP BY DAY(pm.pm_date)");
    }


    ?>
    <?php include('navbar.php'); ?>

    <div class="container-fluid">
        <div class="row my-4">
            <?php include('sidebar.php'); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="row mt-2">
                    <div class="d-flex justify-content-between align-content-center p-1">
                        <h2>รายงานยอดขาย:
                            <?php
                            if (isset($_GET['action'])) {
                                if ($_GET['action'] == 'day') {
                                    echo "แยกตามวัน";
                                } else if ($_GET['action'] == 'month') {
                                    echo "แยกตามเดือน";
                                } else if ($_GET['action'] == 'year') {
                                    echo "แยกตามปี";
                                }
                            } else {
                                echo "แยกตามวัน";
                            }
                            $i = 1;
                            ?>
                        </h2>
                        <button onclick="window.print()" class="btn btn-success no-print"><i class="fa fa-print"></i> </button>
                    </div>
                    <hr>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <a href="?action=day" class="btn btn-dark no-print">แยกตามวัน</a>
                            <a href="?action=month" class="btn btn-success no-print">แยกตามเดือน</a>
                            <a href="?action=year" class="btn btn-primary no-print">แยกตามปี</a>
                        </div>
                    </div>
                    <?php if (isset($result) && $result->num_rows > 0) { ?>
                        <div class="col-md-6">
                            <table id="dtb" class="table table-striped table-bordered mt-5" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>ว/ด/ป</th>
                                        <th>ยอดขายรวม</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $result->fetch_array()) { ?>
                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td>
                                                <?php
                                                if (isset($_GET['action']) && $_GET['action'] == 'day') {
                                                    echo $row['day'].' '.displayNameMonth($row['month']). ' ' . $row['year']+543;
                                                } else if (isset($_GET['action']) && $_GET['action'] == 'month') {
                                                    echo displayNameMonth($row['month']) . ' ' . $row['year']+543;
                                                } else if (isset($_GET['action']) && $_GET['action'] == 'year') {
                                                    echo $row['year']+543;
                                                }
                                                ?>
                                            </td>
                                            <td><?= number_format($row['total']); ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } else { ?>
                        <div class="container">
                            <h4 class="p-5 m-5 bg-light text-center">ไม่มีข้อมูล</h4>
                        </div>
                    <?php } ?>
                </div>
            </main>
        </div>
    </div>
    <?php include('call_datatable.php'); ?>
    <script>
        $(document).ready(function() {
            $('#dtb').DataTable({
                "order": [
                    [0, 'asc']
                ]
            });
        });
    </script>
    <script src="../bootstrap5/bootstrap.bundle.min.js"></script>
</body>

</html>