<?php
require_once('../db/dbconnection.php');

if(!empty($_GET)) {
    $maloaihang = $_GET['maloaihang'];

    $sql = 'SELECT * FROM hanghoa WHERE maloaihang = "'.($maloaihang).'"';
    $result = executeResult($sql);

    foreach($result as $row) {
        $sql = 'DELETE FROM hinhhanghoa WHERE mshh = "'.($row['mshh']).'"';
        execute($sql);
    }

    $sql = 'DELETE FROM hanghoa WHERE maloaihang = "'.($maloaihang).'"';
    execute($sql);

    $sql = 'DELETE FROM loaihanghoa WHERE maloaihang = "'.($maloaihang).'"';
    execute($sql);
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
    <title>Loại Sản Phẩm - Durex</title>
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
        <div class="category">
            <div class="category-content">
                <h1>Loại Sản Phẩm</h1>
                <table>
                    <tr>
                        <th>Mã Loại Hàng</th>
                        <th>Tên Loại Hàng</th>
                        <th>Slogan Loại Hàng</th>
                        <th>Mô Tả</th>
                        <th colspan="2">Tùy Chỉnh</th>
                    </tr>
                    <?php
                        $sql = 'select * from loaihanghoa';
                        $result = executeResult($sql);
                        foreach ($result as $row) {
                            echo '
                                <tr>
                                    <td>'.$row['maloaihang'].'</td>
                                    <td>'.$row['tenloaihang'].'</td>
                                    <td>'.$row['sloganloaihang'].'</td>
                                    <td>'.$row['motaloaihang'].'</td>
                                    <td onclick="edit('.($row['maloaihang']).')"><span>Sửa</span></td>
                                    <td onclick="xoa('.($row['maloaihang']).')"><span>Xóa</span></td>
                                </tr>'; 
                        }    
                    ?>
                </table>
                <div class="button">
                    <a href="addcategory.php">Thêm loại sản phẩm mới</a>
                </div>
            </div>
    </section>

    <script>
        function edit(maloaihang) {
            document.location.href = `addcategory.php?maloaihang=${maloaihang}&isUpdate=dungroi`;
        }
        function xoa(maloaihang) {
            document.location.href = `category.php?maloaihang=${maloaihang}`;
        }
    </script>

    <script>
        let profile_details = document.querySelector(".profile-details");
        profile_details.addEventListener("click", function() {
            document.location.href = "information-admin.php";
        });
    </script>

    <script src="admin.js"></script>

</body>

</html>