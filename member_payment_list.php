<?php 
include('header.php');
checkSessionMember()
?>

</head>
<?php

$obj = new ConnectDB();
$objModal = new ConnectDB();

if (isset($_GET['display'])) {
    switch ($_GET['display']) {
        case 'success':
            $result = $obj->query("SELECT * FROM `tbl_payment` WHERE pm_status = 'ยืนยันแล้ว' ");
            break;
        case 'delete':
            $result = $obj->query("SELECT * FROM `tbl_payment` WHERE pm_status = 'ไม่อนุมัติ' ");
            break;
    }
} else {
    $result = $obj->query("SELECT * FROM `tbl_payment` WHERE pm_u_id = '".$_SESSION['user']['id']."' ");
}

if (isset($_GET['action'])) {
    $objAction = new Cargo();
    switch ($_GET['action']) {
        case 'allow':
            $resultAllow = $objAction->cargoPaymentAllow($_GET['id'], $_GET['code']);
            break;
        case 'delete':
            $resultDelete = $objAction->cargoPaymentDeny($_GET['id'], $_GET['code']);
            break;
    }
}

?>

<body class="bgc-gray bgm-stoes">

    <?php include('navbar.php'); ?>

    <div class="container p-4 pb-5 bgc-white shadow-sm rounded min-height">
        <div class="row my-4">
            <h2>รายการสั่งซื้อ</h2>
            <hr>
            <div class="row mb-3">
                <div class="col-md-12">
                    <!-- <a href="order_show.php" class="btn btn-sm btn-outline-info"><i class="fa fa-clock-o" aria-hidden="true"></i> รายการสั่งซื้อ</a>
                    <a href="?display=success" class="btn btn-sm btn-outline-success"><i class="fa fa-check" aria-hidden="true"></i> รายการจัดส่ง</a> -->
                </div>
            </div>
            <table id="dtb" class="table table-striped table-hover" style="width:100%">
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
                            <td><?= ConvertDateToThai($row['pm_date']); ?></td>
                            <td><?= $row['pm_status']; ?></td>
                            <td width="20%">
                                <?php if (isset($_GET['display']) && $_GET['display'] == 'success') { ?>
                                    <button class="btn btn-sm btn-info m-0" type="button" data-bs-toggle="modal" data-bs-target="#Modal<?= $row['pm_id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i> รายละเอียด</button>
                                <?php } else if (isset($_GET['display']) && $_GET['display'] == 'delete') { ?>
                                    <button class="btn btn-sm btn-info m-0" type="button" data-bs-toggle="modal" data-bs-target="#Modal<?= $row['pm_id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i> รายละเอียด</button>
                                <?php } else { ?>
                                    <button class="btn btn-sm btn-info m-0" type="button" data-bs-toggle="modal" data-bs-target="#Modal<?= $row['pm_id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i> รายละเอียด</button>
                                    <!-- <a href="?action=allow&id=<?= $row['pm_id']; ?>&code=<?= $row['pm_code']; ?>" class="btn btn-sm btn-success m-0"><i class="fa fa-check" aria-hidden="true"></i> ยืนยัน</a>
                                    <a href="?action=delete&id=<?= $row['pm_id']; ?>&code=<?= $row['pm_code']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('ยืนยัน?');"><i class="fa fa-times" aria-hidden="true"></i> ไม่อนุมัติ</a> -->
                                <?php } ?>
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
                                                    <img src="img_payment/<?= $row['pm_img']; ?>" style="height: 500px; max-width:100%;">
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <h6><b>รหัสสั่งซื้อ : </b> <?= $row['pm_code']; ?></h6>
                                                    <h6><b>ราคารวม : </b> <?= number_format($row['pm_total']); ?></h6>
                                                    <h6><b>ที่อยู่ : </b> <?= $row['pm_address']; ?></h6>
                                                    <h6><b>วันที่สั่งซื้อ : </b> <?= ConvertDateToThai($row['pm_date']); ?></h6>
                                                    <h6><b>สถานะ : </b> <?= $row['pm_status']; ?></h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <hr>
                                                    <h4>รายการสินค้า</h4>
                                                    <?php
                                                    $resultModal = $objModal->query("SELECT * FROM tbl_payment_list as pl INNER JOIN tbl_cargo as cg ON pl.pl_cg_id=cg.cg_id WHERE  pl.pl_pm_code = '" . $row['pm_code'] . "' ");
                                                    while ($rowModal = $resultModal->fetch_array()) {
                                                    ?>
                                                        <h6><b>รหัสสินค้า: </b><?= $rowModal['cg_code']; ?> <b>ไซต์: </b><?= $rowModal['pl_size']; ?><b> จำนวน:</b> <?= $rowModal['pl_amount']; ?> คู่</h6>
                                                    <?php } ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> ปิด</button>
                                        <a href="print/member/order_print.php?id=<?= $row['pm_id']; ?>" target="_blank" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i></a>
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
    
    <?php include('footer.php'); ?>
