<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My orders</title>
    <link rel="stylesheet" href="/CHVanPhongPham/public/css/myOrder.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="assets/img/NT.png" />
</head>

<body>
    <?php 
        // include 'header.php';
    ?>
    <div id="top" style="margin-top: 90px; margin-bottom: 70px"></div>
    <div class="container bootdey">
        <div class="card panel-order">
            <div class="card-header">
                <strong>DANH SÁCH ĐƠN HÀNG</strong>
                <div class="btn-group float-right">
                    <div class="btn-group">
                        <form action="myOrderFilter.php" method="GET">
                            <select name="status" onchange="this.form.submit()">
                                <option value="">Tất cả</option>
                                <option value="0">Chờ xử lý</option>
                                <option value="1">Chờ giao hàng
                                </option>
                                <option value="5">Giao hàng thành công
                                </option>
                                <option value="6">Đã hủy</option>
                            </select>
                        </form>
                    </div>
                </div>

                <div class="card-body">
                    <?php
                    $i = 1;
                    // echo $_SESSION['id_User'];
                    // var_dump($data['orders']);
                    // exit;
                    if ($data['orders'] != null) {

                        foreach ($data['orders'] as $order): ?>
                            <?php
                            // var_dump($order['name']);
                            // exit;
                            ?>
                            <div class="row">
                                <div class="col-md-1">
                                    <label class="media-object img-thumbnail"><?= $i ?></label>
                                    <?php $i++; ?>
                                </div>
                                <div class="col-md-11">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="float-right">
                                                <?php switch ($order['status']):
                                                    case 0: ?>
                                                        <span class="badge badge-info badge-pill">Chờ xử lý</span>
                                                    <?php break;
                                                    case 1: ?>
                                                        <span class="badge badge-success badge-pill">Đã xác nhận</span>
                                                    <?php break;
                                                    case 2: ?>
                                                        <span class="badge badge-success badge-pill">Đang xử lý</span>
                                                    <?php break;
                                                    case 3: ?>
                                                        <span class="badge badge-success badge-pill">Đã xuất kho</span>
                                                    <?php break;
                                                    case 4: ?>
                                                        <span class="badge badge-success badge-pill">Đang giao hàng</span>
                                                    <?php break;
                                                    case 5: ?>
                                                        <span class="badge badge-success badge-pill">Giao hàng thành công</span>
                                                    <?php break;
                                                    case 6: ?>
                                                        <span class="badge badge-danger badge-pill">Đã hủy</span>
                                                <?php break;
                                                endswitch; ?>
                                            </div>

                                            <?php foreach ($data['orderProducts'] as $orderProduct):
                                                if ($order['id'] == $orderProduct['order_id']): ?>
                                                    <span><strong>Mã đơn hàng: </strong></span>
                                                    <span class="badge badge-primary badge-pill"><?= $order['id'] ?></span><br />
                                                    Số loại sản phẩm : <?= $orderProduct['total_quantity'] ?>, Tổng tiền: <?= $orderProduct['total_price'] ?> đ<br />
                                            <?php endif;
                                            endforeach; ?>

                                            <a data-placement="top" class="btn btn-info btn-sm" href="/CHVanPhongPham/CheckoutController/orderDetail/<?php echo $order['id'] ?>" title="Chi tiết đơn hàng">
                                                <i class="fas fa-info-circle"></i>
                                            </a>

                                            <?php if ($order['status'] >= 0 && $order['status'] <= 2): ?>
                                                <form action="/CHVanPhongPham/CheckoutController/cancelOrder/<?php echo $order['id'] ?>" method="POST" class="d-inline">
                                                    <button type="submit" class="btn btn-danger btn-sm" data-placement="top" title="Hủy đơn hàng">
                                                        <i class="fas fa-ban"></i>
                                                    </button>
                                                </form>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-12 custom-col-md-12">Thời gian đặt hàng: <?= date('d/m/Y H:i:s', strtotime($order['created_at'])) ?></div>
                                    </div>
                                </div>
                            </div>
                    <?php endforeach;
                    } ?>
                </div>
                <div class="card-footer">Hãy <a href="">liên hệ</a> ngay với chúng tôi khi bạn cần giúp đỡ!</div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>

</html>