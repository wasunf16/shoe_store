<?php
    session_start();
    include('functions.php');

    $oop = new ConnectDB();
    // $result = $oop->query("SELECT * FROM tbl_payment ORDER BY pm_code DESC LIMIT 1");
    // if($result->num_rows <= 0){
    //     $pm_code = "P-10001";
    // }else{
    //     $row = $result->fetch_array();
    //     $Epayment = explode('-',$row['pm_code']);
    //     $pm_code = $Epayment[0].'-'.$Epayment[1] + 1;
    // }
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";


?>