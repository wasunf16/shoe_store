<?php

class ConnectDB
{
    protected $db;
    function __construct()
    {
        $DB_HOST = "localhost";
        $DB_USER = "root";
        $DB_PASS = "";
        $DB_NAME = "stoe_store";
        $con = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
        $con->set_charset("utf8");
        if ($con->connect_error) {
            echo "Fail to connect database: " . $con->connect_error;
        }
        date_default_timezone_set("Asia/Bangkok");
        $this->db = $con;
    }

    function query($data)
    {
        $result = $this->db->query($data);
        if ($result == true) {
            return $result;
        } else {
            echo "Error to query.!!";
        }
    }
    function queryAll($table)
    {
        $result = $this->db->query("SELECT * FROM $table");
        return $result;
    }
    function queryByID($table, $where, $id)
    {
        $result = $this->db->query("SELECT * FROM $table WHERE $where = $id ");
        return $result;
    }

    function deleteByID($table, $where, $id)
    {
        $result = $this->db->query("DELETE FROM $table WHERE $where = $id ");
        return $result;
    }
}

class LoginRegister extends ConnectDB
{
    function register($user, $pass, $fname, $lname, $sex, $address, $email, $tel)
    {
        $check = $this->db->query("SELECT u_username FROM tbl_user WHERE u_username = '$user' ");
        if ($check->num_rows != 0) {
            alertBack("Username ซ้ำกัน กรุณาลองใหม่อีกครั้ง");
            exit;
        }
        $result = $this->db->query("INSERT INTO `tbl_user` (`u_id`, `u_username`, `u_password`, `u_fname`, `u_lname`, `u_sex`, `u_address`, `u_email`, `u_tel`, `u_role`) 
                            VALUES (NULL, '$user', '$pass', '$fname', '$lname', '$sex', '$address', '$email', '$tel', 'member');");
        return $result;
    }
    function CheckLogin($user, $pass, $cg_id)
    {
        $userReal = $this->db->real_escape_string($user);
        $passReal = $this->db->real_escape_string($pass);
        $result = $this->db->query("SELECT * FROM tbl_user WHERE `u_username`='$userReal' AND `u_password`='$passReal' ");
        if ($result->num_rows <= 0) {
            return false;
        } else {
            $row = $result->fetch_array();
            $_SESSION['user']['id'] = $row['u_id'];
            $_SESSION['user']['username'] = $row['u_username'];
            $_SESSION['user']['password'] = $row['u_password'];
            $_SESSION['user']['fname'] = $row['u_fname'];
            $_SESSION['user']['lname'] = $row['u_lname'];
            $_SESSION['user']['sex'] = $row['u_sex'];
            $_SESSION['user']['address'] = $row['u_address'];
            $_SESSION['user']['email'] = $row['u_email'];
            $_SESSION['user']['tel'] = $row['u_tel'];
            $_SESSION['user']['role'] = $row['u_role'];

            switch ($_SESSION['user']['role']) {
                case 'admin':
                    header('Location: page-admin/index.php');
                    break;
                case 'user':
                    header('Location: page-user/index.php');
                    break;
                case 'member':
                    if (isset($cg_id) && !empty($cg_id)) {
                        header("Location: member_cart.php?cg_id=$cg_id&action=add");
                    } else {
                        header('Location: index.php');
                    }
                    break;
            }
        }
    }
}

class Cargo extends ConnectDB
{
    function cargofetchByID($id)
    {
        $result = $this->db->query("SELECT * FROM tbl_cargo as cg INNER JOIN tbl_type_product as tp ON cg.cg_type_id = tp.tp_id WHERE cg.cg_id = '$id' ");
        $row = $result->fetch_all(MYSQLI_ASSOC);
        return $row;
    }
    function cargoTypeAll()
    {
        $result = $this->db->query("SELECT * FROM tbl_type_product");
        return $result;
    }
    function cargoAdd($img, $name, $detail, $unit, $price, $amount, $type)
    {

        $resultCode = $this->db->query("SELECT cg_code FROM tbl_cargo ORDER BY cg_code DESC");
        if ($resultCode->num_rows > 0) {
            $row = $resultCode->fetch_array();
            $Epayment = explode('-', $row['cg_code']);
            $cg_code = $Epayment[0] . '-' . $Epayment[1] + 1;
        } else {
            $cg_code = "CG-10001";
        }

        if (isset($img)) {
            $IMG_DIR = "../img_upload/";
            $IMG_NameOld = $img["name"];
            $IMG_tmp =  $img['tmp_name'];
            $IMG_type = strtolower(pathinfo($IMG_NameOld, PATHINFO_EXTENSION));
            $IMG_dateName = date("Ymdhis");
            $IMG_RandomNumberName = rand(1000, 9999);
            $IMG_NameFull = $IMG_dateName . '_' . $IMG_RandomNumberName . '.' . $IMG_type;
            $IMG_UploadStatus = 1;
            if ($IMG_type != "jpg" && $IMG_type != "png" && $IMG_type != "jpeg" && $IMG_type != "gif") {
                $IMG_UploadStatus = 0;
            }

            if ($IMG_UploadStatus == 0) {
                echo "
                <script>
                    alert('Upload รูปภาพล้มเหลว');
                    location.href='cargo_add.php';
                </script>";
            } else {
                if (move_uploaded_file($IMG_tmp, $IMG_DIR . $IMG_NameFull)) {
                    $result = $this->db->query("INSERT INTO `tbl_cargo` (`cg_id`, `cg_code`, `cg_name`, `cg_detail`, `cg_img`, `cg_type_id`, `cg_unit`, `cg_price`, `cg_amount`) 
                    VALUES (NULL, '$cg_code', '$name', '$detail', '$IMG_NameFull', '$type', '$unit', '$price', '$amount');");
                    return $result;
                }
            }
        }
    }
    function cargoEdit($id, $img, $img_old, $name, $detail, $unit, $price, $amount, $type)
    {
        $resultIMG = uploadIMGEdit($img, $img_old, "../img_upload/");

        $result = $this->db->query("UPDATE `tbl_cargo` 
        SET `cg_name` = '$name', 
        `cg_detail` = '$detail', 
        `cg_img` = '$resultIMG', 
        `cg_type_id` = '$type', 
        `cg_unit` = '$unit', 
        `cg_price` = '$price', 
        `cg_amount` = '$amount' WHERE `tbl_cargo`.`cg_id` = '" . $id . "';");
        if ($result == true) {
            alertGo("แก้ไขสำเร็จ", "cargo_show.php");
        } else {
            alertBack("แก้ไขผิดพลาด");
        }
    }
    function cargoDelete($id)
    {
        $result = $this->queryByID('tbl_cargo', 'cg_id', $id);
        $getResult = $result->fetch_array();
        if ($getResult['cg_img']) {
            unlink('../img_upload/' . $getResult['cg_img']);
        }
        $result = $this->db->query("DELETE FROM tbl_cargo WHERE cg_id='$id' ");
        return $result;
    }
    function cargoGetTypeAll()
    {
        $result = $this->db->query("SELECT * FROM `tbl_type_product`");
        $row = $result->fetch_all(MYSQLI_ASSOC);
        return $row;
    }
    function cargoPayment($channel, $total, $date, $address, $img, $uid)
    {
        $resultCode = $this->db->query("SELECT * FROM tbl_payment ORDER BY pm_code DESC LIMIT 1");
        if ($resultCode->num_rows <= 0) {
            $pm_code = "P-10001";
        } else {
            $row = $resultCode->fetch_array();
            $Epayment = explode('-', $row['pm_code']);
            $pm_code = $Epayment[0] . '-' . $Epayment[1] + 1;
        }

        $nameUploadimg = uploadIMG($img, "img_payment/");
        if ($nameUploadimg == false) {
            exit;
        }

        $resultPayment = $this->db->query("INSERT INTO `tbl_payment` (`pm_id`, `pm_code`, `pm_img`, `pm_total`, `pm_u_id` , `pm_channel`, `pm_date`, `pm_address`, `pm_status`) 
                                                VALUES (NULL, '$pm_code', '$nameUploadimg', '$total' , '$uid' , '$channel', '$date', '$address', 'รอตรวจสอบ');");

        foreach ($_SESSION['cart'][$_SESSION['user']['id']] as $key => $value) {
            $resultPaymentList = $this->db->query("INSERT INTO `tbl_payment_list` (`pl_id`, `pl_pm_code`, `pl_cg_id` , `pl_amount`) 
                                                VALUES (NULL, '$pm_code', '$key' , '$value');");
            $QueryCargo = $this->db->query("SELECT * FROM tbl_cargo WHERE cg_id = '$key' ");
            $fetchCargo = $QueryCargo->fetch_array();
            $amountUpdate = $fetchCargo['cg_amount'] - $value;
            $resultUpdateCargo = $this->db->query("UPDATE `tbl_cargo` SET `cg_amount` = '$amountUpdate' WHERE `tbl_cargo`.`cg_id` = '$key';");
        }

        if ($resultPayment == true) {
            unset($_SESSION['cart']);
            echo "
            <script>
                alert('ชำระเงินแล้ว รอการตรวจสอบ');
                window.location.href='member_payment_list.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('จ่ายเงินล้มเหลว');
                window.history.back();
            </script>
            ";
        }
    }

    function cargoPaymentAllow($id, $code)
    {
        $resultUpdate = $this->db->query("UPDATE `tbl_payment` SET `pm_status` = 'ยืนยันแล้ว' WHERE `tbl_payment`.`pm_id` = '$id';");
        $resultInsert = $this->db->query("INSERT INTO `tbl_shipment` (`sm_id`, `sm_company`, `sm_code`, `sm_pm_code`, `sm_status`) VALUES (NULL, '', '', '$code', 'รอดำเนินการ');");
        if ($resultUpdate && $resultInsert) {
            echo "
            <script>
                alert('ยืนยันแล้วเรียบร้อย');
                window.location.href='order_show.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('ยืนยันล้มเหลว');
                window.history.back();
            </script>
            ";
        }
    }
    function cargoPaymentDeny($id, $code)
    {
        $result = $this->db->query("UPDATE `tbl_payment` SET `pm_status` = 'ไม่อนุมัติ' WHERE `tbl_payment`.`pm_id` = '$id';");
        $queryData = $this->db->query("SELECT * FROM tbl_payment as pm INNER JOIN tbl_payment_list as pl ON pm.pm_code=pl.pl_pm_code INNER JOIN tbl_cargo as cg ON pl.pl_cg_id=cg.cg_id WHERE pm.pm_code = '$code' ");
        while ($fetchData = $queryData->fetch_array()) {
            $count = $fetchData['cg_amount'] + $fetchData['pl_amount'];
            $resultUpdate = $this->db->query("UPDATE `tbl_cargo` SET `cg_amount` = '$count' WHERE `tbl_cargo`.`cg_id` = '" . $fetchData['cg_id'] . "';");
        }
        if ($result) {
            echo "
            <script>
                alert('เรียบร้อย');
                window.location.href='order_show.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('ล้มเหลว');
                window.history.back();
            </script>
            ";
        }
    }
    function cargoPaymentRemove($id, $code)
    {
        $queryData = $this->db->query("SELECT * FROM tbl_payment as pm INNER JOIN tbl_payment_list as pl ON pm.pm_code=pl.pl_pm_code INNER JOIN tbl_cargo as cg ON pl.pl_cg_id=cg.cg_id WHERE pm.pm_code = '$code' ");
        while ($fetchData = $queryData->fetch_array()) {
            $dirIMG = $fetchData['pm_img'];
            $resultRemove = $this->db->query("DELETE FROM tbl_payment_list WHERE pl_id = '" . $fetchData['pl_id'] . "' ");
        }

        unlink('../img_payment/' . $dirIMG);

        $result = $this->db->query("DELETE FROM tbl_payment WHERE `pm_id` = '$id';");
        if ($result) {

            echo "
            <script>
                alert('เรียบร้อย');
                window.location.href='order_show.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('ลบล้มเหลว');
                window.history.back();
            </script>
            ";
        }
    }

    function cargoTypeAdd($name)
    {
        $already = $this->db->query("SELECT * FROM tbl_type_product WHERE tp_name = '$name' ");
        if ($already->num_rows > 0) {
            echo alertBack("ชื่อประเภทซ้ำ กรุณาลองใหม่อีกครั้ง");
        } else {
            $result = $this->db->query("INSERT INTO `tbl_type_product` (`tp_id`, `tp_name`) VALUES (NULL, '$name');");
            if ($result == true) {
                alertGo("สำเร็จ", "cargo_type.php");
            } else {
                alertBack("ผิดพลาด");
            }
        }
    }
    function cargoEditByID($id, $name)
    {
        $check = $this->db->query("SELECT tp_name FROM tbl_type_product WHERE tp_name = '$name' AND tp_id != '$id' ");
        if ($check->num_rows != 0) {
            alertBack("ชื่อประเภทซ้ำกัน กรุณาลองใหม่อีกครั้ง");
            exit;
        }
        $result = $this->db->query(
            "UPDATE `tbl_type_product` SET 
            `tp_name` = '$name'
            WHERE `tp_id` = '$id';"
        );
        if ($result == true) {
            alertGo("แก้ไขสำเร็จ", "cargo_type.php");
        } else {
            alertBack("แก้ไขล้มเหลว");
        }
    }
    function cargoTypeRemove($id)
    {
        $result = $this->db->query("DELETE FROM tbl_type_product WHERE tp_id = '$id' ");
        if ($result == true) {
            alertGo("ลบสำเร็จ", "cargo_type.php");
        } else {
            alertBack("ผิดพลาด");
        }
    }
    function cargoView($id, $view)
    {
        $view += 1;
        $result = $this->db->query("UPDATE tbl_cargo SET cg_view = '$view' WHERE cg_id = '$id' ");
    }
}

class User extends ConnectDB
{
    function userGetById($id)
    {
        $result = $this->db->query("SELECT * FROM tbl_user WHERE u_id = '$id' ");
        $row = $result->fetch_all(MYSQLI_ASSOC);
        return $row;
    }

    function userEdit($id, $user, $pass, $fname, $lname, $sex, $address, $email, $tel)
    {
        $result = $this->db->query(
            "UPDATE `tbl_user` SET 
            `u_username` = '$user', 
            `u_password` = '$pass', 
            `u_fname` = '$fname', 
            `u_lname` = '$lname', 
            `u_sex` = '$sex', 
            `u_address` = '$address', 
            `u_email` = '$email', 
            `u_tel` = '$tel' 
            WHERE `tbl_user`.`u_id` = '$id';"
        );
        if ($result == true) {
            alertGo("แก้ไขสำเร็จ", "profile.php");
        } else {
            alertBack("แก้ไขล้มเหลว");
        }
    }
    function userEditByID($id, $user, $pass, $fname, $lname, $sex, $address, $email, $tel, $role)
    {
        $check = $this->db->query("SELECT u_username FROM tbl_user WHERE u_username = '$user' AND u_id != '$id' ");
        if ($check->num_rows != 0) {
            alertBack("Username ซ้ำกัน กรุณาลองใหม่อีกครั้ง");
            exit;
        }
        $result = $this->db->query(
            "UPDATE `tbl_user` SET 
            `u_username` = '$user', 
            `u_password` = '$pass', 
            `u_fname` = '$fname', 
            `u_lname` = '$lname', 
            `u_sex` = '$sex', 
            `u_address` = '$address', 
            `u_email` = '$email', 
            `u_tel` = '$tel',
            `u_role` = '$role' 
            WHERE `tbl_user`.`u_id` = '$id';"
        );
        if ($result == true) {
            alertGo("แก้ไขสำเร็จ", "user_show.php");
        } else {
            alertBack("แก้ไขล้มเหลว");
        }
    }
    function userAdd($user, $pass, $fname, $lname, $sex, $address, $email, $tel, $role)
    {
        $check = $this->db->query("SELECT u_username FROM tbl_user WHERE u_username = '$user' ");
        if ($check->num_rows != 0) {
            alertBack("Username ซ้ำกัน กรุณาลองใหม่อีกครั้ง");
            exit;
        }
        $result = $this->db->query("INSERT INTO `tbl_user` (`u_id`, `u_username`, `u_password`, `u_fname`, `u_lname`, `u_sex`, `u_address`, `u_email`, `u_tel`, `u_role`) 
                            VALUES (NULL, '$user', '$pass', '$fname', '$lname', '$sex', '$address', '$email', '$tel', '$role');");
        return $result;
    }
}

class Shipment extends ConnectDB
{
    function shipmentUpdate($id, $code, $name, $number, $date)
    {
        $result = $this->db->query("UPDATE `tbl_shipment` 
            SET `sm_company` = '$name', 
            `sm_code` = '$number', 
            `sm_date` = '$date', 
            `sm_status` = 'จัดส่งแล้ว' WHERE `tbl_shipment`.`sm_id` = '$id';");
        if ($result == true) {
            alertGo("บันทึกการจัดส่งแล้ว", "shipment_show.php");
        } else {
            alertBack("ผิดพลาด");
        }
    }
    function shipmentAccept($id, $date)
    {
        $result = $this->db->query("UPDATE `tbl_shipment` 
        SET `sm_status` = 'ได้รับสินค้าแล้ว',
        `sm_date_receive` = '$date'
        WHERE `tbl_shipment`.`sm_id` = '$id';");
        if ($result == true) {
            alertGo("เรียบร้อย", "member_shipment.php");
        } else {
            alertBack("ผิดพลาด");
        }
    }
    function shipmentDelete($sm_id, $pm_code)
    {
        $queryData = $this->db->query("SELECT * FROM tbl_payment as pm INNER JOIN tbl_payment_list as pl ON pm.pm_code=pl.pl_pm_code INNER JOIN tbl_cargo as cg ON pl.pl_cg_id=cg.cg_id WHERE pm.pm_code = '$pm_code' ");
        while ($fetchData = $queryData->fetch_array()) {
            $dirIMG = $fetchData['pm_img'];
            $resultRemove = $this->db->query("DELETE FROM tbl_payment_list WHERE pl_id = '" . $fetchData['pl_id'] . "' ");
        }

        unlink('../img_payment/' . $dirIMG);

        $deletePayment = $this->db->query("DELETE FROM tbl_payment WHERE pm_code = '$pm_code' ");
        $deleteShipment = $this->db->query("DELETE FROM tbl_shipment WHERE sm_id = '$sm_id' ");

        if ($deleteShipment == true) {
            alertGo("ลบการจัดส่งเรียบร้อย", "shipment_show.php");
        } else {
            alertBack("ลบการจัดส่งผิดพลาด");
        }
    }
}

class Member extends ConnectDB
{
    function memberGetById($id)
    {
        $result = $this->db->query("SELECT * FROM tbl_user WHERE u_id = '$id' AND u_role = 'member' ");
        $row = $result->fetch_all(MYSQLI_ASSOC);
        return $row;
    }
    function memberEdit($id, $user, $pass, $fname, $lname, $sex, $address, $email, $tel)
    {
        $result = $this->db->query(
            "UPDATE `tbl_user` SET 
            `u_username` = '$user', 
            `u_password` = '$pass', 
            `u_fname` = '$fname', 
            `u_lname` = '$lname', 
            `u_sex` = '$sex', 
            `u_address` = '$address', 
            `u_email` = '$email', 
            `u_tel` = '$tel' 
            WHERE `tbl_user`.`u_id` = '$id';"
        );
        if ($result == true) {
            echo "
            <script>
                alert('แก้ไขสำเร็จ');
                window.location.href='member_profile.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('แก้ไขล้มเหลว');
                window.history.back();
            </script>
            ";
        }
    }
    function memberEditByID($id, $user, $pass, $fname, $lname, $sex, $address, $email, $tel)
    {
        $check = $this->db->query("SELECT u_username FROM tbl_user WHERE u_username = '$user' AND u_id != '$id' ");
        if ($check->num_rows != 0) {
            alertBack("Username ซ้ำกัน กรุณาลองใหม่อีกครั้ง");
            exit;
        }
        $result = $this->db->query(
            "UPDATE `tbl_user` SET 
            `u_username` = '$user', 
            `u_password` = '$pass', 
            `u_fname` = '$fname', 
            `u_lname` = '$lname', 
            `u_sex` = '$sex', 
            `u_address` = '$address', 
            `u_email` = '$email', 
            `u_tel` = '$tel'
            WHERE `tbl_user`.`u_id` = '$id';"
        );
        if ($result == true) {
            alertGo("แก้ไขสำเร็จ", "member_show.php");
        } else {
            alertBack("แก้ไขล้มเหลว");
        }
    }
    function memberAdd($user, $pass, $fname, $lname, $sex, $address, $email, $tel)
    {
        $check = $this->db->query("SELECT u_username FROM tbl_user WHERE u_username = '$user' ");
        if ($check->num_rows != 0) {
            alertBack("Username ซ้ำกัน กรุณาลองใหม่อีกครั้ง");
            exit;
        }
        $result = $this->db->query("INSERT INTO `tbl_user` (`u_id`, `u_username`, `u_password`, `u_fname`, `u_lname`, `u_sex`, `u_address`, `u_email`, `u_tel`, `u_role`) 
                            VALUES (NULL, '$user', '$pass', '$fname', '$lname', '$sex', '$address', '$email', '$tel', 'member');");
        return $result;
    }
}

class Report extends ConnectDB
{
    function reportSellCountTotal()
    {
        $result = $this->db->query("SELECT COUNT(pm_id) as sellCountTotal FROM `tbl_payment`");
        $row = $result->fetch_array();
        return $row['sellCountTotal'];
    }
    function reportSellTotal()
    {
        $result = $this->db->query("SELECT *,SUM(cg_price*pl_amount) as sellTotal FROM tbl_payment_list as pl INNER JOIN tbl_cargo as cg ON pl.pl_cg_id = cg.cg_id");
        $row = $result->fetch_array();
        return $row['sellTotal'];
    }
    function reportCargoTotal()
    {
        $result = $this->db->query("SELECT COUNT(cg_id) as cargoTotal FROM `tbl_cargo`");
        $row = $result->fetch_array();
        return $row['cargoTotal'];
    }
    function reportUserCountTotal()
    {
        $result = $this->db->query("SELECT COUNT(u_id) as userTotal FROM `tbl_user` WHERE u_role != 'member' ");
        $row = $result->fetch_array();
        return $row['userTotal'];
    }
    function reportMemberCountTotal()
    {
        $result = $this->db->query("SELECT COUNT(u_id) as memberTotal FROM `tbl_user` WHERE u_role = 'member' ");
        $row = $result->fetch_array();
        return $row['memberTotal'];
    }
    function reportShipmentCountTotal()
    {
        $result = $this->db->query("SELECT COUNT(sm_id) as shipmentCount FROM tbl_shipment");
        $row = $result->fetch_array();
        return $row['shipmentCount'];
    }
}


function activeNav()
{
    $php_self = $_SERVER['PHP_SELF'];
    $explode_self = explode('/', $php_self);
    array_splice($explode_self, 1, 2);
    return $explode_self[1];
}


function uploadIMG($img, $dir)
{
    $IMG_DIR = $dir;
    $IMG_NameOld = $img["name"];
    $IMG_tmp =  $img['tmp_name'];
    $IMG_type = strtolower(pathinfo($IMG_NameOld, PATHINFO_EXTENSION));
    $IMG_dateName = date("Ymdhis");
    $IMG_RandomNumberName = rand(1000, 9999);
    $IMG_NameFull = $IMG_dateName . '_' . $IMG_RandomNumberName . '.' . $IMG_type;

    if ($IMG_type != "jpg" && $IMG_type != "png" && $IMG_type != "jpeg" && $IMG_type != "gif") {
        echo "
            <script>
                alert('กรุณาเลือกไฟล์ภาพ JPG , PNG และ GIF เท่านั้น');
                window.history.back();
            </script>";
        return false;
    } else if (move_uploaded_file($IMG_tmp, $IMG_DIR . $IMG_NameFull)) {
        return $IMG_NameFull;
    } else {
        return false;
    }
}

function uploadIMGEdit($img, $img_old, $dir)
{
    if (isset($img['name']) && !empty($img['name'])) {
        $IMG_DIR = $dir;
        $IMG_NameOld = $img["name"];
        $IMG_tmp =  $img['tmp_name'];
        $IMG_ArrayName =  explode('.', $IMG_NameOld);
        $IMG_type = $IMG_ArrayName[1];
        $IMG_dateName = date("Ymdhis");
        $IMG_RandomNumberName = rand(1000, 9999);
        $IMG_NameFull = $IMG_dateName . '_' . $IMG_RandomNumberName . '.' . $IMG_type;

        if ($IMG_type != "jpg" && $IMG_type != "png" && $IMG_type != "jpeg" && $IMG_type != "gif") {
            alertBack("กรุณาเลือกไฟล์ภาพ JPG , PNG และ GIF เท่านั้น");
            return false;
        } else {
            if (move_uploaded_file($IMG_tmp, $IMG_DIR . $IMG_NameFull)) {
                unlink($IMG_DIR . $img_old);
                return $IMG_NameFull;
            } else {
                alertGo("Upload รูปภาพล้มเหลว", "cargo_show.php");
            }
        }
    } else {
        return $IMG_NameFull = $img_old;
    }
}


function alertBack($title)
{
    echo "
    <script>
      alert('$title');
      window.history.back();
    </script>";
}

function alertGo($title, $location)
{
    echo "
    <script>
        alert('$title');
        window.location.href='$location';
    </script>
    ";
}




// **************************** Check Login *******************************
function checkSessionAdmin()
{
    if (!isset($_SESSION['user']['role'])) {
        alertGo("กรุณา Login ก่อนใช้งาน", "../login.php");
        exit;
    }
    if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] != "admin") {
        alertGo("สำหรับ Admin เท่านั้น", "../login.php");
        exit;
    }
}

function checkSessionUser()
{
    if (!isset($_SESSION['user']['role'])) {
        alertGo("กรุณา Login ก่อนใช้งาน", "../login.php");
        exit;
    }
    if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] != "user") {
        alertGo("สำหรับ User เท่านั้น", "../login.php");
        exit;
    }
}

function checkSessionMember()
{
    if (!isset($_SESSION['user']['role'])) {
        alertGo("กรุณา Login ก่อนใช้งาน", "login.php");
        exit;
    }
    if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] != "member") {
        alertGo("สำหรับ member เท่านั้น", "login.php");
        exit;
    }
}
// **************************** End Check Login *******************************

function NameMonth()
{
    $monthList = [
        "01" => "มกราคม",
        "02" => "กุมภาพันธ์",
        "03" => "มีนาคม",
        "04" => "เมษายน",
        "05" => "พฤษภาคม",
        "06" => "มิถุนายน",
        "07" => "กรกฎาคม",
        "08" => "สิงหาคม",
        "09" => "กันยายน",
        "10" => "ตุลาคม",
        "11" => "พฤศจิกายน",
        "12" => "ธันวาคม",
    ];
    return $monthList;
}

function displayNameMonth($month)
{
    $monthList = [
        "1" => "มกราคม",
        "2" => "กุมภาพันธ์",
        "3" => "มีนาคม",
        "4" => "เมษายน",
        "5" => "พฤษภาคม",
        "6" => "มิถุนายน",
        "7" => "กรกฎาคม",
        "8" => "สิงหาคม",
        "9" => "กันยายน",
        "10" => "ตุลาคม",
        "11" => "พฤศจิกายน",
        "12" => "ธันวาคม",
    ];
    return $monthList[$month];
}

function ConvertDateToThai($datetime)
{
    $XdateTime = explode(" ", $datetime);
    $time = $XdateTime[1];
    $date = explode("-", $XdateTime[0]);

    $monthList = [
        "01" => "มกราคม",
        "02" => "กุมภาพันธ์",
        "03" => "มีนาคม",
        "04" => "เมษายน",
        "05" => "พฤษภาคม",
        "06" => "มิถุนายน",
        "07" => "กรกฎาคม",
        "08" => "สิงหาคม",
        "09" => "กันยายน",
        "10" => "ตุลาคม",
        "11" => "พฤศจิกายน",
        "12" => "ธันวาคม",
    ];

    return $date[2] . " " . $monthList[$date[1]] . " " . $date[0] + 543 . " เวลา " . $time;
}

function monthNow()
{
    $date = date("m");
    return $date;
}
