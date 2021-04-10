<?php include('header.php'); ?>
</head>
<?php

$obj = new ConnectDB();

//pagination
$row_page = 8;
if (empty($_GET['p'])) {
    $page = 1;
}
if (isset($_GET['p'])) {
    $page = $_GET['p'];
}

if (isset($_GET['p']) && $_GET['p'] <= '0') {
    $page = 1;
}

$total_date = mysqli_num_rows($obj->query("SELECT * FROM tbl_cargo"));
$total_page = ceil($total_date / $row_page);
if (isset($_GET['p']) && $_GET['p'] >= $total_page) {
    $page = $total_page;
}
$start = ($page - '1') * $row_page;
// end pagination


if (isset($_GET['type']) && $_GET['type'] != null) {
    $type = $_GET['type'];
    $result = $obj->query("SELECT * FROM tbl_cargo WHERE cg_type_id='{$type}' ORDER BY cg_id DESC Limit {$start},{$row_page}");
} else if (isset($_GET['search']) && $_GET['search'] != null) {
    $search = $_GET['search'];
    $result = $obj->query("SELECT * FROM tbl_cargo WHERE cg_name LIKE '%" . $search . "%' ORDER BY cg_id DESC Limit {$start},{$row_page}");
} else {
    //get all
    $result = $obj->query("SELECT * FROM tbl_cargo ORDER BY cg_id DESC Limit {$start},{$row_page}");
}

if(isset($_GET['popular'])){
    $result = $obj->query("SELECT * FROM tbl_cargo ORDER BY cg_view DESC Limit {$start},{$row_page}");
}

$row = $result->fetch_all(MYSQLI_ASSOC);

?>

<body class="bgc-gray bgm-stoes">
    <?php include('navbar.php'); ?>
    <div class="container p-4 bgc-white shadow-sm rounded min-height">
        <div class="row">
            <div class="d-flex justify-content-between align-items-center bd-highlight">
                <div class="d-flex">
                    <h5>รายการสินค้า
                    </h5>
                </div>
                <div class="d-flex">
                    <form action="" method="GET" class="row row-cols-lg-auto g-3 align-items-center">
                        <div class="col-md-6">
                            <input name="search" class="form-control me-2" type="search" placeholder="ค้นหา" aria-label="Search">
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i> </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <?php 
                if($result->num_rows <= 0){
                    echo "<h4 class='text-center mt-5 bg-light rounded' style='padding:90px;'>ไม่มีสินค้า</h4>";
                }
            ?>
            <?php foreach ($row as $key => $value) { ?>
                <div class="col-6 col-sm-6 col-md-3  my-3">
                    <div class="card h-100">
                        <div class="relative" style="position: relative;">
                            <a href="view_product.php?cg_id=<?= $value['cg_id'] ?>"><img src="img_upload/<?= $value['cg_img'] ?>" class="card-img-top" style="height:200px;"></a>
                            <div class="relativeSize">Size <?= $value['cg_unit'] ?></div>
                            <div class="relativeSizeView"><i class="fa fa-eye" aria-hidden="true"></i> <?= $value['cg_view'] ?></div>
                        </div>

                        <div class="card-body">
                            <h6 class="card-title" style="font-weight: bold;"><a style="text-decoration: none; color:#333;" href="view_product.php?cg_id=<?= $value['cg_id'] ?>"><?= $value['cg_name'] ?></h6></a>
                            <p class="card-text">฿<?= number_format($value['cg_price']); ?> บาท</p>
                            <p class="card-text" style="font-size:13px;">คงเหลือ <?= $value['cg_amount'] ?> ชิ้น</p>
                        </div>
                        <div class="card-footer p-0">
                            <?php if (isset($_SESSION['user']['role'])) { ?>
                                <?php if ($value['cg_amount'] <= 0) { ?>
                                    <a href="member_cart.php?cg_id=<?= $value['cg_id']; ?>&action=add" class="d-block btn btn-danger btn-sm disabled"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> สินค้าหมด</a>
                                <?php } else { ?>
                                    <a href="member_cart.php?cg_id=<?= $value['cg_id']; ?>&action=add" class="d-block btn btn-success btn-sm"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> เพิ่มลงตะกร้า</a>
                                <?php } ?>
                            <?php } else { ?>
                                <?php if ($value['cg_amount'] <= 0) { ?>
                                    <a href="login.php?cg_id=<?= $value['cg_id']; ?>" class="d-block btn btn-danger btn-sm disabled"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> สินค้าหมด</a>
                                <?php } else { ?>
                                    <a href="login.php?cg_id=<?= $value['cg_id']; ?>" class="d-block btn btn-success btn-sm"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> เพิ่มลงตะกร้า</a>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php if($result->num_rows > 0){ ?>
        <div class="row mt-5">
            <div class="col-md-12 d-flex justify-content-center mt-5">
                <nav aria-label="...">
                    <ul class="pagination">
                        <li <?php if ($page == 1) {
                                echo "class='page-item disabled'";
                            } ?>><a class="page-link" href="index.php?p=<?php echo $page - '1'; ?>">
                                ก่อนหน้า</a>
                        </li>
                        <?php for ($i = 1; $i <= $total_page; $i++) {
                            if ($page - 2 >= 2 and ($i > 2 and $i < $page - 2)) {
                                echo "<li><a class='page-link' href=>...</a></li>";
                                $i = $page - 2;
                            }
                            if ($page + 5 <= $total_page and ($i >= $page + 3 and $i <= $total_page - 2)) {
                                echo "<li><a class='page-link' href=>...</a></li>";
                                $i = $total_page - 1;
                            }
                        ?>
                            <li <?php if ($page == $i) {
                                    echo "class='page-item active' ";
                                } ?>><a class="page-link" href="index.php?p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php } ?>
                        <li <?php if ($page == ($total_page)) {
                                echo "class='page-item disabled'";
                            } ?>><a class="page-link" href="index.php?p=<?php echo $page + '1'; ?>">ต่อไป</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <?php } ?>
    </div>

    <?php include('footer.php'); ?>