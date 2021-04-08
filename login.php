<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<?php include('header.php'); ?>


</head>

<?php
if (isset($_POST['submit'])) {
    $obj = new LoginRegister();
    $cg_id = isset($_GET['cg_id']) ? $_GET['cg_id'] : '';
    $result = $obj->CheckLogin($_POST['username'], $_POST['password'],$cg_id);
    if ($result == false) {
        $status = "<span style='color:red;'>Username หรือ Password ไม่ถูกต้อง</span>";
    }
}

?>

<body class="bgc-gray bgm-stoes">
    <?php include('navbar.php'); ?>
    <div class="container p-4 pb-5 bgc-white shadow-sm rounded min-height">
        <div class="row mt-5">
            <main class="form-signin mx-auto">
                <form action="" method="POST">
                    <div class="box text-center mx-auto">
                        <img class="mb-4 " src="img/lock.jpg" height="200">
                        <h1 class="h3 mb-3 fw-normal">เข้าสู่ระบบ</h1>
                    </div>

                    <div class="form-floating mb-3 col-md-6 mx-auto">
                        <input name="username" type="text" class="form-control" id="floatingInput" placeholder="Username" autofocus>
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating mb-3 col-md-6 mx-auto">
                        <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="form-floating mb-3 col-md-6 mx-auto">
                        <?php if (!empty($status)) {
                            echo $status;
                        } ?>
                    </div>
                    <div class="form-floating mb-3 col-md-6 mx-auto">
                        <button class="w-100 btn btn-lg btn-success " type="submit" name="submit"><i class="fa fa-key" aria-hidden="true"></i> Login</button>
                    </div>

                </form>
            </main>
        </div>
    </div>
    <script src="bootstrap5/bootstrap.bundle.min.js"></script>
</body>

</html>