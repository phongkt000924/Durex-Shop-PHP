<?php
require_once('../db/dbconnection.php');

if (isset($_POST['product'])) {

    $ten = $_POST['ten'];
    $quycach = $_POST['quycach'];
    $gia = $_POST['gia'];
    $soluong = $_POST['soluong'];
    $mota = $_POST['mota'];
    $maloaihang = $_POST['maloai'];

    // Cập nhật
    if (isset($_POST['isUpdate'])) {
        $mshh = $_POST['mshh'];

        $sql = 'UPDATE hanghoa SET tenhh = "' . $ten . '", quycach = "' . $quycach . '", gia = "' . $gia . '", soluonghang = "' . $soluong . '", maloaihang = "' . $maloaihang . '", motahanghoa = "' . $mota . '" WHERE mshh = "' . $mshh . '"';
        execute($sql);

        $target_dir = "./images/";

        if ($_FILES['hinh1']['size'] != 0) {
            $image1 = $mshh . 'anh1.jpg';
            $target_file = $target_dir . $image1;
            // echo $target_file;
            move_uploaded_file($_FILES['hinh1']['tmp_name'], $target_file);
        }
        if ($_FILES['hinh2']['size'] != 0) {
            $image2 = $mshh . 'anh2.jpg';
            $target_file = $target_dir . $image2;
            // echo $target_file;
            move_uploaded_file($_FILES['hinh2']['tmp_name'], $target_file);
        }
        if ($_FILES['hinh3']['size'] != 0) {
            $image3 = $mshh . 'anh3.jpg';
            $target_file = $target_dir . $image3;
            // echo $target_file;
            move_uploaded_file($_FILES['hinh3']['tmp_name'], $target_file);
        }
        if ($_FILES['hinh4']['size'] != 0) {
            $image4 = $mshh . 'anh4.jpg';
            $target_file = $target_dir . $image4;
            // echo $target_file;
            move_uploaded_file($_FILES['hinh4']['tmp_name'], $target_file);
        }

        $sql = 'SELECT * FROM hinhhanghoa WHERE mshh = "' . ($mshh) . '"';
        $result = executeResult($sql);

        $temp = 0;
        foreach ($result as $row) {
            $temp++;
            switch ($temp) {
                case 1:
                    if (isset($image1)) {
                        $sql = 'UPDATE hinhhanghoa SET tenhinh = "' . $image1 . '" WHERE mahinh = "' . ($row['mahinh']) . '"';
                        execute($sql);
                        echo $sql;
                    }

                    break;
                case 2:
                    if (isset($image2)) {
                        $sql = 'UPDATE hinhhanghoa SET tenhinh = "' . $image2 . '" WHERE mahinh = "' . ($row['mahinh']) . '"';
                        execute($sql);
                        echo $sql;
                    }
                    break;
                case 3:
                    if (isset($image3)) {
                        $sql = 'UPDATE hinhhanghoa SET tenhinh = "' . $image3 . '" WHERE mahinh = "' . ($row['mahinh']) . '"';
                        execute($sql);
                        echo $sql;
                    }
                    break;
                case 4:
                    if (isset($image4)) {
                        $sql = 'UPDATE hinhhanghoa SET tenhinh = "' . $image4 . '" WHERE mahinh = "' . ($row['mahinh']) . '"';
                        execute($sql);
                        echo $sql;
                    }
                    break;
            }
        }
    } else {
        $ten = $_POST['ten'];
        $quycach = $_POST['quycach'];
        $gia = $_POST['gia'];
        $soluong = $_POST['soluong'];
        $mota = $_POST['mota'];
        $maloai = $_POST['maloai'];
    
        $sql = 'select max(mshh) mahanghoa from hanghoa';
        $result = executeSingleResult($sql);
        $mshh = $result['mahanghoa'] + 1;
    
        $sql = 'INSERT INTO hanghoa (mshh, tenhh, quycach, gia, soluonghang, motahanghoa, maloaihang) VALUES ("'.($mshh).'", "'.($ten).'", "'.($quycach).'",
                                         "'.($gia).'", "'.($soluong).'", "'.($mota).'", "'.($maloai).'")';
        execute($sql);
        $target_dir =  "./images/";
    
        if ($_FILES['hinh1']['size'] != 0) {
            $image1 = $mshh . 'anh1.jpg';
            $target_file = $target_dir . $image1;
            move_uploaded_file($_FILES['hinh1']['tmp_name'], $target_file);
        }
        if ($_FILES['hinh2']['size'] != 0) {
            $image2 = $mshh . 'anh2.jpg';
            $target_file = $target_dir . $image2;
            move_uploaded_file($_FILES['hinh2']['tmp_name'], $target_file);
        }
        if ($_FILES['hinh3']['size'] != 0) {
            $image3 = $mshh . 'anh3.jpg';
            $target_file = $target_dir . $image3;
            move_uploaded_file($_FILES['hinh3']['tmp_name'], $target_file);
        }
        if ($_FILES['hinh4']['size'] != 0) {
            $image4 = $mshh . 'anh4.jpg';
            $target_file = $target_dir . $image4;
            move_uploaded_file($_FILES['hinh4']['tmp_name'], $target_file);
        }
    
        $sqlInsert = 'INSERT INTO hinhhanghoa (tenhinh, mshh) VALUES ("' . ($image1) . '", "' . ($mshh) . '");';
        execute($sqlInsert);
        // echo $sqlInsert;
    
        $sqlInsert = 'INSERT INTO hinhhanghoa (tenhinh, mshh) VALUES ("' . ($image2) . '", "' . ($mshh) . '");';
        execute($sqlInsert);
        // echo $sqlInsert;
    
        $sqlInsert = 'INSERT INTO hinhhanghoa (tenhinh, mshh) VALUES ("' . ($image3) . '", "' . ($mshh) . '");';
        execute($sqlInsert);
        // echo $sqlInsert;
    
        $sqlInsert = 'INSERT INTO hinhhanghoa (tenhinh, mshh) VALUES ("' . ($image4) . '", "' . ($mshh) . '");';
        execute($sqlInsert);
        // echo $sqlInsert;
    }

    // Done
}

// Thêm dữ liệu cho loại hàng hóa
if (isset($_POST['category'])) {
    $tenloaihang = $_POST['tenloaihang'];
    $slogan = $_POST['slogan'];
    $mota = $_POST['mota'];

    if (isset($_POST['isUpdate'])) {
        // Chỉnh sửa hàng hóa có sẵn
        $maloaihang = $_POST['maloaihang'];

        $sql = 'UPDATE loaihanghoa SET tenloaihang = "' . ($tenloaihang) . '", sloganloaihang = "' . ($slogan) . '", motaloaihang = "' . ($mota) . '" WHERE maloaihang = "'.($maloaihang).'"';
        execute($sql);
    } else {
        // Thêm hàng hóa
        $sql = 'SELECT max(maloaihang) mahientai FROM loaihanghoa';
        $result = executeSingleResult($sql);

        $mahientai = $result['mahientai'] + 1;
        $sql = 'INSERT into loaihanghoa (maloaihang, tenloaihang, sloganloaihang, motaloaihang) VALUES ("'.($mahientai).'", "'.($tenloaihang).'", "'.($slogan).'", "'.($mota).'")';
        execute($sql);
    }
}