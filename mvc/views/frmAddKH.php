<?php
include "header.php";
include "Left_side.php";
?>

<main class="app-content">
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="title-h3">Thêm khách hàng</h3>
                <div class="tile-body">
                    <div class="admin-content-right">
                        <form method="POST">
                            <div class="product-add-content git">
                                <div class="form-group col-md-3">
                                    <label class="control-label" for="">Tên khách hàng<span style="color: red;">*</span></label> 
                                    <input class="form-control" required type="text" name="tenKH"> 
                                </div>

                                <div class="form-group col-md-3">
                                    <label class="control-label" for="">Địa chỉ<span style="color: red;">*</span></label>
                                    <input class="form-control" required type="text" name="diaChi"> 
                                </div>
                                
                                <div class="form-group col-md-3">
                                    <label class="control-label" for="">Số điện thoại<span style="color: red;">*</span></label>
                                    <input class="form-control" required type="text" name="sDT"> 
                                </div>

                                <div class="form-group col-md-3">
                                    <label class="control-label" for="">Email<span style="color: red;">*</span></label>
                                    <input class="form-control" required type="email" name="email"> 
                                </div>
                            </div>
                            
                            <div>
                                <button type="submit" id="btnGhi" name="btnGhi">Ghi dữ liệu</button>
                                <button class="button-container" type="button" id="btnBack"><a href="listKH">Quay lại</a></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

</body>
</html>
