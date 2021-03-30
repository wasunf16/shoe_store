<?php include('header.php'); ?>
</head>

<body>
    <?php include('navbar.php'); ?>
    <div class="container">
        <div class="row mt-5">
            <div class="d-flex justify-content-between align-items-center bd-highlight">
                <div class="d-flex">
                    <h5>สินค้าทั้งหมด</h5>
                </div>
                <div class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="ค้นหา" aria-label="Search">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i> </button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 mt-2">
                <div class="card h-100">
                    <img src="https://images.unsplash.com/photo-1593642702749-b7d2a804fbcf?ixid=MXwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="card-img-top" style="height:200px;">
                    <div class="card-body">
                        <h5 class="card-title">ร้องเท้ากีฬา</h5>
                        <p class="card-text">฿200 บาท</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-success btn-sm"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> เพิ่มลงตะกร้า</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php include('footer.php'); ?>