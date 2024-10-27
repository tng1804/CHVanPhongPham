<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" -->
<link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/NT.png') }}" />
<link rel="stylesheet" href="http://localhost/CHVanPhongPham/public/css/order_detail.css">
<div id="top" style="margin-top: 90px; margin-bottom: 70px"></div>
<div class="container-fluid">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center py-3">
            <h2 class="h5 mb-0"><a href="#" class="text-muted"></a> Chi tiết đơn hàng: # <?php echo $data['orders']['id'] ?></h2>
        </div>

        <div class="row">
            <div class="col-lg-8">

                <div class="card mb-4">
                    <div class="card-body">
                        <div class="mb-3 d-flex justify-content-between">
                            <div>
                                <span class="me-3"><?php
                                                    // Chuyển đổi chuỗi thành đối tượng DateTime
                                                    $date = new DateTime($data['orders']['created_at']);

                                                    // Định dạng lại ngày giờ
                                                    echo $date->format('d/m/Y H:i:s');
                                                    ?></span>
                                <span class="me-3">#<?php echo $data['orders']['id']; ?></span>
                                <span class="me-3"><?php echo $data['orders']['name']; ?></span>

                                <?php
                                $status = (int)$data['orders']['status'];
                                switch ($status) {
                                    case 0:
                                        echo '<span class="badge bg-info rounded-pill">Chờ xử lý</span>';
                                        break;

                                    case 1:
                                        echo '<span class="badge bg-success rounded-pill">Đã xác nhận</span>';
                                        break;

                                    case 2:
                                        echo '<span class="badge bg-success rounded-pill">Đang xử lý</span>';
                                        break;

                                    case 3:
                                        echo '<span class="badge bg-success rounded-pill">Đã xuất kho</span>';
                                        break;

                                    case 4:
                                        echo '<span class="badge bg-success rounded-pill">Đang giao hàng</span>';
                                        break;

                                    case 5:
                                        echo '<span class="badge bg-success rounded-pill">Giao hàng thành công</span>';
                                        break;

                                    case 6:
                                        echo '<span class="badge bg-danger rounded-pill">Đã hủy</span>';
                                        break;

                                    default:
                                        echo '<span class="badge bg-secondary rounded-pill">Không rõ trạng thái</span>';
                                        break;
                                }
                                ?>

                            </div>

                        </div>
                        <table class="table table-borderless">
                            <tbody>
                                <?php foreach ($data['orderProducts'] as $item): ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex mb-2">
                                                <div class="flex-shrink-0">
                                                    <img src="http://localhost/CHVanPhongPham/public/image/<?php echo $item['anhsp']; ?>" alt
                                                        width="50" class="img-fluid">
                                                </div>
                                                <div class="flex-lg-grow-1 ms-3">
                                                    <h6 class="small mb-0">
                                                        <a href="#" class="text-reset"><?php echo $item['tensp']; ?></a>
                                                    </h6>
                                                    <!-- <span class="small">Màu: Black</span> -->
                                                </div>
                                            </div>
                                        </td>
                                        <td>x <?php echo $item['quantity']; ?></td>
                                        <td class="text-end"><?php echo number_format($item['price'], 0, ',', '.'); ?> đ</td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>


                            <tfoot>
                                <tr>
                                    <td colspan="2">Tổng tiền hàng</td>
                                    <td class="text-end"><?php echo $data['totalPrice'] ?> đ</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Tổng tiền phí vận chuyển</td>
                                    <td class="text-end">0 đ</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Giảm giá (Code: NEWYEAR)</td>
                                    <td class="text-danger text-end">- 0 đ</td>
                                </tr>
                                <tr class="fw-bold">
                                    <td colspan="2">TỔNG THANH TOÁN</td>
                                    <td class="text-end"><?php echo $data['totalPrice'] ?> đ</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3 class="h6">Hình thức thanh toán</h3>
                                <p>Thanh toán khi nhận hàng<br>
                                    Tổng thanh toán: <?php echo $data['totalPrice'] ?> đ <span class="badge bg-success rounded-pill">
                                        <?php 
                                            // var_dump($data['payment']);
                                            // exit;
                                            if($data['payment']['status'] == 0){
                                                echo "Chưa thanh toán";
                                            }
                                            elseif($data['payment']['status'] == 1){
                                                echo "Đã thanh toán";
                                            }
                                        ?>
                                    </span></p>
                            </div>
                            <div class="col-lg-6">
                                <h3 class="h6">Địa chỉ nhận hàng</h3>
                                <address>
                                    <strong><?php echo $data['orders']['name']; ?></strong><br> <?php echo $data['orders']['address']; ?>
                                    <br>
                                    <abbr title="Phone">Số điện thoại:</abbr> <?php echo $data['orders']['phone']; ?>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">

                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="h6">Ghi chú khách hàng</h3>
                        <p>Tôi có thể nhận vào khoảng 2h->4h chiều.</p>
                    </div>
                </div>
                <div class="card mb-4">

                    <div class="card-body">
                        <h3 class="h6">Thông tin vận chuyển</h3>
                        <strong>Mã vận chuyển</strong>
                        <span><a href="#" class="text-decoration-underline" target="_blank">FF1234567890</a> <i
                                class="bi bi-box-arrow-up-right"></i> </span>
                        <hr>
                        <h3 class="h6">Địa chỉ</h3>
                        <address>
                            <strong><?php echo $data['orders']['name']; ?></strong><br>
                            <?php echo $data['orders']['address']; ?><br>
                            <abbr title="Phone">Số điện thoại:</abbr> <?php echo $data['orders']['phone']; ?>
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript"></script>