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
    <title>Durex - Nhập thông tin nhận hàng</title>
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

    <!------------------------------------------------------GIAO HANG----------------------------------------------------->

    <section class="delivery">
        <div class="container">
            <div class="delivery-top-wrap">
                <div class="delivery-top">
                    <div class="delivery-top-delivery delivery-top-item">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="delivery-top-address delivery-top-item">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="delivery-top-payment delivery-top-item">
                        <i class=" fas fa-money-check-alt"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="delivery-content">
                <form action="payment.php" method="post">
                    <div class="delivery-content-left">
                        <p>VUI LÒNG NHẬP THÔNG TIN NHẬN HÀNG</p>
                        <!-- <div class="delivery-content-left-dangnhap">
                            <i class="fas fa-sign-in-alt"></i>
                            <p>Đăng nhập nếu bạn có tài khoản Durex</p>
                        </div>
                        <div class="delivery-content-left-khachle">
                            <input checked type="radio" name="loaikhach">
                            <p><span style="font-weight: bold;">Khách lẻ</span> (Nếu bạn không muốn lưu lại thông tin)</p>
                        </div>
                        <div class="delivery-content-left-dangky">
                            <input type="radio" name="loaikhach">
                            <p><span style="font-weight: bold;">Đăng ký</span> (Tạo tài khoản với thông tin bên dưới)</p>
                        </div> -->
                        <div class="delivery-content-left-input-top">
                            <div class="delivery-content-left-input-top-item">
                                <label for="">Họ và tên <span style="color: red">*</span></label>
                                <input type="text" name="hoten">
                            </div>
                            <div class="delivery-content-left-input-top-item">
                                <label for="">Tên Công Ty <span style="color: red">*</span></label>
                                <input type="text" name="tencongty">
                            </div>
                            <div class="delivery-content-left-input-top-item">
                                <label for="">Số Điện Thoại <span style="color: red">*</span></label>
                                <input type="text" name="sdt">
                            </div>
                            <div class="delivery-content-left-input-top-item">
                                <label for="">Số Fax <span style="color: red">*</span></label>
                                <input type="text" name="fax">
                            </div>
                            <div class="delivery-content-left-input-top-item">
                                <label for="">Địa chỉ nhà <span style="color: red">*</span></label>
                                <input type="text" name="diachi">
                            </div>
                        </div>
                        <div class="delivery-content-left-button">
                            <a href="cart.php"><span>&#171;</span>
                                <p>Quay lại giỏ hàng</p>
                            </a>
                            <button type="submit" name="dathang">
                                <p style="font-weight: bold;">THANH TOÁN VÀ GIAO HÀNG</p>
                            </button>
                        </div>
                    </div>
                </form>
                <div class="delivery-content-right">
                    <table id="product-area">
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!------------------------------------------------------GIAO HANG----------------------------------------------------->

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

    <script>

        function loadProduct() {
            let products = JSON.parse(localStorage.getItem('products'));
            const productArea = document.getElementById('product-area');
            let phandau = `
                        <tr>
                            <th>TÊN SẢN PHẨM</th>
                            <th>GIẢM GIÁ</th>
                            <th>SỐ LƯỢNG</th>
                            <th>THÀNH TIỀN</th>
                        </tr>`;
            let phangiua = '';
            let totalPrice = 0;
            products.forEach(function (product) {
                let giamgia = 0;
                let tongtien = parseFloat(product.gia)*parseFloat(product.soluong);
                if (tongtien > 100000) {
                    giamgia = 5;
                    tongtien = tongtien - tongtien * 0.05;
                }
                totalPrice += tongtien;
                phangiua += `
                        <tr>
                            <td>${product.tenhh}</td>
                            <td>${giamgia}%</td>
                            <td>${product.soluong}</td>
                            <td>${new Intl.NumberFormat().format(tongtien)} VND</td>
                        </tr>`
            })
            let thue = totalPrice * 0.1;
            let phancuoi = `
                        <tr>
                            <td style="font-weight: bold;" colspan="3">Tổng</td>
                            <td style="font-weight: bold;">${new Intl.NumberFormat().format(totalPrice)} VND</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;" colspan="3">Thuế VAT</td>
                            <td style="font-weight: bold;">${new Intl.NumberFormat().format(thue)} VND</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;" colspan="3">Tổng tiền hàng</td>
                            <td style="font-weight: bold">${new Intl.NumberFormat().format(totalPrice + thue)} VND</td>
                        </tr>`;
            productArea.innerHTML = phandau + phangiua + phancuoi;                    
        }

        loadProduct();

    </script>

    <!------------------------------------------------------SCRIPT----------------------------------------------------->

</body>

</html>