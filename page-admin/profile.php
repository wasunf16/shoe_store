<?php include('header.php'); ?>

</head>

<body>
    <?php

    $obj = new ConnectDB();
    $result = $obj->query("SELECT * FROM tbl_user WHERE u_id = '".$_SESSION['user']['id']."' ");
    $row = $result->fetch_array();

    if(isset($_POST['submit'])){
        $obj = new User();
        $result = $obj->userEdit($_POST['id'], $_POST['username'], $_POST['password'], $_POST['fname'], $_POST['lname'], $_POST['sex'], $_POST['address'], $_POST['email'], $_POST['tel']);
    }

    ?>
    <?php include('navbar.php'); ?>

    <div class="container-fluid">
        <div class="row my-4">
            <?php include('sidebar.php'); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="row mt-2">
                    <h2>Home</h2>
                    <hr>
                    <div class="container">
                        <div class="card col-md-7">
                            <!-- <div class="card-header">
                                <h2><i class="fa fa-user" aria-hidden="true"></i> ข้อมูลสมาชิก</h2>
                            </div> -->
                            <div class="card-body">
                                <div class="row">
                                    <form action="" method="POST" class="row g-3 col-md-12 mx-auto">
                                        <div class="col-md-6">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="hidden" name="id" value="<?= $row['u_id'] ?>">
                                            <input name="username" type="text" class="form-control" id="username" value="<?= $row['u_username'] ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="password" class="form-label">Password</label>
                                            <input name="password" type="password" class="form-control" id="password" value="<?= $row['u_password'] ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="fname" class="form-label">ชื่อ</label>
                                            <input name="fname" type="text" class="form-control" id="fname" value="<?= $row['u_fname'] ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="lname" class="form-label">นามสกุล</label>
                                            <input name="lname" type="text" class="form-control" id="lname" value="<?= $row['u_lname'] ?>">
                                        </div>
                                        <div class="col-12">
                                            <label for="address" class="form-label">ที่อยู่</label>
                                            <textarea name="address" type="text" class="form-control" id="address"><?= $row['u_address'] ?></textarea>
                                        </div>
                                        <div class="col-12">
                                            <label for="inputAddress" class="form-label">เพศ</label>
                                            <div class="form-check">
                                                <input name="sex" value="ชาย" class="form-check-input" type="radio" id="male" <?php if ($row['u_sex'] == 'ชาย') {
                                                                                                                                    echo 'checked';
                                                                                                                                } ?>>
                                                <label class="form-check-label" for="male">
                                                    ชาย
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input name="sex" value="หญิง" class="form-check-input" type="radio" id="female" <?php if ($row['u_sex'] == 'หญิง') {
                                                                                                                                        echo 'checked';
                                                                                                                                    } ?>>
                                                <label class="form-check-label" for="female">
                                                    หญิง
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email" class="form-label">Email</label>
                                            <input name="email" type="email" class="form-control" id="email" value="<?= $row['u_email'] ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tel" class="form-label">เบอร์โทร</label>
                                            <input name="tel" type="text" class="form-control" id="tel" maxlength="10" value="<?= $row['u_tel'] ?>">
                                        </div>

                                </div>
                            </div>
                            <div class="card-footer mt-4">
                                <button type="submit" class="btn btn-warning" name="submit"><i class="fa fa-check" aria-hidden="true"></i> แก้ไข</button>
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