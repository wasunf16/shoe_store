<?php include('header.php'); ?>
</head>
<?php
$objCargo = new Cargo();
$fetchCargo = $objCargo->cargofetchByID($_GET['cg_id']);
$updateView = $objCargo->cargoView($_GET['cg_id'], $fetchCargo[0]['cg_view']);
// print_r($_SESSION);
// exit;
if (isset($_GET['submit'])) {
    $cg_id = $_GET['cg_id'];
    $size = $_GET['size'];
    $action = $_GET['action'];
    if (isset($_SESSION['user'])) {
        header("Location: member_cart.php?cg_id=$cg_id&size=$size&action=add");
    }
}
?>

<body class="bgc-gray bgm-stoes">
    <?php include('navbar.php'); ?>
    <div class="container p-4 pb-5 bgc-white shadow-sm rounded min-height">
        <form action="" method="GET" class="form-inline">
            <div class="row mt-5">
                <div class="col-md-6 d-flex justify-content-center">
                    <img src="img_upload/<?= $fetchCargo[0]['cg_img']; ?>" style="max-width:100%;height:400px;">
                </div>

                <div class="col-md-6">
                    <h3><?= $fetchCargo[0]['cg_name']; ?></h3>
                    <h5 style="background-color:#eee; padding: 10px; border-left: 4px solid red;" class="mt-4">ราคา ฿<?= number_format($fetchCargo[0]['cg_price']); ?> บาท</h5>
                    <p class="mt-3"></p>
                    <p>จำนวนการดู <?= $fetchCargo[0]['cg_view']; ?> ครั้ง</p>
                    <p>มีสินค้าทั้งหมด <?= $fetchCargo[0]['cg_amount']; ?> คู่</p>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <select name="size" id="size" class="form-select" required>
                                <option value="">-- เลือกไซส์ --</option>
                                <option value="37">37</option>
                                <option value="38">38</option>
                                <option value="39">39</option>
                                <option value="40">40</option>
                                <option value="41">41</option>
                                <option value="42">42</option>
                                <option value="43">43</option>
                                <option value="44">44</option>
                            </select>
                        </div>
                        <input type="hidden" name="cg_id" value="<?= $_GET['cg_id']; ?>">
                        <input type="hidden" name="action" value="add">
                    </div>

                    <?php if (isset($_SESSION['user']['role'])) { ?>
                        <?php if ($fetchCargo[0]['cg_amount'] <= 0) { ?>
                            <!-- <a href="member_cart.php?cg_id=<?= $_GET['cg_id']; ?>&action=add" class="d-block btn btn-danger btn-sm disabled" id="addCart"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> สินค้าหมด</a> -->
                            <button type="submit" class="d-block btn btn-danger disabled" id="addCart"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> สินค้าหมด</button>
                        <?php } else { ?>
                            <!-- <a href="member_cart.php?cg_id=<?= $_GET['cg_id']; ?>&action=add" class="d-block btn btn-success btn-sm" id="addCart"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> เพิ่มลงตะกร้า</a> -->
                            <button type="submit" class="d-block btn btn-success" id="addCart" name="submit"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> เพิ่มลงตะกร้า</button>
                        <?php } ?>
                    <?php } else { ?>
                        <?php if ($fetchCargo[0]['cg_amount'] <= 0) { ?>
                            <a href="login.php?cg_id=<?= $_GET['cg_id']; ?>" class="d-block btn btn-danger btn-sm disabled" id="addCart"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> สินค้าหมด</a>
                        <?php } else { ?>
                            <a href="login.php?cg_id=<?= $_GET['cg_id']; ?>" class="d-block btn btn-success btn-sm" id="addCart"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> เพิ่มลงตะกร้า</a>
                        <?php } ?>
                    <?php } ?>
                    <p class="mt-5"><?= $fetchCargo[0]['cg_detail']; ?></p>
                </div>
        </form>

    </div>
    </div>
    <script src="bootstrap5/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.5.1.js"></script>
    <!-- <script>
        $(document).ready(function() {
            $('#addCart').click(function() {
                if (!$('#size').val()) {
                    alert('กรุณาเลือกไซส์รองเท้าก่อนเพิ่มลงตะกร้า');
                    $("a").removeAttr('href');
                } else {
                    $("a").attr('href', "member_cart.php?cg_id=<?= $_GET['cg_id']; ?>&action=add");
                }
            });
        });
    </script> -->
</body>

</html>