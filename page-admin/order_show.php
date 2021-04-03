<?php include('header.php'); ?>

</head>
<?php

$obj = new ConnectDB();
$result = $obj->query("SELECT * FROM `tbl_payment`");

?>

<body>

    <?php include('navbar.php'); ?>

    <div class="container-fluid">
        <div class="row my-4">
            <?php include('sidebar.php'); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="row mt-2">
                    <h2>ข้อมูลการสั่งซื้อ</h2>
                    <hr>
                    <table id="dtable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr class="table-success">
                                <!-- <th>IMG</th> -->
                                <th>รหัสการสั่งซื้อ</th>
                                <th>ราคารวม</th>
                                <th>วันเวลาที่สั่งซื้อ</th>
                                <th>สถานะ</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_array()) { ?>


                                <tr>
                                    <!-- <td><img src="../img_payment/<?= $row['pm_img'] ?>" style="width:75px; height:75px;"></td> -->
                                    <td><?= $row['pm_code']; ?></td>
                                    <td><?= number_format($row['pm_total']); ?></td>
                                    <td><?= $row['pm_date']; ?></td>
                                    <td><?= $row['pm_status']; ?></td>
                                    <td width="20%">
                                        <button class="btn btn-sm btn-info m-0" type="button" data-bs-toggle="modal" data-bs-target="#Modal<?= $row['pm_id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i> รายละเอียด</button>
                                        <a href="?action=edit&id=" class="btn btn-sm btn-success m-0"><i class="fa fa-check" aria-hidden="true"></i> ยืนยัน</a>
                                        <a href="?action=delete&id=<?= $value['u_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('ยืนยันการลบ?');"><i class="fa fa-times" aria-hidden="true"></i> ยกเลิก</a>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="Modal<?= $row['pm_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">รายละเอียดการสั่งซื้อ</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="contaier">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <img src="../img_payment/<?= $row['pm_img']; ?>" style="height: 500px; max-width:100%;">
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-md-12">
                                                            <h6><b>รหัสสั่งซื้อ : </b> <?= $row['pm_code']; ?></h6>
                                                            <h6><b>ราคารวม : </b> <?= number_format($row['pm_total']); ?></h6>
                                                            <h6><b>ที่อยู่ : </b> <?= $row['pm_address']; ?></h6>
                                                            <h6><b>วันที่สั่งซื้อ : </b> <?= $row['pm_date']; ?></h6>
                                                            <h6><b>สถานะ : </b> <?= $row['pm_status']; ?></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> ปิด</button>
                                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Close modal -->

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>


    <?php include('call_datatable.php'); ?>
    <script src="../bootstrap5/bootstrap.bundle.min.js"></script>
</body>

</html>