<?php 
include('header.php');
checkSessionMember()
?>
</head>
<?php

$obj = new ConnectDB();
$result = $obj->query("SELECT * FROM tbl_cargo");
$row = $result->fetch_all(MYSQLI_ASSOC);

$objUser = new Member();
$rowUser = $objUser->memberGetById($_SESSION['user']['id']);


if(isset($_POST['submit'])){
    $objPayment = new Cargo();
    $resultPayment = $objPayment->cargoPayment($_POST['channel'],$_POST['total'],$_POST['date'],$_POST['address'],$_FILES['img'],$_SESSION['user']['id']);
}

?>

<body class="bgc-gray bgm-stoes">
    <?php include('navbar.php'); ?>
    <div class="container p-4 pb-5 bgc-white shadow-sm rounded min-height">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header text-center">
                        <h2><i class="fa fa-money" aria-hidden="true"></i> แจ้งการชำระเงิน</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form action="" method="POST" class="row g-3 col-md-11 mx-auto" enctype="multipart/form-data">
                                <div class="col-md-12">
                                    <label for="inputAddress" class="form-label"><b>ช่องทางชำระเงิน</b></label>
                                    <div class="form-check mb-1">
                                        <input name="channel" value="กสิกรไทย" class="form-check-input" type="radio" id="กสิกรไทย" required>
                                        <img src="img/bank/kplue.jpg" style="width:75px;">&nbsp;&nbsp;<label class="form-check-label" for="กสิกรไทย">
                                            ธนาคารกสิกรไทย ชื่อบัญชี Deena
                                            <p style="color:red;">เลขที่บัญชี 636-2-22430-2</p>
                                        </label>
                                    </div>
                                    <div class="form-check mb-1">
                                        <input name="channel" value="กรุงไทย" class="form-check-input" type="radio" id="กรุงไทย" required>
                                        <img src="img/bank/ktb.png" style="width:75px;">&nbsp;&nbsp;<label class="form-check-label" for="กรุงไทย">
                                            ธนาคารกรุงไทย ชื่อบัญชี Deena
                                            <p style="color:red;">เลขที่บัญชี 636-2-22430-2</p>
                                        </label>
                                    </div>
                                    <div class="form-check mb-1">
                                        <input name="channel" value="ไทยพาณิชย์" class="form-check-input" type="radio" id="ไทยพาณิชย์" required>
                                        <img src="img/bank/scb.png" style="width:75px;">&nbsp;&nbsp;<label class="form-check-label" for="ไทยพาณิชย์">
                                            ธนาคารไทยพาณิชย์ ชื่อบัญชี Deena
                                            <p style="color:red;">เลขที่บัญชี 636-2-22430-2</p>
                                        </label>
                                    </div>
                                    <div class="form-check mb-1">
                                        <input name="channel" value="ทหารไทย" class="form-check-input" type="radio" id="ทหารไทย" required>
                                        <img src="img/bank/tmb.jpg" style="width:75px;">&nbsp;&nbsp;<label class="form-check-label" for="ทหารไทย">
                                            ธนาคารทหารไทย ชื่อบัญชี Deena
                                            <p style="color:red;">เลขที่บัญชี 636-2-22430-2</p>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">IMG</th>
                                                    <th scope="col">สินค้า</th>
                                                    <th scope="col">ราคา</th>
                                                    <th scope="col">จำนวน</th>
                                                    <th scope="col">รวม</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $total = 0;
                                                $no = 1;
                                                foreach ($_SESSION['cart'][$_SESSION['user']['id']] as $cg_id => $amount) {
                                                    $result = $obj->query("SELECT * FROM tbl_cargo as cg INNER JOIN tbl_type_product as tp ON cg.cg_type_id = tp.tp_id WHERE cg.cg_id = '$cg_id' ");
                                                    $row = $result->fetch_array();
                                                    $sum = $row['cg_price'] * $amount;
                                                    $total += $sum;

                                                ?>

                                                    <tr>
                                                        <th scope="row">
                                                            <?= $no;
                                                            $no++ ?>
                                                        </th>
                                                        <td><img src="img_upload/<?= $row['cg_img']; ?>" style="height:45px;width:45px;"></td>
                                                        <td>
                                                            <?php
                                                            if ($amount > $row['cg_amount']) {
                                                                echo $row['cg_name'] . "<p style='color:red'>(สินค้าไม่เพียงพอ)</p>";
                                                                $canBuy = false;
                                                            } else {
                                                                echo $row['cg_name'];
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>฿<?= number_format($row['cg_price']); ?></td>
                                                        <td><?= $amount ?></td>
                                                        <td>฿<?= number_format($row['cg_price'] * $amount); ?></td>
                                                    </tr>
                                                <?php } ?>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><b>รวม</b></td>
                                                    <td><b>฿<?= number_format($total); ?></b></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="total" class="form-label">จำนวนเงินที่ต้องจ่าย</label>
                                    <input name="total" type="text" class="form-control" value="<?= $_GET['total']; ?>" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="date" class="form-label">วันเวลาที่ชำระเงิน</label>
                                    <?php
                                    date_default_timezone_set("Asia/Bangkok");
                                    $datenow = date("Y-m-d H:i:s")
                                    ?>
                                    <input name="date" type="text" class="form-control" value="<?= $datenow; ?>" readonly>
                                </div>
                                <div class="col-md-12">
                                    <label for="address" class="form-label">ที่อยู่ <span style="color:red">(ดึงมาจากข้อมูลส่วนตัว สามารถแก้ไขได้)</span></label>
                                    <textarea name="address" id="address" class="form-control" rows="3"><?=$rowUser[0]['u_address']?></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="img" class="form-label">รูปภาพหลักฐานการโอน</label>
                                    <input name="img" type="file" class="form-control" id="img" required>
                                </div>
                        </div>
                    </div>
                    <div class="card-footer mt-4">
                        <button type="submit" class="btn btn-success" name="submit"><i class="fa fa-check" aria-hidden="true"></i> ชำระเงิน</button>
                        <a type="button" href="member_cart.php" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> ยกเลิก</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>