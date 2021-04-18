<?php include('header.php'); ?>

</head>


<?php

if (isset($_POST['submit'])) {
    $obj = new User();
    $result = $obj->userEditByID($_POST['id'],$_POST['username'], $_POST['password'], $_POST['fname'], $_POST['lname'], $_POST['sex'], $_POST['address'], $_POST['email'], $_POST['tel'], $_POST['role']);
    if ($result == true) {
        alertGo("เพิ่มสำเร็จ", "user_show.php");
    } else {
        alertBack("ผิดพลาด");
    }
}

$obj = new User();
$row = $obj->userGetById($_GET['id']);

?>

<body>

    <?php include('navbar.php'); ?>

    <div class="container-fluid">
        <div class="row">
            <?php include('sidebar.php'); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="row mt-4">
                    <h2>แก้ไขข้อมูลผู้ใช้งาน</h2>
                    <hr>
                    <div class="container">
                        <div class="card col-md-6">
                            <div class="card-body">
                                <div class="row">
                                    <form action="" method="POST" class="row g-3 col-md-12 mx-auto">
                                        <div class="col-md-6">
                                            <label for="username" class="form-label">Username</label>
                                            <input name="id" type="hidden"value="<?=$_GET['id'];?>">
                                            <input name="username" type="text" class="form-control" id="username" value="<?=$row[0]['u_username'];?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="password" class="form-label">Password</label>
                                            <input name="password" type="password" class="form-control" id="password" value="<?=$row[0]['u_password'];?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="fname" class="form-label">ชื่อ</label>
                                            <input name="fname" type="text" class="form-control" id="fname" value="<?=$row[0]['u_fname'];?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="lname" class="form-label">นามสกุล</label>
                                            <input name="lname" type="text" class="form-control" id="lname" value="<?=$row[0]['u_lname'];?>">
                                        </div>
                                        <div class="col-12">
                                            <label for="address" class="form-label">ที่อยู่</label>
                                            <textarea name="address" type="text" class="form-control" id="address" required><?=$row[0]['u_address'];?></textarea>
                                        </div>
                                        <div class="col-12">
                                            <label for="inputAddress" class="form-label">เพศ</label>
                                            <div class="form-check">
                                                <input name="sex" value="ชาย" class="form-check-input" type="radio" id="male" <?php if($row[0]['u_sex']=='ชาย'){echo"checked";} ?>>
                                                <label class="form-check-label" for="male">
                                                    ชาย
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input name="sex" value="หญิง" class="form-check-input" type="radio" id="female" <?php if($row[0]['u_sex']=='หญิง'){echo"checked";} ?>>
                                                <label class="form-check-label" for="female">
                                                    หญิง
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email" class="form-label">Email</label>
                                            <input name="email" type="email" class="form-control" id="email" value="<?=$row[0]['u_email'];?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tel" class="form-label">เบอร์โทร</label>
                                            <input name="tel" class="form-control" id="tel" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="10" value="<?=$row[0]['u_tel'];?>">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputAddress" class="form-label">ประเภท</label>
                                            <div class="form-check">
                                                <input name="role" value="admin" class="form-check-input" type="radio" id="admin" <?php if($row[0]['u_role']=='admin'){echo"checked";} ?>>
                                                <label class="form-check-label" for="admin">
                                                    Admin
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input name="role" value="user" class="form-check-input" type="radio" id="user" <?php if($row[0]['u_role']=='user'){echo"checked";} ?>>
                                                <label class="form-check-label" for="user">
                                                    User
                                                </label>
                                            </div>
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