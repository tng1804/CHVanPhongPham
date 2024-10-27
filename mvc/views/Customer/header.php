<?php
include 'session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cửa hàng văn phòng phẩm</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="http://localhost/CHVanPhongPham/public/css/header2.css">
    <link rel="stylesheet" href="http://localhost/CHVanPhongPham/public/css/main-index.css">
    <link rel="stylesheet" href="http://localhost/CHVanPhongPham/public/css/Search2.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="http://localhost/CHVanPhongPham/public/js/cart.js"></script>

</head>

<body>
    <div id="header">
        <div class="header-list1">
            <ul>
                <li>
                    <a href="#">
                        <i class="fas fa-user"></i>
                        Tài khoản
                    </a>
                </li>
                <li>
                    <a href="cart.php">
                        <i class="fas fa-shopping-cart"></i>
                        Giỏ hàng
                    </a>
                </li>
                <li>
                    <a href="/CHVanPhongPham/HomeController/myOrders">
                        <i class="fas fa-money-bill"></i>
                        Đơn hàng của tôi
                </li>
                </a>
                <?php
                if ($_SESSION['ten_User'] == null) {
                    echo "<li>
                        <a href='/CHVanPhongPham/Login/login'>
                            <i class='fas fa-sign-out-alt'></i>

                            Đăng nhập
                        </a>
                        </li>";
                } else {
                    echo "<li>
                        " . $_SESSION['ten_User'] . "
                        </li>";
                }


                ?>
                <li>
                    <a href="/CHVanPhongPham/Login/login/">
                        <i class="fas fa-check"></i>
                        Đăng xuất
                    </a>
                </li>
            </ul>

        </div>
        <div class="header-list2">
            <div class="header-list2-icon">
                <a class="icon1" href="/CHVanPhongPham/HomeUser/"><i class="fas fa-home"></i></a>
            </div>
            <div class="header-list2-search">

                <form class="header-list2-search" method="post">
                    <input class="search" name="txt-search" type="text" placeholder="Nhập tên sản phẩm để tìm kiếm...">
                    <button class="btn-search" name="btn-search">
                        <i class="fas fa-search"></i>
                    </button>

                </form>
            </div>
            <div class="header-list2-cart">
                <a href="http://localhost/CHVanPhongPham/HomeController/viewCart"><i class="fas fa-shopping-cart"></i></a>
                <p class="info-cart">
                    <a href="" id="productCart">
                        <?php
                        // /echo $data["sumProduct"];
                        ?>
                    </a>
                </p>
                <p class="name">GIỎ HÀNG</p>

            </div>


        </div>

        <div class="header-list3">
            <ul class="nav">
                <li class="loai-danhmuc"><a href="/CHVanPhongPham/HomeUser/">Home</a></li>
                <?php
                if (!empty($dataheader["loaisp"])) {
                    foreach ($dataheader["loaisp"] as $row) {
                ?>
                        <li class="loai-danhmuc">
                            <a href="/CHVanPhongPham/HomeUser/ShowByCategory/<?php echo $row['id_loaisp']; ?>">
                                <?php echo $row['tenloaisp']; ?>
                            </a>
                        </li>
                <?php
                    }
                }
                ?>


            </ul>

        </div>
    </div>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btn-search'])) {
        $txt = $_POST['txt-search'];
        echo "
                    <script>
                    // alert('Cập nhập dữ liệu thành công');
                    window.location.href='/CHVanPhongPham/HomeUser/SearchProduct/" . $txt . "';
                    </script>
                    ";
    }


    ?>


    <!-- </body>

</html> -->