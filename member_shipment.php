<?php 
include('header.php');
checkSessionMember()
?>

</head>
<?php
date_default_timezone_set("Asia/Bangkok");
$obj = new ConnectDB();
$objModal = new ConnectDB();


//display
if (isset($_GET['display'])) {
    switch ($_GET['display']) {
        case 'success':
            $result = $obj->query("SELECT * FROM tbl_shipment as sm INNER JOIN tbl_payment AS pm ON sm.sm_pm_code = pm.pm_code INNER JOIN tbl_user as u ON pm.pm_u_id = u.u_id WHERE sm.sm_status = 'จัดส่งแล้ว' AND  pm.pm_u_id = '".$_SESSION['user']['id']."' ");
            break;
        // case 'delete':
        //     $result = $obj->query("SELECT * FROM tbl_shipment as sm INNER JOIN tbl_payment AS pm ON sm.sm_pm_code = pm.pm_code INNER JOIN tbl_user as u ON pm.pm_u_id = u.u_id WHERE sm.sm_status = 'ยังไม่ได้จัดส่ง' ");
        //     break;
        case 'wait':
            $result = $obj->query("SELECT * FROM tbl_shipment as sm INNER JOIN tbl_payment AS pm ON sm.sm_pm_code = pm.pm_code INNER JOIN tbl_user as u ON pm.pm_u_id = u.u_id WHERE sm.sm_status = 'รอดำเนินการ' AND  pm.pm_u_id = '".$_SESSION['user']['id']."'  ");
            break;
    }
} else {
    $result = $obj->query("SELECT * FROM tbl_shipment as sm INNER JOIN tbl_payment AS pm ON sm.sm_pm_code = pm.pm_code INNER JOIN tbl_user as u ON pm.pm_u_id = u.u_id WHERE pm.pm_u_id = '".$_SESSION['user']['id']."' ");
}
// END display

if (isset($_GET['action'])) {
    $objAction = new Cargo();
    switch ($_GET['action']) {
        case 'allow':
            $resultAllow = $objAction->cargoPaymentAllow($_GET['id'], $_GET['code']);
            break;
        case 'delete':
            $resultDelete = $objAction->cargoPaymentDeny($_GET['id'], $_GET['code']);
            break;
        case 'accept':
            $objAction = new Shipment();
            $date = date("Y-m-d H:i:s");
            $resultAccept = $objAction->shipmentAccept($_GET['id'],$date);
            break;
    }
}

?>

