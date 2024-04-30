<?php
include "header.php";
include "Left_side.php";
?>
 <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="TaiKhoanfrm.php"><b>Quản lý Tài Khoản</b></a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body" >
                    <div class="col-sm-2">
                    </div>
                    <div class='row element-button'>
                        <div class='col-sm-2'>
                          
                        </div>
                    
                      </div>
    <?php
    if(mysqli_num_rows($data["TK"])>0){
        
                
                echo "<p>File QUẢN LÍ TÀI KHOẢN</p>";
                echo"<table id='customers'>";
                    echo "<thead>";
                        echo "<tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Quyền</th>
                            <th>Tùy chỉnh</th>
                            
                        </tr>
                    </thead>
                    <tbody>";
                        while($row = mysqli_fetch_assoc($data["TK"])){
                          
                            echo "<tr>"; 
                                
                                echo "<td>" . $row["id_taikhoan"] . "</td>";
                                echo "<td>" . $row["ten"] . "</td>";
                                echo "<td>" . $row["email"] . "</td>";
                                echo "<td>" . $row["pass"] . "</td>";
                                echo "<td>" . $row["sdt"] . "</td>";
                                echo "<td>" . $row["diachi"] . "</td>";
                                echo "<td>" . $row["quyen"] . "</td>";
                            echo "<td> <a href='TaiKhoan/editTK/".$row["id_taikhoan"]."'class='btn btn-edit' type='button' title='Sửa'> 
                            <i class='fas fa-trash-alt'></i> </a>
                            <a href='TaiKhoan/deleteTK/".$row["id_taikhoan"]."'
                           onclick = \" javascript: return confirm('ban chac chan muon xoa') \" class='btn btn-delete' type='button' title='Xóa'>xóa</a> </td>
                           ";
                           
                           echo"</tr>";
                        }
                    echo "</tbody>";
                    echo "</table>"; 
                    
                    
        }
        else{
            echo "Khong co ban ghi";
        }
    
?> 
</div>
    
    </div>
</div>
</div>

</div>
</main>
</body>
</html>