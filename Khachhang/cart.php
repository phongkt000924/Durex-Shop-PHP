<?php
    require_once('../db/dbconnection.php');
    $mshh = '-1';
    if (!empty($_GET)) {
        $mshh = $_GET['mshh'];

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
    <title>Durex - Giỏ Hàng</title>
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

    <!------------------------------------------------------GIO HANG----------------------------------------------------->

    <section class="cart">
        <div class="container">
            <div class="cart-top-wrap">
                <div class="cart-top">
                    <div class="cart-top-cart cart-top-item">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="cart-top-address cart-top-item">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="cart-top-payment cart-top-item">
                        <i class="fas fa-money-check-alt"></i>
                    </div>
                </div>
            </div> 
        </div>
        <div class="container">
            <div class="cart-content">
                <div class="cart-content-left">
                    <table id = "dssp">
                        <tr>
                            <th>Sản Phẩm</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Loại Sản Phẩm</th>
                            <th>Size</th>
                            <th>Số Lượng</th>
                            <th>Thành Tiền</th>
                            <th>Xóa</th>
                        </tr>
                    </table>
                </div>
                <div class="cart-content-right">
                    <table id = "tongtien"></table>
                    <div class="cart-content-right-text">
                        <p>Bạn sẽ được miễn phí ship khi đơn hàng của bạn co tổng giá trị trên 50.000 VND</p>
                        <p>Khuyến khích bạn mua thêm sản phẩm, với tổng tiền hàng lớn hơn 50.000 VND để được miễn phí ship</p>
                    </div>
                    <div class="cart-content-right-button">
                        <button><a href="index.php">TIẾP TỤC MUA SẮM</a></button>
                        <button><a href="delivery.php">THANH TOÁN</a></button>
                    </div>
                    <!-- <div class="cart-content-right-dangnhap">
                        <p>TÀI KHOẢN DUREX</p>
                        <P>Hãy <a href="#">đăng nhập</a> tài khoản của bạn để tích điểm thành viên</P>
                    </div> -->
                </div>
            </div>
        </div>
    </section>

    <!------------------------------------------------------GIO HANG----------------------------------------------------->

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

        function removeProducts() {
            const mshh = <?php echo $mshh; ?>;
            if (mshh != '-1') {
                let storageProduct = JSON.parse(localStorage.getItem('products'));
                let products = storageProduct.filter(function (product) {
                    return product.mshh != mshh;
                });
                console.log(products);
                localStorage.setItem('products', JSON.stringify(products));
            }
        }

        function loadProducts() {
            const dssp = document.getElementById("dssp");
            let products = JSON.parse(localStorage.getItem("products"));
            let tongsp = 0;
            let tongtienhang = 0;
            products.forEach(function (product) {
                const trnode = document.createElement("tr");
                trnode.innerHTML = `
                                    <tr>
                                        <td><img src="./images/${product.tenhinh}"></td>
                                        <td>
                                            <p>${product.tenhh}</p>
                                        </td>
                                        <td>
                                            <p>${product.tenloaihang}</p>
                                        </td>
                                        <td>
                                            <p>${product.size}</p>
                                        </td>
                                        <td><input type="number" value="${product.soluong}" min="1" readonly></td>
                                        <td>
                                            <p>${new Intl.NumberFormat().format(product.gia)} VND</p>
                                        </td>
                                        <td><span><a href="cart.php?mshh=${product.mshh}">X</a></span></td>
                                    </tr>`;
                dssp.appendChild(trnode);
                tongsp += parseInt(product.soluong);
                tongtienhang = tongsp * parseInt(product.gia);
            })
            const tongtien = document.getElementById("tongtien");
            tongtien.innerHTML = `
                                <tr>
                                    <th colspan="2">TỔNG TIỀN GIỎ HÀNG</th>
                                </tr>
                                <tr>
                                    <td><p>TỔNG SẢN PHẨM</p></td>
                                    <td><p>${tongsp}</p></td>
                                </tr>
                                <tr>
                                    <td><p>TỔNG TIỀN HÀNG</p></td>
                                    <td>
                                        <p>${new Intl.NumberFormat().format(tongtienhang)} VND</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><p>TẠM TÍNH</p></td>
                                    <td>
                                        <p style="color: #005baa; font-weight: bold;">${new Intl.NumberFormat().format(tongtienhang)} VND</p>
                                    </td>
                                </tr>`;
        }
        removeProducts();
        loadProducts();
        
    </script>

    <!------------------------------------------------------SCRIPT----------------------------------------------------->

</body>

</html>