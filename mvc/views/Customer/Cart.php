<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Cửa hàng văn phòng phẩm</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet" />

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="http://localhost/CHVanPhongPham/public/css/bootstrap.min.css" />
    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="http://localhost/CHVanPhongPham/public/css/slick.css" />
    <link type="text/css" rel="stylesheet" href="http://localhost/CHVanPhongPham/public/css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="http://localhost/CHVanPhongPham/public/css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="http://localhost/CHVanPhongPham/public/css/font-awesome.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="http://localhost/CHVanPhongPham/public/css/style.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="http://localhost/CHVanPhongPham/public/js/cart.js"></script>
</head>

<body>
    <!-- Message -->
    <?php
    if (isset($_SESSION['message']) && $_SESSION['message'] != null) {
        // Hiển thị thông báo
        echo '<div id="message" class="alert alert-success">' . $_SESSION['message'] . '</div>';
        unset($_SESSION['message']);
    }
    ?>
    <script>
        setTimeout(function() {
            var messageDiv = document.getElementById('message');
            if (messageDiv) {
                messageDiv.style.display = 'none';
            }
        }, 5000);
    </script>
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->

            <div class="order-details" style="margin-bottom: 40px">
                <div class="order-summary">
                    <div class="col">
                        <div class="col-md-3">
                            <strong>
                                <p>Sản phẩm</p>
                            </strong>
                        </div>
                        <div class="col-md-2" style="left: 50px">
                            <strong>
                                <p>Giá</p>
                            </strong>
                        </div>
                        <div class="col-md-2" style="left: 100px">
                            <strong>
                                <p>Số lượng</p>
                            </strong>
                        </div>
                        <div class="col-md-2" style="left: 200px">
                            <strong>
                                <p>Tổng phụ</p>
                            </strong>
                        </div>
                        <div class="col-md-3" style="left: 200px">
                            <strong>
                                <p>Xóa</p>
                            </strong>
                        </div>
                    </div>
                </div>
            </div>

            <form action="">
                <?php
                $toltal_price = 0;
                if (mysqli_num_rows($data["carts"]) > 0) {
                    while ($row = mysqli_fetch_assoc($data["carts"])) {

                ?>
                        <div class="order-details" style="margin-bottom: 40px">
                            <div class="order-summary">
                                <div class="order-products" style="padding-bottom: 10px">

                                    <div class="col">
                                        <div class="col-md-3">
                                            <img src="http://localhost/CHVanPhongPham/public/image/<?php echo $row['anhsp'] ?>" alt="" style="height: 40px; width: 40px; margin-right: 10px" />
                                            <?php
                                            echo $row['tensp'];
                                            ?>
                                        </div>
                                        <div class="col-md-2" style="margin-top: 10px; left: 50px">
                                            <?php
                                            echo $row['price'];

                                            ?>
                                        </div>
                                        <div class="col-md-2" style="margin-top: 7px; left: 100px">

                                            <input class="text-center qty-input" type="number" name="qty" id="number-<?php echo $row['cart_id']; ?>" value="<?php echo (int)$row['quantity']; ?>" style="width: 60px" data-cart-id="<?php echo $row['cart_id']; ?>" />
                                        </div>
                                        <div id="subtotal-<?php echo $row['cart_id']; ?>" class="col-md-2" style="margin-top: 10px; left: 200px">
                                            <?php
                                            $row_price = (float)$row['price'] * (int)$row['quantity'];
                                            $toltal_price += $row_price;
                                            echo $row_price;
                                            ?> đ
                                        </div>
                                        <div class="col-md-3" style="margin-top: 10px; left: 200px">
                                            <a href="<?php echo '/CHVanPhongPham/HomeController/deleteCart/' . $row["cart_id"] . '' ?>" title="Xóa"><i class="fa-solid fa-x"></i></a>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </form>

            <div class="order-summary">
                <div class="order-products">
                    <div class="order-col">
                        <div>
                            <a href="http://localhost/CHVanPhongPham/HomeUser/show" style="padding: 10px; background-color: #fff; border: 2px solid;">
                                <strong>Return to shop</strong>
                            </a>
                        </div>
                        <div>
                            <!-- <a href="http://localhost/CHVanPhongPham/HomeController/deleteAllCart" style="padding: 10px; background-color: #fff; border: 2px solid;">
                                <strong>Xóa tất cả</strong>
                            </a> -->
                            <form id="deleteAllForm" action="http://localhost/CHVanPhongPham/HomeController/deleteAllCart" method="POST">
                                <!-- <button type="button" id="deleteAllBtn" class="btn btn-danger" >Xóa tất cả</button> -->
                                <?php
                                if (mysqli_num_rows($data["carts"]) > 0) {
                                ?>
                                    <button type="button" id="deleteAllBtn" style="padding: 10px; background-color: #fff; border: 2px solid;">
                                        <strong>Xóa tất cả</strong>
                                    </button>
                                <?php } else { ?>
                                    <button type="button" id="deleteAllBtn" style="padding: 10px; background-color: #fff; border: 2px solid; opacity: 0.4; pointer-events: none">
                                        <strong>Xóa tất cả</strong>
                                    </button>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 40px">
                <div class="col-md-6" style="right: 15px; margin-top: 10px">
                    <div class="col-md-6 form-group">
                        <input class="form-control" type="text" name="couponCode" placeholder="Mã giảm giá" style="padding: 20px" />
                    </div>
                    <div class="form-group" style="margin-left: 15px">
                        <button class="btn btn-default" style="padding: 10px; color: #fff; background-color: #db4444">
                            Áp dụng phiếu giảm giá
                        </button>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="order-summary" style="
                border: 1.5px solid black;
                padding: 15px;
                margin-bottom: 60px;
              ">
                        <div class="order-products">
                            <div class="order-col" style="margin-top: 20px">
                                <strong>Tổng tiền giỏ hàng</strong>
                            </div>
                            <div class="order-col" style="margin-top: 20px; border-bottom: 1px solid black">
                                <div>Tổng tiền hàng</div>
                                <div id="total-price"><?php echo $toltal_price ?> đ</div>
                            </div>
                            <div class="order-col" style="margin-top: 20px; border-bottom: 1px solid black">
                                <div>Chi phí vận chuyển</div>
                                <div>Miễn phí</div>
                            </div>
                            <div class="order-col" style="margin-top: 20px">
                                <div>Tổng thanh toán</div>
                                <div id="total-payment"><?php
                                                        echo ($toltal_price - 0);
                                                        ?>
                                    đ
                                </div>
                            </div>
                            <div class="text-center" style="margin-top: 20px">
                                <a href="http://localhost/CHVanPhongPham/CheckoutController/Checkout" class="btn btn-default" style="
                      padding: 10px;
                      color: #fff;
                      background-color: #db4444;
                      margin-bottom: 20px;
                    ">
                                    Mua hàng
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- jQuery Plugins -->
    <script src="http://localhost/CHVanPhongPham/public/js/jquery.min.js"></script>
    <script src="http://localhost/CHVanPhongPham/public/js/bootstrap.min.js"></script>
    <script src="http://localhost/CHVanPhongPham/public/js/slick.min.js"></script>
    <script src="http://localhost/CHVanPhongPham/public/js/nouislider.min.js"></script>
    <script src="http://localhost/CHVanPhongPham/public/js/jquery.zoom.min.js"></script>
    <script src="http://localhost/CHVanPhongPham/public/js/main.js"></script>
</body>

</html>