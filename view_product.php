<?php include('header.php'); ?>
</head>
<?php
$objCargo = new Cargo();
$fetchCargo = $objCargo->cargofetchByID($_GET['cg_id']);
$updateView = $objCargo->cargoView($_GET['cg_id'],$fetchCargo[0]['cg_view']);
?>

<body class="bgc-gray bgm-stoes">
    <?php include('navbar.php'); ?>
    <div class="container p-4 pb-5 bgc-white shadow-sm rounded min-height">
        <div class="row mt-5">
            <div class="col-md-6 d-flex justify-content-center">
                <img src="img_upload/<?= $fetchCargo[0]['cg_img']; ?>" style="max-width:100%;height:400px;">
            </div>
            <div class="col-md-6">
                <h3><?= $fetchCargo[0]['cg_name']; ?></h3>
                <h5 style="background-color:#eee; padding: 10px; border-left: 4px solid red;" class="mt-4">ราคา ฿<?= number_format($fetchCargo[0]['cg_price']); ?> บาท</h5>
                <p class="mt-5">Size <?= $fetchCargo[0]['cg_unit']; ?></p>
                <p>จำนวนการดู <?= $fetchCargo[0]['cg_view']; ?> ครั้ง</p>
                <p>มีสินค้าทั้งหมด <?= $fetchCargo[0]['cg_amount']; ?> คู่</p>
                <?php if (isset($_SESSION['user']['role'])) { ?>
                    <?php if ($fetchCargo[0]['cg_amount'] <= 0) { ?>
                        <a href="member_cart.php?cg_id=<?= $_GET['cg_id']; ?>&action=add" class="d-block btn btn-danger btn-sm disabled"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> สินค้าหมด</a>
                    <?php } else { ?>
                        <a href="member_cart.php?cg_id=<?= $_GET['cg_id']; ?>&action=add" class="d-block btn btn-success btn-sm"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> เพิ่มลงตะกร้า</a>
                    <?php } ?>
                <?php } else { ?>
                    <?php if ($fetchCargo[0]['cg_amount'] <= 0) { ?>
                        <a href="login.php?cg_id=<?= $_GET['cg_id']; ?>" class="d-block btn btn-danger btn-sm disabled"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> สินค้าหมด</a>
                    <?php } else { ?>
                        <a href="login.php?cg_id=<?= $_GET['cg_id']; ?>" class="d-block btn btn-success btn-sm"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> เพิ่มลงตะกร้า</a>
                    <?php } ?>
                <?php } ?>
                <p class="mt-5"><?= $fetchCargo[0]['cg_detail']; ?></p>
            </div>
        </div>
    </div>
    <script src="bootstrap5/bootstrap.bundle.min.js"></script>
</body>

</html>