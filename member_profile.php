<?php include('header.php'); ?>
</head>
<?php


$obj_member = new Member();
$row_member = $obj_member->memberGetById($_SESSION['user']['id']);
if (isset($_POST['submit'])) {
    $resultEditMember = $obj_member->memberEdit($_POST['id'],$_POST['username'],$_POST['password'],$_POST['fname'],$_POST['lname'],$_POST['sex'],$_POST['address'],$_POST['email'],$_POST['tel']);
}


?>

<body class="bgc-gray bgm-stoes">
    <?php include('navbar.php'); ?>
    <div class="container p-4 pb-5 bgc-white shadow-sm rounded min-height">
        <div class="card">
            <div class="card-header">
                <h2><i class="fa fa-user" aria-hidden="true"></i> ข้อมูลผู้ใช้งาน</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <form action="" method="POST" class="row g-3 col-md-6 mx-auto">
                        <div class="col-md-6">
                            <label for="username" class="form-label">Username</label>
                            <input type="hidden" name="id" value="<?= $row_member[0]['u_id'] ?>">
                            <input name="username" type="text" class="form-control" id="username" value="<?= $row_member[0]['u_username'] ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" id="password" value="<?= $row_member[0]['u_password'] ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="fname" class="form-label">ชื่อ</label>
                            <input name="fname" type="text" class="form-control" id="fname" value="<?= $row_member[0]['u_fname'] ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="lname" class="form-label">นามสกุล</label>
                            <input name="lname" type="text" class="form-control" id="lname" value="<?= $row_member[0]['u_lname'] ?>">
                        </div>
                        <div class="col-12">
                            <label for="address" class="form-label">ที่อยู่</label>
                            <textarea name="address" type="text" class="form-control" id="address"><?= $row_member[0]['u_address'] ?></textarea>
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">เพศ</label>
                            <div class="form-check">
                                <input name="sex" value="ชาย" class="form-check-input" type="radio" id="male" <?php if ($row_member[0]['u_sex'] == 'ชาย') {
                                                                                                                    echo 'checked';
                                                                                                                } ?>>
                                <label class="form-check-label" for="male">
                                    ชาย
                                </label>
                            </div>
                            <div class="form-check">
                                <input name="sex" value="หญิง" class="form-check-input" type="radio" id="female" <?php if ($row_member[0]['u_sex'] == 'หญิง') {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>>
                                <label class="form-check-label" for="female">
                                    หญิง
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" id="email" value="<?= $row_member[0]['u_email'] ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="tel" class="form-label">เบอร์โทร</label>
                            <input name="tel" type="text" class="form-control" id="tel" maxlength="10" value="<?= $row_member[0]['u_tel'] ?>">
                        </div>

                </div>
            </div>
            <div class="card-footer mt-4">
                <button type="submit" class="btn btn-warning" name="submit"><i class="fa fa-check" aria-hidden="true"></i> แก้ไข</button>
            </div>
            </form>
        </div>
    </div>
    <script src="bootstrap5/bootstrap.bundle.min.js"></script>
</body>

</html>