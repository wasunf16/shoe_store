<?php include('header.php'); ?>

</head>
<?php
$obj = new ConnectDB();
$result = $obj->query("SELECT * FROM `tbl_type_product`");
$row = $result->fetch_all(MYSQLI_ASSOC);

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
        $objCargo = new Cargo();
        $resultDelete = $objCargo->cargoTypeRemove($_GET['id']);
}

?>

<body>

    <?php include('navbar.php'); ?>

    <div class="container-fluid">
        <div class="row mb-5">
            <?php include('sidebar.php'); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="row mt-3">
                    <div class="d-flex justify-content-between align-items-center my-3">
                        <h2>ข้อมูลประเภทสินค้า</h2>
                        <a href="cargo_type_add.php" class="btn btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มประเภทสินค้า</a>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table id="dtb" class="table table-hover table-bordered">
                            <thead>
                                <tr class="table-dark">
                                    <th width="5%">ID</th>
                                    <th>ชื่อประเภทสินค้า</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($row as $key => $value) {
                                ?>
                                    <tr>
                                        <td><?= $value['tp_id'];?></td>
                                        <td><?= $value['tp_name']; ?></td>
                                        <td width="10%">
                                            <a href="cargo_type_edit .php?&id=<?= $value['tp_id']; ?>" class="btn btn-sm btn-warning m-1"><i class="fa fa-pencil" aria-hidden="true"></i> แก้ไข</a>
                                            <a href="?action=delete&id=<?= $value['tp_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('ยืนยันการลบ?');"><i class="fa fa-trash-o" aria-hidden="true"></i> ลบ</a>
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