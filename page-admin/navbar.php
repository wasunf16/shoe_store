<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">ร้านขายรองเท้า</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav px-3 w-100 d-flex p-2 bd-highlight flex-row-reverse">
        <li class="nav-item text-nowrap">
            <a class="btn btn-danger" href="../logout.php">ออกจากระบบ</a>
        </li>
        <li class="nav-item text-nowrap">
            <a class="nav-link me-2" href="#"><?= $_SESSION['user']['fname'] . ' ' . $_SESSION['user']['lname']; ?></a>
        </li>
    </ul>
</header>