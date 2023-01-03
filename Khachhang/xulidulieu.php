<?php
    require_once('../db/dbconnection.php');
    session_start();
    $sql = 'insert into dathang (mskh, msnv, ngaydh, ngaygh, trangthaidh) values ("'.$_SESSION['mskh'].'", -1, "'.date("Y-m-d").'", "'.date("Y-m-d").'", -1)';
    execute($sql);
    $sql = 'select max(sodondh) from dathang';
    $result = executeSingleResult($sql);
    $sodondathang = $result['max(sodondh)'];
    $request = file_get_contents('php://input');
    $array = json_decode($request, true);
    for ($i=0; $i < count($array); $i++) { 
        $sql = 'insert into chitietdathang (sodondh, mshh, soluong, giadathang, giamgia) values ("'.$sodondathang.'", "'.$array[$i]['mshh'].'", "'.$array[$i]['soluong'].'", "'.$array[$i]['gia'].'", 0)';
        execute($sql);
    }
?>
