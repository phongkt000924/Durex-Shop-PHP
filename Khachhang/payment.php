<?php
    require_once('../db/dbconnection.php');
    session_start();
    $loaikhach = '';
    $tencongty = '';
    $sdt = '';
    $fax = '';
    $diachi = '';

    if (!empty($_POST)) {
        $hoten = $_POST['hoten'];
        $tencongty = $_POST['tencongty'];
        $sdt = $_POST['sdt'];
        $fax = $_POST['fax'];
        $diachi = $_POST['diachi'];
        $sql = 'insert into khachhang (hotenkh, tencongty, sodienthoai, sofax) values ("'.$hoten.'","'.$tencongty.'","'.$sdt.'","'.$fax.'")';
        execute($sql); 
        $sql = 'select max(mskh) from khachhang';
        $result = executeSingleResult($sql);
        $mskh = $result['max(mskh)'];
        $_SESSION['mskh'] = $mskh;
    }  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <title>Durex - Thanh toán</title>
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

    <!------------------------------------------------------THANH TOAN----------------------------------------------------->

    <section class="payment">
        <div class="container">
            <div class="payment-top-wrap">
                <div class="payment-top">
                    <div class="payment-top-cart payment-top-item">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="payment-top-address payment-top-item">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="payment-top-payment payment-top-item">
                        <i class=" fas fa-money-check-alt"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="payment-content">
                <div class="payment-content-left">
                    <div class="payment-content-left-method-delivery">
                        <p style="font-weight: bold;">Phương thức giao hàng</p>
                        <div class="payment-content-left-method-delivery-item">
                            <input checked type="radio">
                            <label for="">Giao hàng chuyển phát nhanh</label>
                        </div>
                    </div>
                    <div class="payment-content-left-method-payment">
                        <p style="font-weight: bold;">Phương thức thanh toán</p>
                        <!-- <label>Mọi giao dịch đều được bảo mật và mã hóa.
                            Thông tin thẻ tín dụng sẽ không bao giờ được lưu lại.
                        </label>
                        <div class="payment-content-left-method-payment-item">
                            <input type="radio" name="method-payment">
                            <label for="">Thanh toán bằng thẻ tín dụng (OnePay)</label>
                        </div>
                        <div class="payment-content-left-method-payment-item-img">
                            <img src="./images/visa.jpg">
                        </div>
                        <div class="payment-content-left-method-payment-item">
                            <input type="radio" name="method-payment">
                            <label for="">Thanh toán bằng thẻ ATM (OnePay)</label>
                        </div>
                        <div class="payment-content-left-method-payment-item-img">
                            <img src="./images/bank.jpg">
                        </div>
                        <div class="payment-content-left-method-payment-item">
                            <input type="radio" name="method-payment">
                            <label for="">Thanh toán Momo</label>
                        </div>
                        <div class="payment-content-left-method-payment-item-img">
                            <img src="./images/momo.jpg">
                        </div> -->
                        <div class="payment-content-left-method-payment-item">
                            <input checked type="radio" name="method-payment">
                            <label for="">Thanh toán khi nhận hàng</label>
                        </div>
                    </div>
                </div>
                <div class="payment-content-right">
                    <!-- <div class="payment-content-right-button">
                        <input type="text" placeholder="Mã giảm giá/Quà tặng">
                        <button><i class="fas fa-check"></i></button>
                    </div>
                    <div class="payment-content-right-button">
                        <input type="text" placeholder="Mã cộng tác viên">
                        <button><i class="fas fa-check"></i></button>
                    </div>
                    <div class="payment-content-right-mnv">
                        <select name="" id="">
                            <option value="">Chọn mã nhân viên thân thiết</option>
                            <option value="">Phonghandsome</option>
                            <option value="">Phongthanthiet</option>
                            <option value="">Phongvuitinh</option>
                            <option value="">Phonghoadong</option>
                        </select>
                    </div> -->
                    <table id="product-payment"></table>
                </div>
            </div>
            <div class="payment-content-bottom-button">
                <a href="cart.php"><span>&#171;</span>
                    <p>Quay lại giỏ hàng</p>
                </a>
                <button id="chotdon">
                    <p style="font-weight: bold;">THANH TOÁN VÀ GIAO HÀNG</p>
                </button>
            </div>
        </div>
    </section>

    <div class="notifly">
        <div class="custom-alert">
            <i class="fas fa-check-circle"></i>
            <p>Đặt hàng thành công</p>
            <button id="close">Đóng</button>
        </div>
    </div>

    <!------------------------------------------------------THANH TOAN----------------------------------------------------->

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

        function loadProducts() {
            let products = JSON.parse(localStorage.getItem('products'));
            console.log(products);
            const productPayment = document.getElementById("product-payment");
            let phandau = `
                        <tr>
                            <th>TÊN SẢN PHẨM</th>
                            <th>GIẢM GIÁ</th>
                            <th>SỐ LƯỢNG</th>
                            <th>THÀNH TIỀN</th>
                        </tr> `;
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
            let ship = 0;
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
                            <td style="font-weight: bold;" colspan="3">Giao hàng chuyển phát nhanh - Chuyển phát nhanh</td>
                            <td style="font-weight: bold;">${ship} VND</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;" colspan="3">Tổng tiền thanh toán</td>
                            <td style="font-weight: bold">${new Intl.NumberFormat().format(totalPrice + thue + ship)} VND</td>
                        </tr>`;
            productPayment.innerHTML = phandau + phangiua + phancuoi;                 
        }
        loadProducts();

        document.getElementById("chotdon").addEventListener("click", function() {
            let products = JSON.parse(localStorage.getItem("products"));
            const xhr = new XMLHttpRequest();
            xhr.open('POST','xulidulieu.php');
            xhr.setRequestHeader('Content-Type','application/json');
            xhr.send(JSON.stringify(products));
            document.location.href = "thongbao.php";
        })

        var themgiohang = document.querySelector("#chotdon");
        var dong= document.querySelector("#close");
        var thongbao = document.querySelector(".notifly");
        themgiohang.addEventListener("click",function(e){
            e.preventDefault();
            thongbao.style.display = "flex";
            setTimeout(() => {
                thongbao.style.display = "none";
            }, 2000);
        });
        dong.addEventListener("click",function(){
            thongbao.style.display = "none";
        })

    </script>

    <!------------------------------------------------------SCRIPT----------------------------------------------------->

</body>

</html>