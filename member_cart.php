<?php include('header.php'); ?>
</head>
<?php
$cg_id = isset($_GET['cg_id']) ? $_GET['cg_id'] : '';
$action = isset($_GET['action']) ? $_GET['action'] : '';

if ($action == 'add' && !empty($cg_id)) {
    if (isset($_SESSION['cart'][$_SESSION['user']['id']][$cg_id])) {
        $_SESSION['cart'][$_SESSION['user']['id']][$cg_id]++;
    } else {
        $_SESSION['cart'][$_SESSION['user']['id']][$cg_id] = 1;
    }
    header('Location: member_cart.php');
}

if ($action == 'remove' && !empty($cg_id))  //ยกเลิกการสั่งซื้อ
{
    unset($_SESSION['cart'][$_SESSION['user']['id']][$cg_id]);
    header('Location: member_cart.php');
}

if ($action == 'update') {
    $amount_array = $_POST['amount'];
    foreach ($amount_array as $cg_id => $amount) {
        $_SESSION['cart'][$_SESSION['user']['id']][$cg_id] = $amount;
    }
    header('Location: member_cart.php');
}

$obj = new Cargo();


?>

<body>
    <?php include('navbar.php'); ?>
    <div class="container p-4 pb-5 bgc-white shadow rounded min-height">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <h3 class="card-header text-center"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> ตะกร้าสินค้า</h3>
                    <div class="card-body">
                        <?php
                        $total = 0;
                        $no = 1;
                        $canBuy = true;
                        if (!empty($_SESSION['cart'][$_SESSION['user']['id']])) {
                        ?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr class="table-info border-info">
                                            <th scope="col">#</th>
                                            <th scope="col">IMG</th>
                                            <th scope="col">สินค้า</th>
                                            <th scope="col">ราคา</th>
                                            <th scope="col">จำนวน</th>
                                            <th scope="col">รวม</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <form action="?action=update" method="POST">
                                            <?php
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
                                                    <td><input type="number" value="<?= $amount ?>" name="amount[<?= $cg_id ?>]" class="form-control" min="1" style="width:80px;"></td>
                                                    <td>฿<?= number_format($row['cg_price'] * $amount); ?></td>
                                                    <td class="text-center"><a href="?action=remove&cg_id=<?= $cg_id; ?>"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                                                </tr>
                                            <?php } ?>
                                            <tr class="table-warning">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><b>รวม</b></td>
                                                <td><b>฿<?= number_format($total); ?></b></td>
                                                <td></td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-primary btn-sm" type="submit" name="update"><i class='fa fa-refresh'></i> คำนวณ</button>
                            </div>
                            
                            </form>
                    </div>
                    <div class="card-footer">
                        <a href="member_payment.php?total=<?= $total; ?>" class="d-block btn btn-dark <?php if (!$canBuy) {
                                                                    echo 'disabled';
                                                                } ?>"><i class="fa fa-check" aria-hidden="true"></i> ยืนยันคำสั่งซื้อ</a>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center mt-2"><a href="index.php">ไปเลือกซื้อสินค้าต่อ</a></ก>

                <?php } else { ?>
                    <div class="d-flex flex-column align-items-center justify-content-center p-5">
                        <h5>ตะกร้าว่างเปล่า</h5><br>
                        <a href="index.php" class="btn btn-outline-info">ไปเลือกซื้อสินค้า</a>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>