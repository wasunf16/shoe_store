<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">ร้านขายรองเท้า</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link activee" aria-current="page" href="index.php">หน้าแรก</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        ประเภท
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">โปรโมชั่น <sup><img src="img/new.gif" style="width:25px;"></sup></a>
                </li>
            </ul>
            <ul class="navbar-nav d-flex">
                <?php
                if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] =='member' ) { ?>
                    <a href="member_cart.php" class="btn btn-primary me-2"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ตะกร้า</a>
                    <a href="member_profile.php" class="btn btn-light me-2"><i class="fa fa-user" aria-hidden="true"></i> <?=$_SESSION['user']['fname'].' '.$_SESSION['user']['lname']?></a>
                    <a href="logout.php" class="btn btn-danger"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                <?php }else{ ?>
                    <a href="login.php" class="btn btn-success me-2"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
                    <a href="register.php" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> สมัครสมาชิก</a>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>