<body class="bgc-gray bgm-stoes">

    <?php include('navbar.php'); ?>

    <div class="container p-4 pb-5 bgc-white shadow-sm rounded min-height">
        <div class="row my-4">
            <h2>รายการจัดส่งสินค้า</h2>
            <hr>
            <div class="row mb-3">
                <div class="col-md-12">
                    <!-- <a href="order_show.php" class="btn btn-sm btn-outline-info"><i class="fa fa-clock-o" aria-hidden="true"></i> รายการสั่งซื้อ</a>
                    <a href="?display=success" class="btn btn-sm btn-outline-success"><i class="fa fa-check" aria-hidden="true"></i> รายการจัดส่ง</a> -->
                </div>
            </div>
            <table id="dtb" class="table table-striped table-hover" style="width:100%">
                <thead>
                    <tr class="table-success">
                        <!-- <th>IMG</th> -->
                        <th>รหัสการสั่งซื้อ</th>
                        <th>บริษัทจัดส่ง</th>
                        <th>เลขพัสดุ</th>
                        <th>วันเวลาที่จัดส่ง</th>
                        <th>วันเวลาที่ได้รับ</th>
                        <th>สถานะ</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_array()) { ?>
                        <tr>
                            <td><?= $row['sm_pm_code']; ?></td>
                            <td><?php if(empty($row['sm_company'])){echo'-';}else{echo $row['sm_company'];} ?></td>
                            <td><?php if(empty($row['sm_code'])){echo'-';}else{echo $row['sm_code'];} ?></td>
                            <td><?php if(empty($row['sm_date'])){echo'-';}else{echo ConvertDateToThai($row['sm_date']);} ?></td>
                            <td><?php if(empty($row['sm_date_receive'])){echo'-';}else{echo ConvertDateToThai($row['sm_date_receive']);} ?></td>
                            <td><?= $row['sm_status']; ?></td>
                            <td width="20%">
                                <?php if (isset($_GET['display']) && $_GET['display'] == 'success') { ?>
                                    <button class="btn btn-sm btn-info m-0" type="button" data-bs-toggle="modal" data-bs-target="#Modal<?= $row['pm_id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i> รายละเอียด</button>
                                <?php } else if (isset($_GET['display']) && $_GET['display'] == 'delete') { ?>
                                    <button class="btn btn-sm btn-info m-0" type="button" data-bs-toggle="modal" data-bs-target="#Modal<?= $row['pm_id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i> รายละเอียด</button>
                                <?php } else { ?>
                                    <button class="btn btn-sm btn-info m-0" type="button" data-bs-toggle="modal" data-bs-target="#Modal<?= $row['pm_id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i> รายละเอียด</button>
                                    <?php if($row['sm_status'] == 'จัดส่งแล้ว'){ ?>
                                        <a href="?action=accept&id=<?= $row['sm_id']; ?>" class="btn btn-success btn-sm" onclick="return confirm('ยืนยัน?');"><i class="fa fa-check" aria-hidden="true" ></i> ได้รับสินค้าแล้ว</a>
                                    <?php } ?>
                                    <!-- <a href="?action=allow&id=<?= $row['pm_id']; ?>&code=<?= $row['pm_code']; ?>" class="btn btn-sm btn-success m-0"><i class="fa fa-check" aria-hidden="true"></i> ยืนยัน</a>
                                    <a href="?action=delete&id=<?= $row['pm_id']; ?>&code=<?= $row['pm_code']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('ยืนยัน?');"><i class="fa fa-times" aria-hidden="true"></i> ไม่อนุมัติ</a> -->
                                <?php } ?>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="Modal<?= $row['pm_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">รายละเอียดการจัดส่ง</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        
                                        <div class="contaier">
                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <h6><b>รหัสสั่งซื้อ : </b> <?= $row['pm_code']; ?></h6>
                                                    <h6><b>ราคารวม : </b> <?= number_format($row['pm_total']); ?></h6>
                                                    <h6><b>วันที่สั่งซื้อ : </b> <?= ConvertDateToThai($row['pm_date']); ?></h6>
                                                    <h6><b>สถานะการสั่งซื้อ : </b> <?= $row['pm_status']; ?></h6>
                                                    <h6><b>ชื่อ : </b> <?= $row['u_fname'].' '.$row['u_lname']; ?></h6>
                                                    <h6><b>ที่อยู่ : </b> <?= $row['pm_address']; ?></h6>
                                                    <h6><b>โทร : </b> <?= $row['u_tel']; ?></h6>
                                                    <h6><b>สถานะการจัดส่ง : </b> <?= $row['sm_status']; ?></h6>
                                                    <h6><b>บริษัทขนส่ง : </b> <?php if(empty($row['sm_company'])){echo"-";}else{echo$row['sm_company'];}  ?></h6>
                                                    <h6><b>เลขพัสดุ : </b> <?php if(empty($row['sm_code'])){echo"-";}else{echo$row['sm_code'];}  ?></h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <hr>
                                                    <h4>รายการสินค้า</h4>
                                                    <?php
                                                    $resultModal = $objModal->query("SELECT * FROM tbl_payment_list as pl INNER JOIN tbl_cargo as cg ON pl.pl_cg_id=cg.cg_id WHERE  pl.pl_pm_code = '" . $row['pm_code'] . "' ");
                                                    while ($rowModal = $resultModal->fetch_array()) {
                                                    ?>
                                                        <h6><b>รหัสสินค้า: </b><?= $rowModal['cg_code']; ?> <b>ไซต์: </b><?= $rowModal['cg_unit']; ?><b> จำนวน:</b> <?= $rowModal['pl_amount']; ?> คู่</h6>
                                                    <?php } ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> ปิด</button>
                                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Close modal -->

                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>


    <?php include('call_datatable.php'); ?>
    <script>
        $(document).ready(function() {
            $('#dtb').DataTable({
                "order": [
                    [0, 'desc']
                ]
            });
        });
    </script>
    
    <?php include('footer.php'); ?>
