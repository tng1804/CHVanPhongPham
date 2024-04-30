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
                    <div class="col-sm-2">
                    <a class='btn btn-add btn-sm' href='HoaDon/SearchHD' title='Tìm'><i class='fas fa-plus'></i>
                            Tìm kiếm </a>
                            <br>
                            <br>
                            <a class='btn btn-add btn-sm' href='HoaDon/sapxepHD' title='sap xep'><i class='fas fa-plus'></i>
                            Sắp Xếp </a>
                            </div>
                            
                        
                              </div>
                              <div class="from-group col-md-3"> 
                             
                                  </div>    
                         
                           
                            </div>
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
                                    echo "<td>".$row["session_idA"]."</td>";
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
<script type ="text/javascript">
// let selectedRow;

// document.addEventListener("DOMContentLoaded", function() {
//     const rows = document.querySelectorAll("#customers tbody tr");

//     rows.forEach(function(row) {
//         row.addEventListener("click", function() {
//             // Xóa lớp "selected" khỏi tất cả các hàng
//             rows.forEach(function(row) {
//                 row.classList.remove("selected");
//             });

//             // Thêm lớp "selected" vào hàng được nhấp
//             this.classList.add("selected");

//             // Lưu trữ hàng được chọn vào biến global
//             selectedRow = this;
//         });
//     });
// });

// function xuatexcel() {
//     if (!selectedRow) {
//         console.log("Không có hàng nào được chọn.");
//         return;
//     }

//     // Lấy chỉ số (index) của hàng được chọn
//     const rowIndex = Array.from(selectedRow.parentNode.children).indexOf(selectedRow);

//     // Prompt để nhập tên tệp và xuất Excel
//     var name = prompt("Nhập tên file của bạn", "Tên");
//     exportSelectedRow(name, '.xlsx', rowIndex);
// }

// function exportSelectedRow(name, type, rowIndex) {
//     const fileName = name + type;
//     const originalTable = document.getElementById("customers");

//     // Tạo một bản sao của bảng
//     const clonedTable = originalTable.cloneNode(true);

//     // Lấy danh sách các hàng
//     const rows = clonedTable.getElementsByTagName('tr');

//     // Tạo một mảng để lưu trữ các hàng không được chọn
//     const rowsToDelete = [];

//     // Lặp qua các hàng và thêm các hàng không được chọn vào mảng rowsToDelete
//     for (let i = rows.length - 1; i >= 0; i--) {
//         if (i !== rowIndex) {
//             rowsToDelete.push(rows[i]);
//         }
//     }

//     // Xóa các hàng không được chọn từ bảng sao
//     rowsToDelete.forEach(row => row.parentNode.removeChild(row));

//     // Kiểm tra xem có dữ liệu nào tồn tại trong bảng sao
//     if (clonedTable.getElementsByTagName('tr').length === 0) {
//         console.error("Không có dữ liệu nào để xuất.");
//         return;
//     }

//     // Chuyển đổi bảng sao thành file Excel
//     const wb = XLSX.utils.table_to_book(clonedTable);
//     XLSX.writeFile(wb, fileName);
// }
let selectedRow;

document.addEventListener("DOMContentLoaded", function() {
    const rows = document.querySelectorAll("#customers tr");

    rows.forEach(function(row) {
        row.addEventListener("click", function() {
            // Xóa lớp "selected" khỏi tất cả các hàng
            rows.forEach(function(row) {
                row.classList.remove("selected");
            });

            // Thêm lớp "selected" vào hàng được nhấp
            this.classList.add("selected");

            // Lưu trữ hàng được chọn vào biến global
            selectedRow = this;
        });
    });
});

function xuatexcel() {
    if (!selectedRow) {
        console.log("Không có hàng nào được chọn.");
        return;
    }

    // Lấy giá trị của ô ID trong hàng được chọn
    const id = selectedRow.cells[0].innerText;
    console.log("Người dùng đã chọn hàng có ID là:", id);

    // Prompt để nhập tên tệp và xuất Excel
    var name = prompt("Nhập tên file của bạn", "Tên");
    exportSelectedRow(name, '.xlsx', selectedRow);
}

function exportSelectedRow(name, type, selectedRow) {
    const fileName = name + type;

    // Tạo một bảng trống
    const newTable = document.createElement('table');
    newTable.classList.add("customers");

    // Tạo một hàng mới cho bảng
    const newRow = document.createElement('tr');

    // Lặp qua các ô trong hàng được chọn
    const cells = selectedRow.cells;
    for (let i = 0; i < cells.length - 1; i++) { // Bỏ qua cột cuối cùng
        const newCell = document.createElement('td');
        newCell.innerText = cells[i].innerText;
        newRow.appendChild(newCell);
    }

    // Thêm hàng mới vào bảng
    newTable.appendChild(newRow);

    // Chuyển đổi bảng mới thành file Excel
    const wb = XLSX.utils.table_to_book(newTable);
    XLSX.writeFile(wb, fileName);
}
</script>
<script src="./lib/js/sheet.js"></script>
</body>
</html>