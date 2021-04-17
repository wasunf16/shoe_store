<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../bootstrap5/bootstrap.min.css">
    <title>Document</title>
</head>

<body onload="window.print()">
    <?php
    require("../../functions.php");
    $obj = new ConnectDB();
    $result = $result = $obj->query("SELECT * FROM tbl_payment as pm INNER JOIN tbl_user as u ON pm.pm_u_id = u.u_id WHERE pm.pm_id = '" . $_GET['id'] . "' ");
    $row = $result->fetch_array();
    ?>

    <h2 class="modal-title" id="exampleModalLabel">รายละเอียดการสั่งซื้อ</h2>

    <div class="contaier">
        <div class="row">
            <div class="col-md-12">
                <img src="../../img_payment/<?= $row['pm_img']; ?>" style="max-height: 400px; max-width:100%;">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <h6><b>รหัสสั่งซื้อ : </b> <?= $row['pm_code']; ?></h6>
                <h6><b>ราคารวม : </b> <?= number_format($row['pm_total']); ?></h6>
                <h6><b>ที่อยู่จัดส่ง : </b> <?= $row['pm_address']; ?></h6>
                <h6><b>วันที่สั่งซื้อ : </b> <?= ConvertDateToThai($row['pm_date']); ?></h6>
                <h6><b>สถานะ : </b> <?= $row['pm_status']; ?></h6>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <hr>
                <h4>รายการสินค้า</h4>
                <?php
                $resultModal = $obj->query("SELECT * FROM tbl_payment_list as pl INNER JOIN tbl_cargo as cg ON pl.pl_cg_id=cg.cg_id WHERE  pl.pl_pm_code = '" . $row['pm_code'] . "' ");
                while ($rowModal = $resultModal->fetch_array()) {
                ?>
                    <h6><b>รหัสสินค้า: </b><?= $rowModal['cg_code']; ?> <b>ไซต์: </b><?= $rowModal['cg_unit']; ?><b> จำนวน:</b> <?= $rowModal['pl_amount']; ?> คู่</h6>
                <?php } ?>

            </div>
        </div>
        <!-- <div class="row">
            <div class="col-md-12">
                <hr>
                <h4>รายละเอียดผู้สั่งซื้อ</h4>
                <h6><b>ชื่อ-สกุล:</b> <?= $row['u_fname'] . ' ' . $row['u_lname']; ?></h6>
                <h6><b>เบอร์โทร:</b> <?= $row['u_tel']; ?></h6>
                <h6><b>E-mail:</b> <?= $row['u_email']; ?></h6>
                <h6><b>ที่อยู่:</b> <?= $row['u_address']; ?></h6>
            </div>
        </div> -->
    </div>


</body>

</html>