<?php
require_once('../db/dbconnection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <title>Durex - Sản phẩm</title>
</head>

<body>

    <!------------------------------------------------------HEADER - MENU----------------------------------------------------->

    <header>

        <div class="logo"></div>

        <div class="menu">
            <li><a href="#">Bí Kíp Cho Cuộc Yêu Thăng Hoa</a></li>
            <li><a href="#">Chọn Bao Vừa Vặn</a></li>
            <li>
                <a href="#">Sản Phẩm</a>

                <ul class="sub-menu">
                    <?php
                        $sql = 'select * from loaihanghoa';
                        $result = executeResult($sql);
                        foreach ($result as $row) {
                            echo '<li><a href="cartegory.php?maloaihang='.$row['maloaihang'].'">'.$row['tenloaihang'].'</a></li>';
                        }
                    ?>
                </ul>

            </li>
        </div>

        <div class="others">
            <li><input type="text" placeholder="Tìm kiếm ..."><i class="fas fa-search"></i></li>
            <li><a class="fas fa-shopping-bag" href="cart.php"></a></li>
        </div>

    </header>

    <!------------------------------------------------------HEADER - MENU----------------------------------------------------->

    <!------------------------------------------------------DANH MUC SAN PHAM------------------------------------------>

    <div class="cartegory">

        <?php
            $sql = 'select * from loaihanghoa where maloaihang = "'.$_GET['maloaihang'].'"';
            $result = executeSingleResult($sql);
            echo '<div class="cartegory-top">
                    <a href="index.php">Trang chủ</a> &nbsp; <span>&#10230;</span> &nbsp; <a href="cartegory.php?maloaihang='.$result['maloaihang'].'">'.$result['tenloaihang'].'</a>
                </div>';
        ?>

        <?php
            $sql = 'select * from loaihanghoa where maloaihang = "'.$_GET['maloaihang'].'"';
            $result = executeSingleResult($sql);
            echo '<div class="cartegory-title">
                    <h1>'.$result['sloganloaihang'].'</h1>
                </div>';
        ?>

        <?php
            $sql = 'select * from loaihanghoa where maloaihang = "'.$_GET['maloaihang'].'"';
            $result = executeSingleResult($sql);
            echo '<div class="cartegory-title-description">
                    <p>'.$result['motaloaihang'].'</p>
                </div>';
        ?>

    </div>

    <div class="cartegory-bottom">

        <div class="cartegory-bottom-a">
            <?php
                $sqll = 'select mshh from hanghoa where maloaihang = "'.$_GET['maloaihang'].'"';
                $resultt = executeResult($sqll);
                foreach ($resultt as $row) {
                    $sql = 'select hh.tenhinh, h.tenhh, h.gia, h.mshh
                            from hanghoa h JOIN hinhhanghoa hh on h.mshh = hh.mshh 
                            where hh.mshh ="'.$row['mshh'].'" limit 1'; 
                    $result = executeResult($sql);
                    foreach ($result as $row) {
                        echo '<div class="cartegory-bottom-item"> 
                            <a href="product.php?mshh='.$row['mshh'].'"><img src="./images/'.$row['tenhinh'].'"> 
                            <h1>'.$row['tenhh'].'</h1>
                            <p>'.number_format($row['gia']).' VND</p></a>
                        </div>';
                    }
                }
            ?>
        </div>

    </div>

    </div>

    <!------------------------------------------------------DANH MUC SAN PHAM------------------------------------------>

    <!------------------------------------------------------FOOTER----------------------------------------------------->

    <div class="app-container">

        <p>Tải ứng dụng Durex</p>

        <div class="app-google">
            <img src="./images/appstore.png">
            <img src="./images/chplay.png">
        </div>

        <p>Nhận bản tin từ Durex</p>

        <input type="text" placeholder="Nhập email của bạn...">

    </div>

    <div class="footer-top">

        <li><a class="footer-top-img" href="#"><img src="./images/bocongthuong.png"></a></li>
        <li><a href="#">Liên hệ</a></li>
        <li><a href="#">Tuyển dụng</a></li>
        <li><a href="#">Giới thiệu</a></li>
        <li>
            <a href="https://www.facebook.com/Durex.Vietnam" target="_blank" class="fab fa-facebook"></a>
            <a href="https://www.instagram.com/durexvietnamofficial/?hl=vi" target="_blank"
                class="fab fa-instagram"></a>
            <a href="https://www.youtube.com/channel/UCbcISjwMqny5HV5so2GuYZg" target="_blank"
                class="fab fa-youtube"></a>
        </li>

    </div>

    <div class="footer-bottom">
        &copy;&nbsp;2021,&nbsp;Durex &nbsp;Vietnam
    </div>

    <!------------------------------------------------------FOOTER----------------------------------------------------->

    <!------------------------------------------------------SCRIPT----------------------------------------------------->

    <!-- <script src="script.js"></script> -->

    <!------------------------------------------------------SCRIPT----------------------------------------------------->

</body>

</html>