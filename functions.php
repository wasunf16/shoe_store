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
    function queryByID($table,$nameID,$id)
    {
        $result = $this->db->query("SELECT * FROM '$table' WHERE '$nameID' = '$id' ");
    }
}

class LoginRegister extends ConnectDB
{
    function register($user, $pass, $fname, $lname, $sex, $address, $email, $tel)
    {
        $result = $this->db->query("INSERT INTO `tbl_user` (`id`, `username`, `password`, `fname`, `lname`, `sex`, `address`, `email`, `tel`, `role`) 
                            VALUES (NULL, '$user', '$pass', '$fname', '$lname', '$sex', '$address', '$email', '$tel', 'member');");
        return $result;
    }
    function CheckLogin($user, $pass)
    {
        $result = $this->db->query("SELECT * FROM tbl_user WHERE `username`='$user' AND `password`='$pass' ");
        if ($result->num_rows <= 0) {
            return 'not found';
        } else {
            $row = $result->fetch_array();
            $_SESSION['user']['username'] = $row['username'];
            $_SESSION['user']['password'] = $row['password'];
            $_SESSION['user']['fname'] = $row['fname'];
            $_SESSION['user']['lname'] = $row['lname'];
            $_SESSION['user']['sex'] = $row['sex'];
            $_SESSION['user']['address'] = $row['address'];
            $_SESSION['user']['email'] = $row['email'];
            $_SESSION['user']['tel'] = $row['tel'];
            $_SESSION['user']['role'] = $row['role'];

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
