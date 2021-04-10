<?php include('header.php'); ?>

</head>


<?php

if (isset($_POST['submit'])) {
    $obj = new Member();
    $result = $obj->memberAdd($_POST['username'],$_POST['password'],$_POST['fname'],$_POST['lname'],$_POST['sex'],$_POST['address'],$_POST['email'],$_POST['tel']);
    if($result == true){
        alertGo("เพิ่มสำเร็จ","member_show.php");
    }else{
        alertBack("ผิดพลาด");
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
                    <h2>เพิ่มข้อมูลลูกค้า</h2>
                    <hr>
                    <div class="container">
                        <div class="card col-md-6">
                            <div class="card-body">
                                <div class="row">
                                    <form action="" method="POST" class="row g-3 col-md-12 mx-auto">
                                        <div class="col-md-6">
                                            <label for="username" class="form-label">Username</label>
                                            <input name="username" type="text" class="form-control" id="username" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="password" class="form-label">Password</label>
                                            <input name="password" type="password" class="form-control" id="password" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="fname" class="form-label">ชื่อ</label>
                                            <input name="fname" type="text" class="form-control" id="fname" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="lname" class="form-label">นามสกุล</label>
                                            <input name="lname" type="text" class="form-control" id="lname" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="address" class="form-label">ที่อยู่</label>
                                            <textarea name="address" type="text" class="form-control" id="address" required></textarea>
                                        </div>
                                        <div class="col-12">
                                            <label for="inputAddress" class="form-label">เพศ</label>
                                            <div class="form-check">
                                                <input name="sex" value="ชาย" class="form-check-input" type="radio" id="male" required>
                                                <label class="form-check-label" for="male">
                                                    ชาย
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input name="sex" value="หญิง" class="form-check-input" type="radio" id="female" required>
                                                <label class="form-check-label" for="female">
                                                    หญิง
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email" class="form-label">Email</label>
                                            <input name="email" type="email" class="form-control" id="email" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tel" class="form-label">เบอร์โทร</label>
                                            <input name="tel" class="form-control" id="tel" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="10" required>
                                        </div>

                                </div>
                            </div>
                            <div class="card-footer mt-4">
                                <button type="submit" class="btn btn-success" name="submit">ยืนยัน</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <?php include('call_datatable.php'); ?>
    <script src="../bootstrap5/bootstrap.bundle.min.js"></script>
</body>

</html>