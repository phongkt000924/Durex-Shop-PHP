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
    <title>Kim Thái Phong - Durex</title>
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
            <div style="z-index: 1;" class="profile-details">
                <a href="information-admin.php"><img src="images/anhdaden.jpg" alt=""></a>
                <?php
                    $sql = 'select hotennv from nhanvien where msnv = -1';
                    $result = executeSingleResult($sql);
                    echo '<span class="admin_name">'.$result['hotennv'].'</span>';
                ?>
                <i class="bx bx-chevron-down"></i>
            </div>
        </nav>
        <div class="information-admin">
            <div class="information-admin-content">
                <h1>admin - kim thái phong - durex shop</h1>
                <table>
                    <tr>
                        <th>Mã Số Nhân Viên</th>
                        <th>Họ Tên Nhân Viên</th>
                        <th>Chức Vụ</th>
                        <th>Địa Chỉ</th>
                        <th>Số Điện Thoại</th>
                    </tr>
                    <?php
                        $sql = 'select * from nhanvien';
                        $result = executeResult($sql);
                        foreach ($result as $row) {
                            echo '
                                <tr>
                                    <td>'.$row['msnv'].'</td>
                                    <td>'.$row['hotennv'].'</td>
                                    <td>'.$row['chucvu'].'</td>
                                    <td>'.$row['diachi'].'</td>
                                    <td>'.$row['sodienthoai'].'</td>
                                </tr>'; 
                        }    
                    ?>
                </table>
                <div class="button">
                    <a href="index.php">Quay lại</a>
                </div>
            </div>
    </section>

    <script>
        let profile_details = document.querySelector(".profile-details");
        profile_details.addEventListener("click", function() {
            document.location.href = "information-admin.php";
        });
    </script>

    <script src="admin.js"></script>

</body>

</html>