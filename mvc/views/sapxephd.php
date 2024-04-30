<?php
include "header.php";
include "Left_side.php";
?>
      <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="qlyhoadon.php"><b>Quản lý Hóa Đơn</b></a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body" >
                    <!-- <div class="col-sm-2">
                            </div>
                              </div>
                              <div class="from-group col-md-3"> 
                             
                                  </div>    
                         
                           
                            </div> -->
                        </div>
                    <!-- </div>
                    <div> -->
                            <?php
                               if(mysqli_num_rows($data["HD"])>0)
                           {
                            echo"<table id='customers'>
                            <tr>
                              <th>STT</th>
                              <th>ID hóa đơn</th>
                              <th>Mã Khách Hàng</th>
                              <th>Thành tiền</th>
                              <th>Thời gian</th>
                              <th> chức năng</th>
                            </tr>";

                                $count = 0;
                                while( $row = mysqli_fetch_assoc($data["HD"]))
                                {
                                    $count++;
                                    echo "<br> <tr>";
                                    echo "<td>".$count."</td>";
                                    echo "<td>".$row["id_hoadon"]."</td>";
                                    echo "<td>".$row["id_khachhang"]."</td>";
                                    echo"<td>".$row["tongtien"]."</td>";
                                    echo"<td>".$row["date_thongke"]."</td>";
                                    echo "<td> <a href='HoaDon/editHD/".$row["id_hoadon"]."'class='btn btn-edit' type='button' title='Sửa'> <i class='fas fa-edit'></i> 
                                     </a>
                                    <a href='HoaDon/deleteHD/".$row["id_hoadon"]."'
                                   onclick = \" javascript: return confirm('ban chac chan muon xoa') \" class='btn btn-delete' type='button' title='xóa'> <i class='fas fa-trash-alt'></i> </a> 
                                   <a onclick='xuatexcel()' class='btn' type='button' title='Xuất'> Xuất <i class=''></i> 
                                     </a>
                                   </td>
                                   
                                   ";
                                }

                           }
                       // }
                      
                            ?>
                            </table>
</div>
</div>
</div>
</div>

</body>
</html>