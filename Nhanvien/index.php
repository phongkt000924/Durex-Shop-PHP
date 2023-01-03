<?php
require_once('../db/dbconnection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>Admin - Durex</title>
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class='bx bxs-heart'></i>
            <span class="logo_name">Durex</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="index.php">
                    <i class="bx bx-grid-alt"></i>
                    <span class="link_name">Trang Chủ</span>
                </a>
            </li>
            <li>
                <a href="product.php">
                    <i class="bx bx-box"></i>
                    <span class="link_name">Sản Phẩm</span>
                </a>
            </li>
            <li>
                <a href="category.php">
                    <i class="bx bx-list-ul"></i>
                    <span class="link_name">Loại Sản Phẩm</span>
                </a>
            </li>
            <li>
                <a href="khachhang.php">
                    <i class="bx bx-pie-chart-alt-2"></i>
                    <span class="link_name">Khách Hàng</span>
                </a>
            </li>
            <li>
                <a href="donhang.php">
                    <i class="bx bx-coin-stack"></i>
                    <span class="link_name">Đơn Hàng</span>
                </a>
            </li>
        </ul>
    </div>

    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class="bx bx-menu sidebarBtn"></i>
                <span class="dashboard">Trang Chủ</span>
            </div>
            <div class="search-box">
                <input type="text" placeholder="Tìm Kiếm ...">
                <i class='bx bx-search'></i>
            </div>
            <div class="profile-details">
                <a href="information-admin.php"><img src="images/anhdaden.jpg" alt=""></a>
                <?php
                    $sql = 'select hotennv from nhanvien where msnv = -1';
                    $result = executeSingleResult($sql);
                    echo '<span class="admin_name">'.$result['hotennv'].'</span>';
                ?>
                <i class="bx bx-chevron-down"></i>
            </div>
        </nav>
        <div class="home-content">
            <div class="overview-boxes">
                <div class="box">
                    <div class="left-side">
                        <div class="box_topic">Tổng sản phẩm</div>
                        <?php
                            $sql = 'select count(*) tongsanpham from hanghoa';
                            $result = executeSingleResult($sql);
                            echo '<div class="number">'.$result['tongsanpham'].'</div>';
                        ?>
                        <div class="indicator">
                            <i class="bx bx-up-arrow-alt"></i>
                            <span class="text">Cập nhật hôm qua</span>
                        </div>
                    </div>
                    <i class="bx bxs-cart-alt cart"></i>
                </div>
                <div class="box">
                    <div class="left-side">
                        <div class="box_topic">Tổng loại sản phẩm</div>
                        <?php
                            $sql = 'select count(*) loaisanpham from loaihanghoa';
                            $result = executeSingleResult($sql);
                            echo '<div class="number">'.$result['loaisanpham'].'</div>';
                        ?>
                        <div class="indicator">
                            <i class="bx bx-up-arrow-alt"></i>
                            <span class="text">Cập nhật hôm qua</span>
                        </div>
                    </div>
                    <i class="bx bxs-cart-add cart two"></i>
                </div>
                <div class="box">
                    <div class="left-side">
                        <div class="box_topic">Tổng đơn hàng</div>
                        <?php
                            $sql = 'select count(*) tongdonhang from dathang';
                            $result = executeSingleResult($sql);
                            echo '<div class="number">'.$result['tongdonhang'].'</div>';
                        ?>
                        <div class="indicator">
                            <i class="bx bx-up-arrow-alt"></i>
                            <span class="text">Cập nhật hôm qua</span>
                        </div>
                    </div>
                    <i class="bx bxs-cart cart three"></i>
                </div>
                <div class="box">
                    <div class="left-side">
                        <div class="box_topic">Tổng doanh thu</div>
                        <?php
                            $sql = 'select sum(giadathang) tongdoanhthu from chitietdathang';
                            $result = executeSingleResult($sql);
                            echo '<div class="number">'.number_format($result['tongdoanhthu']).'</div>';
                        ?>
                        <div class="indicator">
                            <i class="bx bx-up-arrow-alt down"></i>
                            <span class="text">Cập nhật hôm qua</span>
                        </div>
                    </div>
                    <i class="bx bxs-cart-download cart four"></i>
                </div>
            </div>
            <div class="sales-boxes">
                <div class="recent-sale box">
                    <div class="title">Đơn Hàng Gần Đây</div>
                    <div class="sales-details">
                        <ul class="details">
                            <li class="topic">Ngày Đặt Hàng</li>
                            <?php
                            $sql = 'select * from dathang d join khachhang k on d.mskh = k.mskh where trangthaidh = -1 limit 6';
                            $result = executeResult($sql);
                            foreach ($result as $row) {
                                echo '<li><a href="#">'.$row['ngaydh'].'</a></li>';
                            }
                            ?>
                        </ul>
                        <ul class="details">
                            <li class="topic">Họ Tên Khách Hàng</li>
                            <?php
                            $sql = 'select * from dathang d join khachhang k on d.mskh = k.mskh where trangthaidh = -1 limit 6';
                            $result = executeResult($sql);
                            foreach ($result as $row) {
                                if ($row['hotenkh'] == null) {
                                    echo '<li><a href="#">No name</a></li>';
                                } else {
                                    echo '<li><a href="#">'.$row['hotenkh'].'</a></li>';
                                }
                            }
                            ?>
                        </ul>
                        <ul class="details">
                            <li class="topic">Trạng Thái Đơn Hàng</li>
                            <?php
                            $sql = 'select * from dathang d join khachhang k on d.mskh = k.mskh where trangthaidh = -1 limit 6';
                            $result = executeResult($sql);
                            foreach ($result as $row) {
                                if ($row['trangthaidh'] == -1) {
                                    echo '<li><a href="#">Chờ xác nhận</a></li>';
                                }
                            }
                            ?>
                        </ul>
                        <ul class="details">
                            <li class="topic">Tổng Tiền</li>
                            <?php
                            $sql = 'select * from dathang limit 6';
                            $result = executeResult($sql);
                            foreach ($result as $row) {
                                $sqll = 'select sum(giadathang) tongtien from chitietdathang where sodondh = "'.$row['sodondh'].'"';
                                $resultt = executeSingleResult($sqll);
                                // var_dump($resultt);
                                echo '<li><a href="#">'.number_format($resultt['tongtien']).'</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="button">
                        <a href="donhang.php">Xem chi tiết</a>
                    </div>
                </div>
                <!-- <div class="top-sales box">
                    <div class="title">Sản Phẩm Bán Chạy Nhất</div>
                    <ul>
                        <li>
                            <a href="#">
                                <img src="images/ttcp1.png" alt="">
                                <span class="product_name">Tu Tin Chinh Phuc</span>
                                <span class="price">129.000 VND</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/ttcp1.png" alt="">
                                <span class="product_name">Tu Tin Chinh Phuc</span>
                                <span class="price">129.000 VND</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/ttcp1.png" alt="">
                                <span class="product_name">Tu Tin Chinh Phuc</span>
                                <span class="price">129.000 VND</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/ttcp1.png" alt="">
                                <span class="product_name">Tu Tin Chinh Phuc</span>
                                <span class="price">129.000 VND</span>
                            </a>
                        </li>
                    </ul>
                </div> -->
            </div>
        </div>
    </section>

    <script src="admin.js"></script>

    <script>
        let profile_details = document.querySelector(".profile-details");
        profile_details.addEventListener("click", function() {
            document.location.href = "information-admin.php";
        });
    </script>

</body>

</html>