<?php include('header.php'); ?>

</head>

<body>

    <?php
    $obj = new ConnectDB();
    if (isset($_GET['month']) && !empty($_GET['month'])) {
        $result = $obj->query("SELECT *,COUNT(cg.cg_code*pl_amount) as total FROM tbl_payment_list as pl INNER JOIN tbl_payment as pm ON pl.pl_pm_code = pm.pm_code INNER JOIN tbl_cargo as cg ON pl.pl_cg_id = cg.cg_id WHERE MONTH(pm.pm_date) = '" . $_GET['month'] . "' GROUP BY cg.cg_code ORDER BY total DESC ");
    }



    ?>
    <?php include('navbar.php'); ?>

    <div class="container-fluid">
        <div class="row my-4">
            <?php include('sidebar.php'); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="row mt-2">
                    <div class="d-flex justify-content-between align-content-center p-1">
                        <h2>รายงานสินค้าขายดี
                            <?php $i = 1; ?>
                        </h2>
                        <button onclick="window.print()" class="btn btn-success no-print"><i class="fa fa-print"></i> </button>
                    </div>
                    <hr>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <form action="" method="GET">
                                <div class="row">
                                    <div class="col-md-4">
                                        <select class="form-select no-print" name="month" id="no-print">
                                            <option value="">-- เลือกเดือน --</option>
                                            <?php foreach (NameMonth() as $key => $value) { ?>
                                                <option value="<?= $key; ?>" <?php if (isset($_GET['month']) && $_GET['month'] == $key) {
                                                                                echo "selected";
                                                                            } ?>><?= $value; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" name="submit" value="search" class="btn btn-success" id="no-print"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php if (isset($result) && $result->num_rows > 0) { ?>
                        <div class="col-md-6">
                            <table id="dtb" class="table table-striped table-bordered mt-5" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>อันดับ</th>
                                        <th>รหัสสินค้า</th>
                                        <th>ชื่อสินค้า</th>
                                        <th>จำนวนการซื้อ(ครั้ง)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $result->fetch_array()) { ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $row['cg_code'] ?></td>
                                            <td><?= $row['cg_name'] ?></td>
                                            <td><?= $row['total']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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