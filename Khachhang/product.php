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
    <title>Durex - Chi tiết sản phẩm</title>
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

    <!------------------------------------------------------SAN PHAM----------------------------------------------------->

    <div class="product">

        <?php
            $sql2 = 'select tenloaihang from loaihanghoa where maloaihang in (select maloaihang from hanghoa where mshh = "'.$_GET['mshh'].'")';
            $result2 = executeSingleResult($sql2);
            $tenloaihang = $result2['tenloaihang'];
            $sql = 'select * from hanghoa where mshh = "'.$_GET['mshh'].'"';
            $result = executeSingleResult($sql);
            echo '<div class="product-top">
                    <a href="index.php">Trang chủ</a> &nbsp; <span>&#10230;</span> &nbsp; <a href="product.php?mshh='.$result['mshh'].'">'.$result['tenhh'].'</a>
                </div>';
        ?>

        <div class="product-content">

            <div class="product-content-left">
                <?php
                    $sql = 'select * from hinhhanghoa where mshh = "'.$_GET['mshh'].'"';
                    $result = executeSingleResult($sql);
                    $tenhinh = $result['tenhinh'];
                    echo '<div class="product-content-left-big-img">
                            <img src="./images/'.$result['tenhinh'].'">
                        </div>';

                    echo '<div class="product-content-left-small-img">';
                    $result = executeResult($sql);
                    foreach ($result as $row) {
                        echo '
                         <img src="./images/'.$row['tenhinh'].'">';     
                    }
                    echo '</div>';
                   
                    
                ?>
            </div>
           

            <div class="product-content-right">
                <?php
                $sql = 'select * from hanghoa where mshh = "'.$_GET['mshh'].'"';
                $result = executeSingleResult($sql);
                $tensanpham = $result['tenhh'];
                $gia = $result['gia'];
                $maloaihang = $result['maloaihang'];
                echo '<div class="product-content-right-product-name">
                        <h1>'.$result['tenhh'].'</h1>
                    </div>

                    <div class="product-content-right-product-price">
                        <p style="color: #005baa">'.number_format($result['gia']).' VND</p>
                    </div>';     
                ?>

                <div class="product-content-right-product-size">
                    <p style="font-weight: bold; color: #005baa">Size</p>
                    <div class="size">
                        <span class="chonsize">S</span>
                        <span class="chonsize">M</span>
                        <span class="chonsize">L</span>
                        <span class="chonsize">XL</span>
                        <span class="chonsize">XXL</span>
                    </div>
                </div>

                <div class="quantity">
                    <p style="font-weight: bold; color: #005baa;">Số lượng:</p>
                    <input type="number" min="0" value="1" id="chonsl">
                    <?php
                        $sql = 'select * from hanghoa where mshh = "'.$_GET['mshh'].'"';
                        $result = executeSingleResult($sql);
                        $soluongmax = $result['soluonghang'];
                        echo '<p class="slhienco">'.$result['soluonghang'].' sản phẩm có sẳn</p>';
                    ?>
                    <span id="vuotsl" hidden> Vượt quá số lượng hiện có!</span>
                </div>

                <div class="luuy">
                    <p>Vui lòng chọn size phù hợp (*)</p>
                </div>

                <div class="product-content-right-product-button">
                    <button><p onclick="addProduct();" id="thongbaomuahang">Mua hàng</p></button>
                    <?php echo '<button><a href="cartegory.php?maloaihang='.$maloaihang.'"><p>Tìm tại shop</p></a></button>'; ?>
                </div>

                <div class="product-content-right-product-icon">

                    <div class="product-content-right-product-icon-item">
                        <i class="fas fa-phone-alt"></i>
                        <p>Hotline</p>
                    </div>

                    <div class="product-content-right-product-icon-item">
                        <i class="fas fa-comments"></i>
                        <p>Chat</p>
                    </div>

                    <div class="product-content-right-product-icon-item">
                        <i class="fas fa-envelope"></i>
                        <p>Mail</p>
                    </div>

                </div>

                <div class="product-content-right-product-qr">
                    <img src="./images/qr.jpg">
                </div>

                <div class="product-content-right-bottom">

                    <div class="product-content-right-bottom-top">
                        &#8744;
                    </div>

                    <div class="product-content-right-bottom-content-big">

                        <div class="product-content-right-bottom-content-title">
                            <div class="product-content-right-bottom-content-title-item chitiet">
                                <p>Chi Tiết Sản Phẩm</p>
                            </div>
                        </div>

                        <div class="product-content-right-bottom-content">
                            <?php
                                $sql = 'select * from hanghoa where mshh = "'.$_GET['mshh'].'"';
                                $result = executeSingleResult($sql);
                                $mshh = $result['mshh'];
                                echo '<div class="product-content-right-bottom-content-chitiet">
                                        '.$result['motahanghoa'].'
                                    </div>';
                            ?>
                        </div>
                        
                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="notifly">
        <div class="custom-alert">
            <i class="fas fa-check-circle"></i>
            <p>Đã thêm vào giỏ hàng</p>
            <button id="close">Đóng</button>
        </div>
    </div>

    <!------------------------------------------------------SAN PHAM----------------------------------------------------->

    <!------------------------------------------------------SAN PHAM LIEN QUAN----------------------------------------------------->

    <div class="product-related">

        <div class="product-related-title">
            <p>Sản Phẩm Liên Quan</p>
        </div>

        <div class="product-related-content">
            <?php
                $sql = 'select maloaihang from hanghoa where mshh = "'.$_GET['mshh'].'"';
                $result = executeSingleResult($sql);
                $maloaihang = $result['maloaihang'];
                $sqll = 'select mshh from hanghoa where maloaihang = "'.$maloaihang.'" and mshh not in ('.$_GET['mshh'].')';
                $resultt = executeResult($sqll);
                foreach ($resultt as $row) {
                    $sql = 'select hh.tenhinh, h.tenhh, h.gia, h.mshh
                            from hanghoa h JOIN hinhhanghoa hh on h.mshh = hh.mshh 
                            where hh.mshh ="'.$row['mshh'].'" limit 1'; 
                    $result = executeResult($sql);
                    foreach ($result as $row) {
                        echo '<div class="product-related-content-item">
                                <a href="product.php?mshh='.$row['mshh'].'"><img src="./images/'.$row['tenhinh'].'">
                                <h1>'.$row['tenhh'].'</h1>
                                <p>'.number_format($row['gia']).' VND</p></a>
                            </div>';
                    }
                }
            ?>
        </div>

    </div>

    <!------------------------------------------------------SAN PHAM LIEN QUAN----------------------------------------------------->

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
        const button = document.querySelector(".product-content-right-bottom-top");
        if(button) {
            button.addEventListener("click", function() {
                document.querySelector(".product-content-right-bottom-content-big").classList.toggle("active");
            })
        }

        const chonelements = document.querySelectorAll('.chonsize');
        let size = 'S';
        chonelements.forEach((chon) => {
            chon.addEventListener("click", function(e) {
                size = e.target.innerText;
            })
        })

        const chonsl = document.querySelector('#chonsl');
        let soluong = 1;
        chonsl.addEventListener("change", function(e) {
            soluong = e.target.value;
            if (soluong > <?php echo $soluongmax; ?>) {
                document.getElementById("vuotsl").removeAttribute("hidden");
                e.target.value = <?php echo $soluongmax; ?>;
            }
        })

        function addProduct() {
            let products = [];
            if (JSON.parse(localStorage.getItem('products'))) {
                products = JSON.parse(localStorage.getItem('products'));
            };
            let product = products.find(function(item) {
                return item.mshh == <?php echo $mshh; ?>
            })

            let soluongthat = 0;

            if(product != undefined) {
                products = products.filter(function(item) {
                    return item.mshh != product.mshh;
                });
                soluongthat = parseInt(product.soluong) + parseInt(soluong);
            } else {
                soluongthat = soluong;
            }
            const productt = {
                size: size,
                soluong: soluongthat,
                tenhinh: '<?php echo $tenhinh; ?>',
                tenhh: '<?php echo $tensanpham; ?>',
                tenloaihang: '<?php echo $tenloaihang; ?>',
                gia: '<?php echo $gia; ?>',
                mshh: <?php echo $mshh; ?>
            };

            products.push(productt);
            localStorage.setItem('products', JSON.stringify(products));
        }

        var themgiohang = document.querySelector("#thongbaomuahang");
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