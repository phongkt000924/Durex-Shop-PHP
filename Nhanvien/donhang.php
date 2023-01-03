<?php
require_once('../db/dbconnection.php');

if(!empty($_GET)) {
    $sodondh = $_GET['sodondh'];

    if(isset($_GET['xoa'])) {
        $sql = 'DELETE FROM chitietdathang WHERE sodondh = "'.($sodondh).'"';
        execute($sql);

        $sql = 'DELETE FROM dathang WHERE sodondh = "'.($sodondh).'"';
        execute($sql);
    } else {
        $sql = 'UPDATE dathang SET trangthaidh = "0", ngaygh = "'.date("Y-m-d").'" WHERE sodondh = "'.($sodondh).'"';
        execute($sql);
    }
    
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
    <title>Đơn Hàng - Durex</title>
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
                <?php
                    $sql = 'select hotennv from nhanvien where msnv = -1';
                    $result = executeSingleResult($sql);
                    echo '<span class="admin_name">'.$result['hotennv'].'</span>';
                ?>
                <i class="bx bx-chevron-down"></i>
            </div>
        </nav>
        <div class="donhang">
            <div class="donhang-content">
                <h1>Đơn hàng</h1>
                <table>
                    <tr>
                        <th>MS HĐ</th>
                        <th>MS KH</th>
                        <th>Tên NV</th>
                        <th>Ngày ĐH </th>
                        <th>Ngày Giao</th>
                        <th>Trạng Thái</th>
                        <th colspan="2">Tùy Chỉnh</th>
                    </tr>
                    <?php
                    $sql = 'select * from dathang';
                    $result = executeResult($sql);
                    foreach ($result as $row) {
                        $sql = 'SELECT * FROM nhanvien WHERE msnv = "'.($row['msnv']).'"';
                        $resultsel = executeSingleResult($sql);

                        echo '
                            <tr>
                                <td>'.$row['sodondh'].'</td>
                                <td>'.$row['mskh'].'</td>
                                <td>'.$resultsel['hotennv'].'</td>
                                <td>'.$row['ngaydh'].'</td>
                                <td>'.$row['ngaygh'].'</td>
                                <td>'.$row['trangthaidh'].'</td>';
                        if($row['trangthaidh'] == '-1') {
                            echo '<td onclick="edit('.$row['sodondh'].')"><span>Sửa</span></td>';
                        } else {
                            echo '<td onclick="xem('.$row['sodondh'].')"><span>Xem</span></td>';
                        }
                        echo '
                                <td onclick="xoa('.$row['sodondh'].')"><span>Xóa</span></td>
                            </tr>';
                        }

                        
                    ?>
                </table>
            </div>
        </div>
    </section>

    <script src="admin.js"></script>

    <script>
        let profile_details = document.querySelector(".profile-details");
        profile_details.addEventListener("click", function() {
            document.location.href = "information-admin.php";
        });

        function edit(sodondh) {
            document.location.href = `chitietdonhang.php?sodondh=${sodondh}`;
        }
        function xem(sodondh) {
            document.location.href = `chitietdonhang.php?sodondh=${sodondh}&xem=dungroi`;
        }
        function xoa(sodondh) {
            document.location.href = `donhang.php?sodondh=${sodondh}&xoa=dungroi`;
        }
    </script>

</body>

</html>