<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Electro - HTML Ecommerce Template</title>

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
</head>

<body>




    <div class="section">
        <div class="container">
            <div class="section-title">
                <h3>Hóa đơn chi tiết</h3>
            </div>
        </div>
    </div>

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <form action="http://localhost/CHVanPhongPham/CheckoutController/postCheckout" method="post">
                <div class="row">
                    <div class="col-md-7">
                        <!-- Billing Details -->
                        <div class="billing-details">
                            <div class="form-group">
                                <p>Họ tên</p>
                                <input class="input" type="text" name="name" placeholder="" style="background-color: #f5f5f5" />
                            </div>
                            <div class="form-group">
                                <p>Địa chỉ</p>
                                <input class="input" type="text" name="address" placeholder="" style="background-color: #f5f5f5" />
                            </div>
                            <div class="form-group">
                                <p>Số điện thoại</p>
                                <input class="input" type="tel" name="tel" placeholder="" style="background-color: #f5f5f5" />
                            </div>
                            <div class="form-group">
                                <p>Địa chỉ email</p>
                                <input class="input" type="email" name="email" placeholder="" style="background-color: #f5f5f5" />
                            </div>
                            <div class="form-group">
                                <div class="input-checkbox">
                                    <input type="checkbox" id="create-account" />
                                    <label for="create-account">
                                        <span></span>
                                        Lưu thông tin
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- /Billing Details -->
                    </div>

                    <!-- Order Details -->
                    <div class="col-md-5 order-details">
                        <div class="order-summary">
                            <div class="order-products">
                                <?php
                                $toltal_price = 0;
                                if (mysqli_num_rows($data["carts"]) > 0) {
                                    while ($row = mysqli_fetch_assoc($data["carts"])) {
                                ?>
                                        <div class="order-col">
                                            <div>
                                                <img src="http://localhost/CHVanPhongPham/public/image/<?php echo $row['anhsp'] ?>" alt="" style="height: 40px; width: 40px" />
                                                <?php
                                                echo $row['tensp'] . "  x" . $row['quantity'];
                                                ?>
                                            </div>
                                            <div>
                                                <?php
                                                echo $row['price'] * $row['quantity'];
                                                ?> đ
                                            </div>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="order-col" style="border-bottom: 1px solid #999">
                                <div>Tổng tiền hàng</div>
                                <div>
                                    <?php
                                    echo $data['totalPrice'];
                                    ?> đ
                                </div>
                            </div>
                            <div class="order-col" style="border-bottom: 1px solid #999">
                                <div>Chi phí vận chuyển</div>
                                <div>Free</div>
                            </div>
                            <div class="order-col">
                                <div>Tổng thanh toán</div>
                                <div><?php
                                        echo $data['totalPrice'];
                                        ?> đ
                                </div>
                            </div>
                        </div>


                        <div class="payment-method">
                            <div class="row" style="margin-bottom: 10px">
                                <div class="payment-content-left-method-delivery" style="padding-left: 15px; padding-bottom: 5px;">
                                    <div class="payment-content-left-method-delivery-item">
                                        <input name="deliver-method" value="Giao hàng chuyển phát nhanh" checked type="radio">
                                        <label for="">Giao hàng chuyển phát nhanh</label>
                                    </div>
                                    <br>
                                    <h4>Phương thức thanh thanh toán</h4>

                                </div>
                                <div class="col-md-8">
                                    <input type="radio" name="payment" id="payment-1" value="vnpay" />
                                    <label for="payment-1">
                                        <span></span>
                                        Thẻ tín dụng/Ghi nợ (VNPAY)
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <ul class="footer-payments">
                                        <li>
                                            <a href="#"><i class="fa-solid fa-credit-card"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa-brands fa-cc-visa"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa-brands fa-cc-mastercard"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa-brands fa-cc-amex"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div>
                                <input type="radio" name="payment" id="payment-2" value="cod" />
                                <label for="payment-2">
                                    <span></span>
                                    Thanh toán khi nhận hàng
                                </label>
                            </div>
                        </div>
                        <!-- <div>
                        <div class="row">
                            <div class="col-md-6" style="margin-top: 33px">
                                <input class="input" type="text" name="first-name" placeholder="Mã giảm giá" />
                            </div>
                            <div class="col-md-6">
                                <a href="#" class="primary-btn order-submit">Áp dụng phiếu giảm giá</a>
                            </div>
                        </div>
                    </div> -->
                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="primary-btn order-submit">Đặt hàng</button>
                            </div>
                        </div>
                    </div>
                    <!-- /Order Details -->
                </div>
            </form>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
    <!-- jQuery Plugins -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>