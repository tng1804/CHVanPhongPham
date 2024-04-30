<?php
include "header.php";
include "Left_side.php";
// include './Config/connect.php';
$id_khachhang = "";
$ten = "";
$diachi = "";
$sdt = "";
$email = "";
// print_r $data["GetKH"];
if (mysqli_num_rows($data["GetKH"]) > 0) {
    while ($row = mysqli_fetch_assoc($data["GetKH"])) {
        $ten = $row['ten'];
        $diachi = $row['diachi'];
        $sdt = $row['sdt'];
        $email = $row['email'];
    }
}
?>

<!-- ================= Khách hàng ======================== -->
<main class="app-content">
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="title-h3">Sửa thông tin khách hàng</h3>
                <div class="tile-body">

                    <div class="admin-content-right">

                        <form action="" method="POST">
                            <!-- Sanphamadd.php readonly-->
                            <div class="product-add-content git">
                                <div class="from-group col-md-3">
                                    <label class="control-label" for="">Tên khách hàng<span style="color: red;">*</span></label> <br>
                                    <input class="form-control" value="<?php echo $ten ?>" required type="text" name="txt_ten"> <br>
                                </div>
                                <div class="from-group col-md-3">
                                    <label class="control-label" for="">Địa chỉ<span style="color: red;">*</span></label> <br>
                                    <input class="form-control" value="<?php echo $diachi ?>" required type="text" name="txt_diachi"> <br>
                                </div>
                                <div class="from-group col-md-3">
                                    <label class="control-label" for="">Số điện thoại<span style="color: red;">*</span></label> <br>
                                    <input class="form-control" value="<?php echo $sdt ?>" required type="text" name="txt_sdt"> <br>
                                </div>
                                <div class="from-group col-md-3">
                                    <label class="control-label" for="">Email<span style="color: red;">*</span></label> <br>
                                    <input class="form-control" value="<?php echo $email ?>" required type="text" name="txt_email"> <br>4

                                </div>

                            </div>
                            <button class="btn btn-save admin-btn" name="submit" type="submit">Sửa</button>
                            <a href="/VANPHONGPHAM/KhachHang/listKH" class="btn btn-cancel">Hủy bỏ</a>
                        </form>

                    </div>

                    <?php
                    ?>
                </div>
            </div>
        </div>
    </div>
</main>
</body>

</html>