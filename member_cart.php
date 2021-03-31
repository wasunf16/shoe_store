<?php include('header.php'); ?>
</head>
<?php
$obj = new ConnectDB();
$result = $obj->query("SELECT * FROM tbl_cargo");
$row = $result->fetch_all(MYSQLI_ASSOC);
?>

<body style="background-color: #eee;">
    <?php include('navbar.php'); ?>
    <div class="container">
        <div class="row my-5">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <h3 class="card-header text-center bg-warning"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> ตะกร้าสินค้า</h3>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">IMG</th>
                                    <th scope="col">สินค้า</th>
                                    <th scope="col">ราคา</th>
                                    <th scope="col">จำนวน</th>
                                    <th scope="col">จำนวน</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>รวมทั้งหมด </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-danger btn-sm">ล้าง</a>
                            <a href="#" class="btn btn-warning btn-sm">คำนวนราคา</a>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="d-block btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> ยืนยันคำสั่งซื้อ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>