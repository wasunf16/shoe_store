<?php include('header.php'); ?>

</head>
<?php
$obj = new ConnectDB();
$result = $obj->query("SELECT * FROM tbl_cargo as cg INNER JOIN tbl_type_product as tp ON cg.cg_type_id = tp.tp_id ");
$row = $result->fetch_all(MYSQLI_ASSOC);

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'delete') {
        $objCargo = new Cargo();
        $resultDelete = $objCargo->cargoDelete($_GET['id']);
        if ($resultDelete == true) {
            echo "
            <script>
                alert('ลบเสร็จแล้ว!!');
                window.location.href='cargo_show.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('ลบล้มเหลว');
                window.location.href='cargo_show.php';
            </script>
            ";
        }
    }
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
                        <h2>ข้อมูลสินค้า</h2>
                        <a href="cargo_add.php" class="btn btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มสินค้า</a>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table id="dtb" class="table table-hover">
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
                                        <td><img src="../img_upload/<?= $value['cg_img']; ?>" style="height:75px;width:75px;"></td>
                                        <td><?= $value['cg_code']; ?></td>
                                        <td><?= $value['cg_name']; ?></td>
                                        <td><?= substr($value['cg_detail'],0,100).'...'; ?></td>
                                        <td><?= $value['tp_name']; ?></td>
                                        <td width="10%">
                                            <a href="?action=edit&id=<?= $value['cg_id']; ?>" class="btn btn-sm btn-warning m-1"><i class="fa fa-pencil" aria-hidden="true"></i> แก้ไข</a>
                                            <a href="?action=delete&id=<?= $value['cg_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('ยืนยันการลบ?');"><i class="fa fa-trash-o" aria-hidden="true"></i> ลบ</a>
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
                    [1, 'desc']
                ]
            });
        });
    </script>
    <script src="../bootstrap5/bootstrap.bundle.min.js"></script>
</body>

</html>