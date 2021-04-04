<?php
session_start();
include('functions.php');

$oop = new ConnectDB();
// $result = $oop->query("SELECT * FROM tbl_cargo");
// if(empty($result->num_rows)){
//     echo $pm_code = 'empty: '."CG-10001";
// }else{
//     $row = $result->fetch_array();
//     $Epayment = explode('-',$row['cg_code']);
//     echo $pm_code = 'Have '.$Epayment[0].'-'.$Epayment[1] + 1;
// }
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

// $isset = isset($_GET['test']) ? $_GET['test'] : '';
// $isset = $_GET['test'] ?? '';

// echo $isset;

$queryData = $oop->query("SELECT * FROM tbl_payment as pm INNER JOIN tbl_payment_list as pl ON pm.pm_code=pl.pl_pm_code INNER JOIN tbl_cargo as cg ON pl.pl_cg_id=cg.cg_id WHERE pm.pm_code = 'P-10001' ");
while ($fetchData = $queryData->fetch_array()) {
    echo $count = $fetchData['cg_amount'] + $fetchData['pl_amount'].'<br>';
    echo $fetchData['cg_id'].'<br>';
}

?>