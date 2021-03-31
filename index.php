<?php include('header.php'); ?>
</head>
<?php
$obj = new ConnectDB();
$result = $obj->query("SELECT * FROM tbl_cargo");
$row = $result->fetch_all(MYSQLI_ASSOC);
?>

<body>
    <?php include('navbar.php'); ?>
    <div class="container">
        <div class="row mt-5">
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
    </div>
    <div class="container">
        <div class="row">
            <?php foreach ($row as $key => $value) { ?>
                <div class="col-sm-6 col-md-2 my-3">
                    <div class="card h-100">
                        <div class="relative" style="position: relative;">
                            <img src="img_upload/<?= $value['cg_img'] ?>" class="card-img-top" style="height:200px;">
                            <div class="relativeSize">Size <?= $value['cg_unit'] ?></div>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title" style="font-weight: bold;"><?= $value['cg_name'] ?></h5>
                            <p class="card-text">฿<?= $value['cg_price'] ?> บาท</p>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="d-block btn btn-success btn-sm"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> เพิ่มลงตะกร้า</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php include('footer.php'); ?>