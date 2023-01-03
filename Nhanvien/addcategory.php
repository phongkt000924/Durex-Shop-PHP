<?php
require_once('../db/dbconnection.php');

$isUpdate = '-1';
$maloaihang = '-1';


if(!empty($_GET)) {
    $sql = 'SELECT * FROM loaihanghoa WHERE maloaihang = "'.($_GET['maloaihang']).'"';
    $resultGoc = executeSingleResult($sql);
    $isUpdate = '1';
    $maloaihang = $_GET['maloaihang'];
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
        <div class="add-category">
            <div class="add-category-content">
                <h1>VUI LÒNG NHẬP THÔNG TIN LOẠI SẢN PHẨM</h1>
                <div class="add-category-content-top">
                    <div class="add-category-content-top-item">
                        <label for="">Tên Loại Hàng <span style="color: red">*</span></label>
                        <input type="text" name="tenloaihang" class="input-value" value="<?php if(isset($resultGoc)) echo $resultGoc['tenloaihang'] ?>">
                    </div>
                    <div class="add-category-content-top-item">
                        <label for="">Slogan Loại Hàng <span style="color: red">*</span></label>
                        <input type="text" name="slogan" class="input-value" value="<?php if(isset($resultGoc)) echo $resultGoc['sloganloaihang'] ?>">
                    </div>
                    <div class="add-category-content-top-item">
                        <label for="">Mô Tả <span style="color: red">*</span></label>
                        <input type="text" name="mota" class="input-value" value="<?php if(isset($resultGoc)) echo $resultGoc['motaloaihang'] ?>">
                    </div>
                </div>
                <div class="button">
                    <a href="category.php">Quay Lại</a>
                    <a href="#" id="save">Lưu</a>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.getElementById('save').addEventListener('click', function(e) {
            e.preventDefault();

            let isValid = true;

            const inputValues = document.querySelectorAll('.input-value');
            inputValues.forEach(function(input) {
                if (input.value == '') {
                    isValid = false;
                }
            });

            if (!isValid) {
                alert("Vui lòng nhập đầy đủ thông tin. Cám ơn");
                return;
            }
            var formData = new FormData();
            inputValues.forEach(function(input) {
                formData.append(input.name, input.value);
            });

            formData.append('category', 'dungroi');

            const isUpdate = '<?php echo $isUpdate; ?>';
            if(isUpdate == '1') {
                formData.append('isUpdate', 'dungroi');
                formData.append('maloaihang', '<?php echo $maloaihang ?>');
            }

            fetch('api-add-item.php', {
                method: 'POST',
                body: formData
            })

            alert('Chờ một tí');

            setTimeout(function() {
                document.location.href = 'category.php';
            }, 2000);
        });
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