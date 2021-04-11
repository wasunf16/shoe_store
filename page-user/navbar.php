<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow no-print">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" style="font-size:23px;" href="index.php">ร้านขายรองเท้า</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav px-3 w-100 d-flex p-2 bd-highlight flex-row-reverse">
        <li class="nav-item text-nowrap">
            <a class="btn btn-danger" href="../logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> ออกจากระบบ</a>
        </li>
        <li class="nav-item text-nowrap">
            <?php
                $objName = new User();
                $rowName = $objName->userGetById($_SESSION['user']['id']);
            ?>
            <a class="me-2 btn btn-outline-secondary" href="profile.php"><i class="fa fa-user-o" aria-hidden="true"></i> <?= $rowName[0]['u_fname'] . ' ' . $rowName[0]['u_lname']; ?></a>
            <!-- <a class="nav-link me-2" href="#"><i class="fa fa-user-o" aria-hidden="true"></i> <?= $_SESSION['user']['fname'] . ' ' . $_SESSION['user']['lname']; ?></a> -->
        </li>
    </ul>
</header>