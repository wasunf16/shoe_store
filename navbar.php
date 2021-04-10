<div class="container">
    <img src="img/banner.jpg" style="width:100%;max-height:250px;min-height:150px;" class="img-fluid">

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="img/logo.png" style="height:35px;width:55px;"> ร้านขายรองเท้า</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            ประเภท
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            $objListType = new Cargo();
                            $rowListType = $objListType->cargoGetTypeAll();
                            foreach ($rowListType as $key => $value) {
                            ?>
                                <li><a class="dropdown-item" href="index.php?type=<?= $rowListType[$key]['tp_id']; ?>"><?= $rowListType[$key]['tp_name']; ?></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?popular">ยอดนิยม <sup><img src="img/hot.gif" style="width:25px;"></sup></a>
                    </li>
                </ul>
                <ul class="navbar-nav d-flex">
                    <?php
                    if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 'member') { ?>
                        <a href="member_cart.php" class="btn btn-primary me-2"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ตะกร้า</a>
                        <?php
                        $obj_fetchNameNav = new Member();
                        $row_fetchNameNav = $obj_fetchNameNav->memberGetById($_SESSION['user']['id']);
                        ?>
                        <div class="dropdown me-2">
                            <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i> <?= $row_fetchNameNav[0]['u_fname'] . ' ' . $row_fetchNameNav[0]['u_lname'] ?>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="member_profile.php">แก้ไขข้อมูล</a></li>
                                <li><a class="dropdown-item" href="member_payment_list.php">รายการสั่งซื้อ</a></li>
                                <li><a class="dropdown-item" href="member_shipment.php">รายการจัดส่ง</a></li>
                            </ul>
                        </div>
                        <a href="logout.php" class="btn btn-danger"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                    <?php
                    } else if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 'admin') { ?>
                        <a href="logout.php" class="btn btn-danger"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                    <?php } else { ?>
                        <a href="login.php" class="btn btn-success me-2"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
                        <a href="register.php" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> สมัครสมาชิก</a>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>