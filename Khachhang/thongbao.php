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
    <title>Đặt Hàng Thành Công - Trang chủ</title>
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

    <!------------------------------------------------------CAM ON----------------------------------------------------->

    <div class="thankyou">
        <div class="thankyou-content-top">
            <h2>Đặt hàng thành công</h2>
            <p>Cám ơn bạn đã mua hàng tại Durex!</p>
            <img src="images/thanks.png">
        </div>
        <div class="thankyou-content-bottom">
            <p>Bộ phận chăm sóc khách hàng sẽ liên hệ bạn trong 24h để xác nhận đơn hàng và giao hàng đến bạn. </p>
            <p>Hotline hỗ trợ: (028) 7307 1441</p>
            <p>* Đơn hàng của bạn sẽ được giao trong giờ hành chính, từ thứ 2 đến thứ 7. Các bạn vui lòng chú ý điện
                thoại để nhận hàng nhanh nhất nhé!</p>
        </div>
        <div class="thankyou-btn">
            <button><a href="index.php">QUAY LẠI TRANG CHỦ TIẾP TỤC MUA SẮM</a></button>
        </div>
    </div>

    <!------------------------------------------------------CAM ON----------------------------------------------------->

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

</body>

</html>