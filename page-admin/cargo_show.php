<?php include('header.php'); ?>

</head>
<?php
$obj = new ConnectDB();
$result = $obj->query("SELECT * FROM tbl_cargo as cg INNER JOIN tbl_type_product as tp ON cg.cg_type_id = tp.tp_id ");
$row = $result->fetch_all(MYSQLI_ASSOC);
?>

<body>

    <?php include('navbar.php'); ?>

    <div class="container-fluid">
        <div class="row">
            <?php include('sidebar.php'); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="row mt-3">
                    <div class="d-flex justify-content-between align-items-center my-3">
                        <h2>ข้อมูลสินค้า</h2>
                        <a href="cargo_add.php" class="btn btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มสินค้า</a>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table id="dtable" class="table table-striped">
                            <thead>
                                <tr class="table-danger">
                                    <th>IMG</th>
                                    <th>รหัสสินค้า</th>
                                    <th>ชื่อสินค้า</th>
                                    <th>รายละเอียด</th>
                                    <th>ประเภทสินค้า</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($row as $key => $value) {
                                ?>
                                    <tr>
                                        <td><?= $value['cg_img']; ?></td>
                                        <td><?= $value['cg_code']; ?></td>
                                        <td><?= $value['cg_name'];?></td>
                                        <td><?= $value['cg_detail']; ?></td>
                                        <td><?= $value['tp_name']; ?></td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-sm btn-warning">แก้ไข</button>
                                                <button type="button" class="btn btn-sm btn-danger">ลบ</button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <?php include('call_datatable.php'); ?>
    <script src="../bootstrap5/bootstrap.bundle.min.js"></script>
</body>

</html>