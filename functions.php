<?php

class ConnectDB
{
    public $db;
    function __construct()
    {
        $DB_HOST = "localhost";
        $DB_USER = "root";
        $DB_PASS = "";
        $DB_NAME = "stoe_store";
        $con = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
        if ($con->connect_error) {
            echo "Fail to connect database: " . $con->connect_error;
        }
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
        $result = $this->db->query("INSERT INTO `tbl_user` (`u_id`, `u_username`, `u_password`, `u_fname`, `u_lname`, `u_sex`, `u_address`, `u_email`, `u_tel`, `u_role`) 
                            VALUES (NULL, '$user', '$pass', '$fname', '$lname', '$sex', '$address', '$email', '$tel', 'member');");
        return $result;
    }
    function CheckLogin($user, $pass)
    {
        $result = $this->db->query("SELECT * FROM tbl_user WHERE `u_username`='$user' AND `u_password`='$pass' ");
        if ($result->num_rows <= 0) {
            return 'not found';
        } else {
            $row = $result->fetch_array();
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
                    header('Location: page-member/index.php');
                    break;
            }
        }
    }
}

class Cargo extends ConnectDB
{
    function cargoAdd()
    {
        $maxCode = $this->db->query("SELECT MAX(cg_code) as max FROM tbl_cargo");
        $maxCode = $maxCode->fetch_array();
        $fetchMaxCode = $maxCode['max'];
        $fetchMaxCode += 1;

        $result = $this->db->query("INSERT INTO `tbl_cargo` (`cg_id`, `cg_code`, `cg_name`, `cg_detail`, `cg_img`, `cg_type_id`, `cg_unit`, `cg_price`, `cg_amount`, `cg_promotion_status`, `cg_promotion_value`) 
        VALUES (NULL, '$fetchMaxCode', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'off', 'off');");

        if (isset($img)) {
            $IMG_DIR = "../img_upload";
            $IMG_NameOld = $_FILES["txt_img"]["name"];
            $IMG_tmp =  $_FILES['txt_img']['tmp_name'];
            $IMG_ArrayName =  explode('.', $IMG_NameOld);
            $IMG_type = $IMG_ArrayName[1];
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
                    $real_pass = $this->conn->real_escape_string($pass);
                    $hashed_password = password_hash($real_pass, PASSWORD_DEFAULT);
                    $result = $this->conn->query("INSERT INTO tbl_user (u_user,u_pass,u_img,u_role) VALUES ('$user','$hashed_password','$IMG_NameFull','$role') ");
                    return $result;
                }
            }
        }
    }
}


function activeNav()
{
    $php_self = $_SERVER['PHP_SELF'];
    $explode_self = explode('/', $php_self);
    array_splice($explode_self, 1, 2);
    return $explode_self[1];
}
