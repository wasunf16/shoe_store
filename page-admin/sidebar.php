<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?php echo (activeNav() == 'index.php' ? ' active' : ''); ?>" aria-current="page" href="index.php">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    หน้าแรก
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo (activeNav() == 'cargo_show.php' ? ' active' : ''); ?>" href="cargo_show.php">
                    <i class="fa fa-database" aria-hidden="true"></i>
                    ข้อมูลสินค้า
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo (activeNav() == 'order_show.php' ? ' active' : ''); ?>" href="order_show.php">
                    <i class="fa fa-money" aria-hidden="true"></i>
                    ข้อมูลการสั่งซื้อ
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo (activeNav() == 'shipment_show.php' ? ' active' : ''); ?>" href="shipment_show.php">
                    <i class="fa fa-car" aria-hidden="true"></i>
                    ข้อมูลการจัดส่ง
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo (activeNav() == 'member_show.php' ? ' active' : ''); ?>" href="member_show.php">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    ข้อมูลลูกค้า
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo (activeNav() == 'user_show.php' ? ' active' : ''); ?>" href="user_show.php">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    ข้อมูลพนักงาน
                </a>
            </li>
        </ul>

        <!-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Saved reports</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle"></span>
            </a>
        </h6> -->
        <!-- <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Current month
                </a>
            </li>
        </ul> -->
    </div>
</nav>