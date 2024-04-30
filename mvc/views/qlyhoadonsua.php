<?php
include "header.php";
include "Left_side.php";
?>
<?php
    $session_idA  ="";
    $thanhtien = "";
    $thoigian = "";
   if(mysqli_num_rows($data["HD"])>0)
{
    while($row = mysqli_fetch_assoc($data["HD"])){
   
    $session_idA = $row['session_idA'];
    $thanhtien = $row['tongtien'];
    $thoigian = $row['date_thongke'];
    }
}
else{
    echo "<script type ='text/javascript'> alert('không có dữ liệu')
    window.location.href('qlyhoadon.php');
    </script>";
}
?>
      <main class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                   <h3 class="title-h3">Sửa loại sản phẩm</h3>
                    <div class="tile-body">
                          <div class="admin-content-right">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="product-add-content git">
                                    
                                    <div class="from-group col-md-3">
                                    <label class="control-label" for="">Session_ID<span style="color: red;">*</span></label> <br>
                                    <input class="form-control"  type="text" step="any" readonly value="<?php echo $session_idA ?>" name="txttongtien"> <br>
                                  
                                      
                                      </div>
                                    <div class="from-group col-md-3">
                                      <label class="control-label" for="">Thành tiền<span style="color: red;">*</span></label> <br>
                                      <input class="form-control" readonly type="number" step="any" value="<?php echo $thanhtien ?>" name="txttongtien"> <br>
                                    </div>
                                    <div class="from-group col-md-3">
                                      <label class="control-label" for="">Thời gian <span style="color: red;">*</span></label> <br>
                                      <input class="form-control"  type="date" value="<?php echo $thoigian ?>" name="txtthoigian"> <br>
                                    </div>
                                    <div class="from-group col-12">
                                    <button class="btn btn-save admin-btn" name="btn_luuHDedit" type="submit">Lưu</button>  
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