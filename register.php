<?php include('header.php'); ?>
</head>
<?php
    $obj = new LoginRegister();
    if(isset($_POST['submit'])){
        $result = $obj->register($_POST['username'],$_POST['password'],$_POST['fname'],$_POST['lname'],$_POST['sex'],$_POST['address'],$_POST['email'],$_POST['tel']);
        if($result == true){
            echo "
            <script>
                alert('สมัครสมาชิกสำเร็จ');
                window.location.href='login.php';
            </script>
            ";
        }else{
            echo "
            <script>
                alert('สมัครสมาชิกล้มเหลว');
                window.history.back();
            </script>
            ";
        }
    }
?>
<body class="bgc-gray">
    <?php include('navbar.php'); ?>
    <div class="container p-4 pb-5 bgc-white shadow-sm rounded min-height">
        <div class="card">
            <div class="card-header">
                <h2>สมัครสมาชิก</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <form action="" method="POST" class="row g-3 col-md-6 mx-auto">
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
                                <input name="sex" value="หญิง" class="form-check-input" type="radio"  id="female" required>
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
                            <input name="tel" type="text" class="form-control" id="tel" maxlength="10" required>
                        </div>

                </div>
            </div>
            <div class="card-footer mt-4">
                <button type="submit" class="btn btn-success" name="submit">ยืนยันการสมัคร</button>
            </div>
            </form>
        </div>
    </div>
    <script src="bootstrap5/bootstrap.bundle.min.js"></script>
</body>

</html>