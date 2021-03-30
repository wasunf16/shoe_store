<?php include('header.php'); ?>

</head>
<?php
$obj = new ConnectDB();
$result = $obj->query("SELECT * FROM tbl_user WHERE role = 'user' ");
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
                        <h2>ข้อมูลพนักงาน</h2>
                        <a href="member_add.php" class="btn btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มพนักงาน</a>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table id="dtable" class="table table-striped">
                            <thead>
                                <tr class="table-info">
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
                                        <td><?= $value['username']; ?></td>
                                        <td><?= $value['fname'] . ' ' . $value['lname']; ?></td>
                                        <td><?= $value['sex']; ?></td>
                                        <td><?= $value['email']; ?></td>
                                        <td><?= $value['tel']; ?></td>
                                        <td><?= $value['address']; ?></td>
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