<?php include('header.php'); ?>

</head>
<?php

// $obj_type = new ConnectDB();
// $result_type = $obj_type->queryAll('tbl_type_product');
// $row_type = $result_type->fetch_all(MYSQLI_ASSOC);

?>


<?php

if (isset($_POST['submit']) && !empty($_POST['name'])) {
  $obj_add = new Cargo();
  $tp_name = $_POST['name'];
  $result_add = $obj_add->cargoTypeAdd($tp_name);
}

?>

<body>

    <?php include('navbar.php'); ?>

    <div class="container-fluid">
        <div class="row">
            <?php include('sidebar.php'); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="row mt-4">
                    <h2>เพิ่มประเภทสินค้า</h2>
                    <hr>
                    <div class="col-md-6">
                        <form action="" method="POST" enctype="multipart/form-data" class="row g-3 col-md-12">
                            <div class="col-md-12">
                                <label for="name" class="form-label">ชื่อประเภทสินค้า</label>
                                <input name="name" type="text" class="form-control" id="name" required>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary w-25" name="submit">เพิ่ม</button>
                                <button type="button" class="btn btn-danger" name="submit" onclick="window.history.back();">ยกเลิก</button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <?php include('call_datatable.php'); ?>
    <script src="../bootstrap5/bootstrap.bundle.min.js"></script>
</body>

</html>