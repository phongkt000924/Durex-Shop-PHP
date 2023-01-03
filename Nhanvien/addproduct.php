<?php
require_once('../db/dbconnection.php');

$isUpdate = '-1';
$mshh = '-1';
if(!empty($_GET)) {
    $sql = 'SELECT * FROM hanghoa WHERE mshh = "'.($_GET['mshh']).'"';
    $resultGoc = executeSingleResult($sql);
    $isUpdate = '1';
    $mshh = $_GET['mshh'];
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
    <title>Chi Tiết Sản Phẩm - Durex</title>
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
                    echo '<span class="admin_name">' . $result['hotennv'] . '</span>';
                ?>
                <i class="bx bx-chevron-down"></i>
            </div>
        </nav>
        <div class="add-product">
            <div class="add-product-content">
                <h1>VUI LÒNG NHẬP THÔNG TIN CHO CHI TIẾT SẢN PHẨM</h1>
                <div class="add-product-content-top">
                    <div class="add-product-content-info">
                        <div class="add-product-content-top-item">
                            <label for="">Tên Hàng Hóa <span style="color: red">*</span></label>
                            <input type="text" class="inputvalue" name="ten" value="<?php if(isset($resultGoc)) echo $resultGoc['tenhh'] ?>">
                        </div>
                        <div class="add-product-content-top-item">
                            <label for="">Quy Cách <span style="color: red">*</span></label>
                            <input type="text" class="inputvalue" name="quycach" value="<?php if(isset($resultGoc)) echo $resultGoc['quycach'] ?>">
                        </div>
                        <div class="add-product-content-top-item">
                            <label for="">Giá <span style="color: red">*</span></label>
                            <input type="text" class="inputvalue" name="gia" value="<?php if(isset($resultGoc)) echo $resultGoc['gia'] ?>">
                        </div>
                        <div class="add-product-content-top-item">
                            <label for="">Số Lượng Hàng Tồn <span style="color: red">*</span></label>
                            <input type="text" class="inputvalue" name="soluong" value="<?php if(isset($resultGoc)) echo $resultGoc['soluonghang'] ?>">
                        </div>
                        <div class="add-product-content-top-item">
                            <label for="">Mô Tả <span style="color: red">*</span></label>
                            <input type="text" class="inputvalue" name="mota" value="<?php if(isset($resultGoc)) echo $resultGoc['motahanghoa'] ?>">
                        </div>
                        <div class="add-product-content-top-item">
                            <label for="">Mã Loại Hàng <span style="color: red">*</span></label>
                            <input type="text" class="inputvalue" name="maloai" value="<?php if(isset($resultGoc)) echo $resultGoc['maloaihang'] ?>">
                        </div>
                    </div>
                    <div class="add-product-content-img">
                        <div class="add-product-content-bottom-item">
                            <label for="">Hình Hàng Hóa 1 (Hình Chính) <span style="color: red">*</span></label>
                            <input type="file" name="hoten" class="upload hinh1">
                        </div>
                        <div class="add-product-content-bottom-item">
                            <label for="">Hình Hàng Hóa 2 <span style="color: red">*</span></label>
                            <input type="file" name="hoten" class="upload hinh2">
                        </div>
                        <div class="add-product-content-bottom-item">
                            <label for="">Hình Hàng Hóa 3 <span style="color: red">*</span></label>
                            <input type="file" name="hoten" class="upload hinh3">
                        </div>
                        <div class="add-product-content-bottom-item">
                            <label for="">Hình Hàng Hóa 4 <span style="color: red">*</span></label>
                            <input type="file" name="hoten" class="upload hinh4">
                        </div>
                        <div class="add-product-content-bottom-item">
                            <?php 
                                if(isset($resultGoc)) {
                                    $sql = 'SELECT * FROM hinhhanghoa WHERE mshh = "'.($_GET['mshh']).'"';
                                    $result = executeResult($sql);
                                    $temp = 0;
                                    foreach($result as $row) {
                                        $temp++;
                                        echo '<img src="images/'.($row['tenhinh']).'" class="hinh'.($temp).'">';
                                    }
                                } else {
                                    echo '
                                    <img src="images/bpsb1.jpg" class="hinh1">
                                    <img src="images/anhdaden.jpg" class="hinh2">
                                    <img src="images/anhdaden.jpg" class="hinh3">
                                    <img src="images/anhdaden.jpg" class="hinh4">
                                    ';
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="button">
                    <a href="product.php">Quay Lại</a>
                    <a href="#" id="luu">Lưu</a>
                </div>
            </div>
        </div>
    </section>

    <script src="admin.js"></script>

    <script>
        const uploadFiles = document.querySelectorAll('.upload');
        uploadFiles.forEach(function(file) {
            file.addEventListener("change", function(e) {
                if (file.classList.contains('hinh1')) {
                    const hinh = document.querySelectorAll('.hinh1');
                    hinh[1].src = (window.URL || window.webkitURL).createObjectURL(e.target.files[0]);
                } else if (file.classList.contains('hinh2')) {
                    const hinh = document.querySelectorAll('.hinh2');
                    hinh[1].src = (window.URL || window.webkitURL).createObjectURL(e.target.files[0]);
                } else if (file.classList.contains('hinh3')) {
                    const hinh = document.querySelectorAll('.hinh3');
                    hinh[1].src = (window.URL || window.webkitURL).createObjectURL(e.target.files[0]);
                } else if (file.classList.contains('hinh4')) {
                    const hinh = document.querySelectorAll('.hinh4');
                    hinh[1].src = (window.URL || window.webkitURL).createObjectURL(e.target.files[0]);
                }
            })
        })

        document.getElementById('luu').addEventListener('click', function(e) {
            e.preventDefault();
            const inputvalue = document.querySelectorAll('.inputvalue');
            const isUpdate = '<?php echo $isUpdate; ?>'
            let isValid = true;
            inputvalue.forEach(function(input) {
                if (input.value == '') {
                    isValid = false;
                }
            })
            if(isUpdate == '-1') {
                uploadFiles.forEach(function(file) {
                    if (file.files[0] == undefined) {
                        isValid = false;
                    }
                });
            }
            // if (isValid == false) {
            //     alert('Vui long nhap het du lieu!');
            //     return;
            // }
            var formData = new FormData();
            uploadFiles.forEach(function(file, index) {
                formData.append(`hinh${index+1}`, file.files[0]);
            })
            inputvalue.forEach(function(input) {
                formData.append(input.name, input.value);
            })

            if(isUpdate == '1') {
                formData.append('isUpdate', 'dungroi');
                formData.append('mshh', '<?php echo $mshh; ?>');
            }

            formData.append('product', 'dungroi');

            fetch('api-add-item.php', {
                method: 'POST',
                body: formData
            })

            alert('Chờ một tí');

            setTimeout(function() {
                document.location.href = 'product.php';
            }, 2000);
        })
    </script>

    <script>
        let profile_details = document.querySelector(".profile-details");
        profile_details.addEventListener("click", function() {
            document.location.href = "information-admin.php";
        });
    </script>

</body>

</html>