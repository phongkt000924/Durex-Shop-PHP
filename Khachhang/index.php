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
    <title>Durex - Trang chủ</title>
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

    <!------------------------------------------------------SLIDER----------------------------------------------------->

    <div class="slider">
        <div class="slides">

            <input type="radio" name="radio-btn" id="radio1">
            <input type="radio" name="radio-btn" id="radio2">
            <input type="radio" name="radio-btn" id="radio3">
            <input type="radio" name="radio-btn" id="radio4">
            <input type="radio" name="radio-btn" id="radio5">

            <div class="slide first">
                <img src="./images/slider1.png" alt="">
            </div>

            <div class="slide">
                <img src="./images/slider2.png" alt="">
            </div>

            <div class="slide">
                <img src="./images/slider3.png" alt="">
            </div>

            <div class="slide">
                <img src="./images/slider4.png" alt="">
            </div>

            <div class="slide">
                <img src="./images/slider5.png" alt="">
            </div>

            <div class="navigation-auto">
                <div class="auto-btn1"></div>
                <div class="auto-btn2"></div>
                <div class="auto-btn3"></div>
                <div class="auto-btn4"></div>
                <div class="auto-btn5"></div>
            </div>

        </div>

        <div class="navigation-manual">
            <label for="radio1" class="manual-btn"></label>
            <label for="radio2" class="manual-btn"></label>
            <label for="radio3" class="manual-btn"></label>
            <label for="radio4" class="manual-btn"></label>
            <label for="radio5" class="manual-btn"></label>
        </div>

    </div>

    <!------------------------------------------------------SLIDER----------------------------------------------------->

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
            <a href="https://www.instagram.com/durexvietnamofficial/?hl=vi" target="_blank" class="fab fa-instagram"></a>
            <a href="https://www.youtube.com/channel/UCbcISjwMqny5HV5so2GuYZg" target="_blank" class="fab fa-youtube"></a>
        </li>
    </div>

    <div class="footer-bottom">
        &copy;&nbsp;2021,&nbsp;Durex &nbsp;Vietnam
    </div>

    <!------------------------------------------------------FOOTER----------------------------------------------------->

    <!------------------------------------------------------SCRIPT----------------------------------------------------->

    <script>
        var counter = 1;
        setInterval(function() {
            document.getElementById('radio' + counter).checked = true;
            counter++;
            if (counter > 5) {
                counter = 1;
            }
        }, 5000);
    </script>

    <!------------------------------------------------------SCRIPT----------------------------------------------------->

</body>

</html>