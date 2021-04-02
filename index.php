<?php include('header.php'); ?>
</head>
<?php
$obj = new ConnectDB();
$result = $obj->query("SELECT * FROM tbl_cargo");
$row = $result->fetch_all(MYSQLI_ASSOC);
?>

<body >
    <?php include('navbar.php'); ?>
    <div class="container p-4 pb-5 bgc-white shadow rounded min-height">
        <div class="row">
            <div class="d-flex justify-content-between align-items-center bd-highlight">
                <div class="d-flex">
                    <h5>สินค้าทั้งหมด</h5>
                </div>
                <div class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="ค้นหา" aria-label="Search">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i> </button>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($row as $key => $value) { ?>
                <div class="col-6 col-sm-6 col-md-2 my-3">
                    <div class="card h-100">
                        <div class="relative" style="position: relative;">
                            <a href="view_product.php?cg_id=<?= $value['cg_id'] ?>"><img src="img_upload/<?= $value['cg_img'] ?>" class="card-img-top" style="height:200px;"></a>
                            <div class="relativeSize">Size <?= $value['cg_unit'] ?></div>
                        </div>

                        <div class="card-body">
                            <h6 class="card-title" style="font-weight: bold;"><a style="text-decoration: none; color:#333;" href="view_product.php?cg_id=<?= $value['cg_id'] ?>"><?= $value['cg_name'] ?></h6></a>
                            <p class="card-text">฿<?= $value['cg_price'] ?> บาท</p>
                            <p class="card-text" style="font-size:13px;">คงเหลือ <?= $value['cg_amount'] ?> ชิ้น</p>
                        </div>
                        <div class="card-footer p-0">
                            <?php
                            if (isset($_SESSION['user']['role'])) {
                            ?>
                                <a href="member_cart.php?cg_id=<?= $value['cg_id']; ?>&action=add" class="d-block btn btn-success btn-sm"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> เพิ่มลงตะกร้า</a>
                            <?php } else { ?>
                                <a href="login.php?cg_id=<?= $value['cg_id']; ?>" class="d-block btn btn-success btn-sm"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> เพิ่มลงตะกร้า</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php include('footer.php'); ?>