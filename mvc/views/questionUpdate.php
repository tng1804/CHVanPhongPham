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
if (mysqli_num_rows($data["GetQT"]) > 0) {
    while ($row = mysqli_fetch_assoc($data["GetQT"])) {
        $cauhoi = $row['cauhoi'];
        $traloi = $row['traloi'];
    }
}
?>

<!-- ================= Câu hỏi ======================== -->
<main class="app-content">
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="title-h3">Sửa thông tin câu hỏi</h3>
                <div class="tile-body">

                    <div class="admin-content-right">

                        <form action="" method="POST">
                            <!-- Sanphamadd.php readonly-->
                            <div class="product-add-content git">
                                <div class="from-group col-md-3">
                                    <label class="control-label" for="">Câu hỏi<span style="color: red;">*</span></label> <br>
                                    <input class="form-control" value="<?php echo $cauhoi ?>" required type="text" name="txt_cauhoi"> <br>
                                </div>
                                <div class="from-group col-md-3">
                                    <label class="control-label" for="">Trả lời<span style="color: red;">*</span></label> <br>
                                    <input class="form-control" value="<?php echo $traloi ?>" required type="text" name="txt_traloi"> <br>
                                </div>
                            </div>
                            <button class="btn btn-save admin-btn" name="submit" type="submit">Sửa</button>
                            <a href="/VANPHONGPHAM/Question/listQT" class="btn btn-cancel">Hủy bỏ</a>
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