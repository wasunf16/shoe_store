<?php include('header.php'); ?>

</head>
<?php

$obj_type = new ConnectDB();
$result_type = $obj_type->queryAll('tbl_type_product');
$row_type = $result_type->fetch_all(MYSQLI_ASSOC);

?>


<?php

if (isset($_POST['submit'])) {

  $obj_add = new Cargo();
  $result_add = $obj_add->cargoAdd(
      $_FILES['img'],
      $_POST['name'],
      $_POST['detail'],
      $_POST['price'],
      $_POST['amount'],
      $_POST['type'],
      $_POST['unit']
  );

  if ($result_add) {
    echo "
    <script>
      alert('เพิ่มสำเร็จ');
      location.href='cargo_show.php';  
    </script>";
  } else {
    echo "
    <script>
      alert('การทำงานผิดพลาด');
      window.history.back();
    </script>";
  }
}

?>

<body>

    <?php include('navbar.php'); ?>

    <div class="container-fluid">
        <div class="row">
            <?php include('sidebar.php'); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="row mt-4">
                    <h2>เพิ่มสินค้า</h2>
                    <hr>
                    <div class="col-md-6">
                        <form action="" method="POST" enctype="multipart/form-data" class="row g-3 col-md-12">
                            <div class="col-md-12">
                                <label for="img" class="form-label">รูปภาพสินค้า</label>
                                <input name="img" type="file" class="form-control" id="img" required>
                            </div>
                            <div class="col-md-12">
                                <label for="name" class="form-label">ชื่อสินค้า</label>
                                <input name="name" type="text" class="form-control" id="name" required>
                            </div>
                            <div class="col-md-12">
                                <label for="detail" class="form-label">รายละเอียด</label>
                                <textarea name="detail" type="text" class="form-control" id="detail" rows="8" required></textarea>
                            </div>
                            <div class="col-md-4">
                                <label for="unit" class="form-label">ไซส์</label>
                                <input name="unit" type="text" class="form-control" id="unit" required>
                            </div>
                            <div class="col-md-4">
                                <label for="price" class="form-label">ราคา</label>
                                <input name="price" type="number" class="form-control" id="price" required>
                            </div>
                            <div class="col-md-4">
                                <label for="amount" class="form-label">จำนวน</label>
                                <input name="amount" type="number" class="form-control" id="amount" required>
                            </div>
                            <div class="col-md-12">
                                <label for="password" class="form-label">ประเภท</label>
                                <select name="type" id="" class="form-select" required>
                                    <option value="">-- เลือก --</option>
                                    <?php foreach ($row_type as $key => $value) { ?>
                                        <option value="<?= $value['tp_id'] ?>"><?= $value['tp_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <!-- <div class="col-12">
                                <label for="inputAddress" class="form-label">โปรโมชั่นส่วนลด: &nbsp;&nbsp;</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="promotion" id="promotion_on" value="on">
                                    <label class="form-check-label" for="promotion_on">มี</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="promotion" id="promotion_off" value="off" checked>
                                    <label class="form-check-label" for="promotion_off">ไม่มี</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="promotion_value" class="form-label">ส่วนลด %</label>
                                <input name="promotion_value" type="number" class="form-control" id="promotion_value">
                            </div> -->
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary w-25" name="submit">ยืนยัน</button>
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