<?php include('header.php'); ?>
</head>
<?php 
    $objCargo = new Cargo();
    $fetchCargo = $objCargo->cargofetchByID($_GET['cg_id']);
?>
<body class="bgc-gray">
    <?php include('navbar.php'); ?>
    <div class="container p-4 pb-5 bgc-white shadow-sm rounded min-height">
        <div class="row mt-5">
            <div class="col-md-6 d-flex justify-content-center">
                <img src="img_upload/<?=$fetchCargo[0]['cg_img'];?>" style="max-width:100%;height:400px;">
            </div>
            <div class="col-md-6">
                <h3><?=$fetchCargo[0]['cg_name'];?></h3>
                <h5 style="background-color:#eee; padding: 10px; border-left: 4px solid red;" class="mt-4">ราคา ฿<?=$fetchCargo[0]['cg_price'];?> บาท</h5>
                <p class="mt-5">Size <?=$fetchCargo[0]['cg_unit'];?></p>
                <p>มีสินค้าทั้งหมด <?=$fetchCargo[0]['cg_amount'];?> คู่</p>
                <a href="" class="btn btn-success"><i class="fa fa-shopping-cart" aria-hidden="true"></i> เพิ่มไปยังตะกร้าสินค้า</a>
                <p class="mt-5"><?=$fetchCargo[0]['cg_detail'];?></p>
            </div>
        </div>
    </div>
    <script src="bootstrap5/bootstrap.bundle.min.js"></script>
</body>

</html>