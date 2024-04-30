<?php
include "header.php";
include "Left_side.php";
?>

 <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="frmThongTinSP.php"><b>Thông tin sản phẩm</b></a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body" >
                    <div class="col-sm-2">
                    </div>
    <?php

        if(mysqli_num_rows($data["SP"])>0){
                
                echo "<p>THÔNG TIN SẢN PHẨM</p>";
                echo"<table id='customers'>";
                    echo "<thead>";
                        echo "<tr>
                        <th>ID sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>ID Loại sản phẩm</th>
                        <th>Giá tiền</th>
                        <th>Giảm giá</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Chi tiết sản phẩm</th>
                        <th>Tình trạng</th>
                        <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>";
                    
                        while($row = mysqli_fetch_assoc($data["SP"])){
                            {                                
                            echo "<tr>";                                
                            echo "<td> " .$row["id_sanpham"]. "</td>";
                            echo "<td> " .$row["tensp"]. "</td>";
                            //echo "<td> " .$row['danhmuc_id']. "</td>";
                            echo "<td> " .$row['loaisp_id']. "</td>";
                            echo "<td> " .$row["giasp"]. "</td>";
                            echo "<td> " .$row["khuyenmai"]. "</td>";
                            echo "<td>  <img src='/VanPhongPham/public/uploads/" . $row["anhsp"] ."' alt='' width='100px;'></td>";
                            echo "<td> " .$row["soluong"]. "</td>";
                            echo "<td> " .$row["chitiet_sp"]. "</td>";
                            if($row["tinhtrang"]==0){
                                echo "<td>Hết hàng</td>";
                             }else{
                                echo "<td>Còn hàng</td>";
                             }  
                
                            echo "<td>
                            <a href='Delete/".$row["id_sanpham"]."' class='btn btn-delete' type='button' title='Xóa'>Xóa</a>
                            
                              <a href='Edit/".$row["id_sanpham"]."' class='btn btn-edit' type='button'  title='Sửa'>Sửa</a>     
                            </td>";
                            
                            echo"</tr>";                     
                        }
                    }
                    echo "</tbody>";
                    echo "</table>"; 
                    
                    
        }
        else{
            echo "Khong co ban ghi";
        }   
?> 
</div>
    <button>
        <a href = 'Add'> Thêm Sản Phẩm </a>                
    </button>

    <button>
        <a href = 'Search'> Tìm Kiếm</a>                
    </button>

    <a class='btn btn-add btn-sm' onclick = "xuatexcel()" title='Xuat_excel'><i class='fas fa-plus'></i>
     Xuất Excel </a>     
        
     <button>
        <a href = 'Show'> Quay trở về</a>                
    </button>
    
    </div>
    </div>
    </div>
    </div>
</body>
</html>
<!-- Sử dụng CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script type="text/javascript">
      
      function xuatexcel(){
        var name = prompt("Nhập tên file của bạn", "Tên");
         exportData(name,'.xlsx');
    
      }
      function exportData(name, type) {
    // Lấy bảng customers
    const table = document.getElementById("sanpham");

    // Lấy danh sách các dòng và các trường trong bảng
    const rows = table.getElementsByTagName("tr");

    // Khởi tạo một mảng chứa dữ liệu của các dòng trong bảng
    const data = [];

    // Duyệt qua từng dòng trong bảng và lấy giá trị của từng ô
    for (let i = 0; i < rows.length; i++) {
        const cells = rows[i].getElementsByTagName("td");
        if (cells.length > 0) {
            const rowData = [];
            for (let j = 0; j < cells.length - 1; j++) { // Loại bỏ cột cuối cùng
                // Nếu ô chứa ảnh thì lấy đường dẫn của ảnh
                if (j === 5) {
                    const imageUrl = cells[j].getElementsByTagName("img")[0].src;
                    rowData.push(imageUrl);
                } else {
                    // Nếu không, lấy giá trị của ô
                    rowData.push(cells[j].innerText);
                }
            }
            // Thêm dữ liệu của dòng vào mảng data
            data.push(rowData);
        }
    }

    // Tạo workbook và sheet từ dữ liệu
    const wb = XLSX.utils.book_new();
    const ws = XLSX.utils.aoa_to_sheet(data);
    XLSX.utils.book_append_sheet(wb, ws, "Products");

    // Lưu tệp Excel
    const fileName = name + type;
    XLSX.writeFile(wb, fileName);
}

    </script>

<script src="mvc_quynh_btl/lib/js/sheet.js"></script>
<style>


        /* Kiểu cho các nút hành động */
        .btn {
            padding: 8px 12px;
            margin-right: 5px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-edit {
            background-color: #007bff;
            color: white;
        }

        .btn-edit:hover {
            background-color: #0056b3;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        /* Kiểu cho nút thêm nhân viên */
        button a {
            color: white;
            text-decoration: none;
        }

        button {
            display: inline-block;
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-weight: bold;
            margin-top: 20px;
        }

        button:hover {
            background-color: #218838;
        }

       
      
    </style>