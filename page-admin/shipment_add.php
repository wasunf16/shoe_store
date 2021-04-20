<?php include('header.php'); ?>

</head>

<body>
    <?php
        if(isset($_POST['submit'])){
            date_default_timezone_set("Asia/Bangkok");
            $date = date("Y-m-d H:i:s");
            $obj = new Shipment();
            $result = $obj->shipmentUpdate($_POST['id'], $_POST['code'], $_POST['name'], $_POST['number'], $date);
        }
    ?>
    <?php include('navbar.php'); ?>

    <div class="container-fluid">
        <div class="row my-4">
            <?php include('sidebar.php'); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="row mt-2">
                    <!-- <h2>Home</h2>
                    <hr> -->
                    <div class="col-md-6">
                        <form action="" method="POST" enctype="multipart/form-data" class="row g-3 col-md-12">
                            <div class="col-md-12">
                                <label for="code" class="form-label" id="code">
                                    <h5>รหัสการสั่งซื้อ</h5>
                                </label>
                                <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                                <input name="code" type="text" class="form-control" id="code" value="<?= $_GET['code'] ?>" readonly>
                            </div>
                            <div class="col-md-12">
                                <label for="name" class="form-label">
                                    <h5>บริษัทขนส่ง</h5>
                                </label>
                                <select name="name" id="name" class="form-select" required>
                                    <option value="">-- เลือก --</option>
                                    <option value="ไปรษณีย์ไทย EMS">ไปรษณีย์ไทย EMS</option>
                                    <option value="Kerry Express">Kerry Express</option>
                                    <option value="DHL Express">DHL Express</option>
                                    <option value="Ninja Van">Ninja Van</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="number" class="form-label">
                                    <h5>หมายเลขพัสดุ</h5>
                                </label>
                                <input name="number" type="text" class="form-control" id="number" required>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary w-25" name="submit" onclick="return confirm('ยืนยัน?');">ยืนยันการจัดส่ง</button>
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