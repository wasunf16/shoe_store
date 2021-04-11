<?php include('header.php'); ?>

</head>
<?php
$obj = new ConnectDB();
$result = $obj->query("SELECT * FROM tbl_user WHERE u_role = 'member' ");
$row = $result->fetch_all(MYSQLI_ASSOC);

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'delete') {
        $objDelete = new ConnectDB();
        $resultDelete = $objDelete->deleteByID('tbl_user', 'u_id', $_GET['id']);
        if ($resultDelete == true) {
            echo "
            <script>
                alert('ลบเสร็จแล้ว!!');
                window.location.href='member_show.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('ลบล้มเหลว');
                window.location.href='member_show.php';
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
                        <h2>ข้อมูลลูกค้า</h2>
                        <a href="member_add.php" class="btn btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มลูกค้า</a>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table id="dtb" class="table table-striped">
                            <thead>
                                <tr class="table-info">
                                    <th>ID</th>
                                    <th>ชื่อผู้ใช้</th>
                                    <th>ชื่อ-สกุล</th>
                                    <th>เพศ</th>
                                    <th>Email</th>
                                    <th>เบอร์โทร</th>
                                    <th>ที่อยู่</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($row as $key => $value) {
                                ?>
                                    <tr>
                                        <td><?= $value['u_id']; ?></td>
                                        <td><?= $value['u_username']; ?></td>
                                        <td><?= $value['u_fname'] . ' ' . $value['u_lname']; ?></td>
                                        <td><?= $value['u_sex']; ?></td>
                                        <td><?= $value['u_email']; ?></td>
                                        <td><?= $value['u_tel']; ?></td>
                                        <td><?= $value['u_address']; ?></td>
                                        <td width="10%">
                                            <a href="member_edit.php?id=<?= $value['u_id']; ?>" class="btn btn-sm btn-warning m-1"><i class="fa fa-pencil" aria-hidden="true"></i> แก้ไข</a>
                                            <a href="?action=delete&id=<?= $value['u_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('ยืนยันการลบ?');"><i class="fa fa-trash-o" aria-hidden="true"></i> ลบ</a>
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
                    [0, 'desc']
                ]
            });
        });
    </script>
    <script src="../bootstrap5/bootstrap.bundle.min.js"></script>
</body>

</html>