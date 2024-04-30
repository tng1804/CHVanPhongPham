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
                          <a class='btn btn-add btn-sm' href='TaiKhoan/addTK' title='Thêm'><i class='fas fa-plus'></i>
                            Thêm Tài khoản</a>
                            <br>
                            <br>
                            <a class='btn btn-add btn-sm' href='TaiKhoan/SearchTK' title='Tìm'><i class='fas fa-plus'></i>
                            Tìm kiếm </a>
                            <br>
                            <br>
                            <a class='btn btn-add btn-sm' onclick = "xuatexcel()" title='Xuat_excel'><i class='fas fa-plus'></i>
                            Xuất Excel </a>
                            <br>
                            <br>
                            <a class='btn btn-add btn-sm' href='TaiKhoan/sapxepTK' title='Tìm'><i class='fas fa-plus'></i>
                            Sắp xếp </a>
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
<script type="text/javascript">
      
//       function xuatexcel() {
//     var name = prompt("Nhập tên file của bạn", "Tên");
//     exportData(name, '.xlsx');
// }

// function exportData(name, type) {
//     const fileName = name + type;
//     const originalTable = document.getElementById("customers");

//     // Tạo một bản sao của bảng
//     const clonedTable = originalTable.cloneNode(true);

//     // Lặp qua từng hàng của bảng sao và loại bỏ cột cuối cùng
//     const rows = clonedTable.getElementsByTagName('tr');
//     for (let i = 0; i < rows.length; i++) {
//         const cells = rows[i].getElementsByTagName('td');
//         // Xóa phần tử cuối cùng trong mỗi hàng
//         if (cells.length > 0) {
//             rows[i].removeChild(cells[cells.length - 1]);
//         }
//     }

//     // Chuyển đổi bảng sao thành file Excel
//     const wb = XLSX.utils.table_to_book(clonedTable);
//     XLSX.writeFile(wb, fileName);
// }

function xuatexcel() {
    var name = prompt("Nhập tên file của bạn", "Tên");
    exportData(name, '.xlsx');
}

function exportData(name, type) {
    const fileName = name + type;
    const originalTable = document.getElementById("customers");

    // Tạo một bản sao của bảng
    const clonedTable = originalTable.cloneNode(true);

    // Lặp qua từng hàng của bảng sao và loại bỏ cột cuối cùng
    const rows = clonedTable.getElementsByTagName('tr');
    for (let i = 0; i < rows.length; i++) {
        const cells = rows[i].getElementsByTagName('td');
        // Xóa phần tử cuối cùng trong mỗi hàng (cột "Tùy chỉnh")
        if (cells.length > 0) {
            const lastCellIndex = cells.length - 1;
            rows[i].deleteCell(lastCellIndex);
        }
    }

    // Chuyển đổi bảng sao thành file Excel
    const wb = XLSX.utils.table_to_book(clonedTable);
    XLSX.writeFile(wb, fileName);
}


   
</script>
<script src="./lib/js/sheet.js"></script>
</main>
</body>
</html>