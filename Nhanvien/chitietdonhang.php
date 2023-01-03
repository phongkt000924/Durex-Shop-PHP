<?php
require_once('../db/dbconnection.php');

if(!empty($_GET)) {
    $sodondh = $_GET['sodondh'];
    $sql = 'SELECT * FROM dathang WHERE sodondh = "'.$sodondh.'"';
    $result = executeSingleResult($sql);
    // echo $sql;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>Chi Tiết Đơn Hàng - Durex</title>
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
                <img src="images/anhdaden.jpg" alt="">
                <span class="admin_name">Kim Thai Phong</span>
                <i class="bx bx-chevron-down"></i>
            </div>
        </nav>
        <div class="chitietdonhang">
            <div class="chitietdonhang-content">
                <h1>chi tiết Đơn hàng</h1>
                <div class="chitietdonhang-content-info">
                    <div class="chitietdonhang-content-info-don">
                        <table>
                            <tr>
                                <th>MS HĐ</th>
                                <th>MS KH</th>
                                <th>Tên NV</th>
                                <th>Ngày Đặt</th>
                                <th>Ngày Giao</th>
                                <th>Trạng Thái</th>
                            </tr>
                            <?php 
                                if ($result['trangthaidh'] == '-1') {
                                    $trangthai = 'Chờ xác nhận';
                                } else {
                                    $trangthai = 'Đã Duyệt';
                                }
                                $sql = 'SELECT * FROM nhanvien WHERE msnv = "'.($result['msnv']).'"';
                                $resultsel = executeSingleResult($sql);
                                echo '
                                    <tr>
                                        <td>'.($result['sodondh']).'</td>
                                        <td>'.($result['mskh']).'</td>
                                        <td>'.($resultsel['hotennv']).'</td>
                                        <td>'.($result['ngaydh']).'</td>
                                        <td>'.($result['ngaygh']).'</td>
                                        <td>'.($trangthai).'</td>
                                    </tr>
                                ';
                            ?>
                        </table>
                    </div>
                    <div class="chitietdonhang-content-info-khach">
                        <table>
                            <tr>
                                <th>MS KH</th>
                                <th>Họ Tên KH</th>
                                <th>Tên Công Ty</th>
                                <th>Số Điện Thoại</th>
                                <th>Số Fax</th>
                            </tr>

                            <?php 
                                $sql = 'SELECT * FROM khachhang WHERE mskh = "'.($result['mskh']).'"';
                                $resultkh = executeSingleResult($sql);
                                echo '
                                    <tr>
                                        <td>'.($result['mskh']).'</td>
                                        <td>'.($resultkh['hotenkh']).'</td>
                                        <td>'.($resultkh['tencongty']).'</td>
                                        <td>'.($resultkh['sodienthoai']).'</td>
                                        <td>'.($resultkh['sofax']).'</td>
                                    </tr>
                                ';
                            ?>
                            
                        </table>
                    </div>
                </div>
                <div class="chitietdonhang-content-sanpham">
                    <table>
                        <tr>
                            <th>Sản Phẩm</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Loại Sản Phẩm</th>
                            <th>Số Lượng</th>
                            <th>Thành Tiền</th>
                            <th>Giảm Giá</th>
                        </tr>
                        <?php 
                            $sql = 'SELECT * FROM chitietdathang WHERE sodondh = "'.($_GET['sodondh']).'"';
                            $resultct = executeResult($sql);

                            $tongtienhang = 0;

                            foreach ($resultct as $row) {
                                $sql = 'SELECT * FROM hanghoa WHERE mshh = "'.($row['mshh']).'"';
                                $resultsl = executeSingleResult($sql);

                                $sqlhinh = 'SELECT * FROM hinhhanghoa WHERE mshh = "'.($row['mshh']).'" limit 1';
                                $resulthinh = executeSingleResult($sqlhinh);
                                $tongtien = $resultsl['gia'] * $row['soluong'];
                                $tongtienhang = $tongtienhang + $tongtien;
                                echo '
                                    <tr>
                                        <td><img src="images/'.$resulthinh['tenhinh'].'"></td>
                                        <td>'.$resultsl['tenhh'].'</td>
                                        <td>'.$resultsl['maloaihang'].'</td>
                                        <td>'.$row['soluong'].'</td>
                                        <td>'.number_format($tongtien).' VND</td>
                                        <td>'.$row['giamgia'].' VND</td>
                                    </tr>
                                ';
                            }
                        ?>
                    </table>
                </div>
                <div class="chitietdonhang-content-thanhtoan">
                    <table>
                        <tr>
                            <th>Tổng Tiền</th>
                            <th>Thuế VAT</th>
                            <th>Phí Giao Hàng</th>
                            <th>Tổng Cộng</th>
                        </tr>
                        
                        <?php 
                            echo '
                                <tr>
                                    <td>'.(number_format($tongtienhang)).' VND</td>
                                    <td>'.(number_format($tongtienhang * 0.1)).' VND</td>
                                    <td>0 VND</td>
                                    <td>'.(number_format($tongtienhang + $tongtienhang * 0.1    )).' VND</td>
                                </tr>
                            ';
                        ?>
                    </table>
                </div>
                <div class="button">
                    <a href="donhang.php">Quay Lại</a>
                    <?php 
                        if(isset($_GET['xem'])) {

                        } else {
                            echo '<a href="donhang.php?sodondh='.$_GET['sodondh'].'">Duyệt</a>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>
    
    <script src="admin.js"></script>

</body>

</html>