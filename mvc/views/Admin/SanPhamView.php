<?php
include(__DIR__ . '/../../views/header.php');
include(__DIR__ . '/../../views/Left_side.php');
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
                        <th> Loại sản phẩm</th>
                        <th>Giá tiền</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Chi tiết sản phẩm</th>
                         <th> Nhà cung Cấp </th>
                        <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>";
                    
                        while($row = mysqli_fetch_assoc($data["SP"])){
                            {                                
                            echo "<tr>";                                
                            echo "<td> " .$row["id_sanpham"]. "</td>";
                            echo "<td> " .$row["tensp"]. "</td>";
                            echo "<td> " .$row["loaisp_id"]. "</td>";
                            echo "<td> " .$row["giasp"]. "</td>";
                            echo "<td>  <img src='/CHVanPhongPham/public/uploads/" . $row["anhsp"] ."' alt='' width='100px;'></td>";
                            echo "<td> " .$row["soluong"]. "</td>";
                            echo "<td> " .$row["chitiet_sp"]. "</td>";
                            echo "<td>" .$row["id_NCC"]. " </td>";
                           
                            echo "<td>
                            <a href='/CHVanPhongPham/SanPham/Delete/".$row["id_sanpham"]."' class='btn btn-delete' type='button' title='Xóa'>Xóa</a>
                            
                              <a href='/CHVanPhongPham/SanPham/Edit/".$row["id_sanpham"]."' class='btn btn-edit' type='button'  title='Sửa'>Sửa</a>     
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
    <!-- <button>
        <a href = '/CHVanPhongPham/SanPham/Add'> Thêm Sản Phẩm </a>                
    </button> -->

    <button>
        <a href = '/CHVanPhongPham/SanPham/Search'> Tìm Kiếm</a>                
    </button>

    <button>
        <a href = '/CHVanPhongPham/SanPham/Sort'> Sắp Xếp</a>                
    </button>

    <a class='btn btn-add btn-sm' onclick = "xuatexcel()" title='Xuat_excel'><i class='fas fa-plus'></i>
     Xuất Excel </a>     
          
     
    
    </div>
    </div>
    </div>
    </div>
</body>
</html>
<!-- Sử dụng CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script type="text/javascript">
      
      function xuatexcel() {
    var name = prompt("Nhập tên file của bạn", "Tên");
    exportData(name, '.xlsx');
}

function exportData(name, type) {
    // Tạo bản sao của bảng để thao tác xuất mà không thay đổi bảng gốc
    const table = document.getElementById("customers");
    const tableClone = table.cloneNode(true);

    // Duyệt qua các hàng trong bảng sao chép
    const rows = tableClone.getElementsByTagName("tr");
    for (let i = 0; i < rows.length; i++) {
        const row = rows[i];
        const cells = row.cells;

        // Xử lý từng ô trong hàng
        for (let j = 0; j < cells.length; j++) {
            // Nếu là ô chứa hình ảnh (cột ảnh sản phẩm, giả sử là cột thứ 5)
            if (j === 4) {  // Cột 5 có chỉ số là 4
                const img = cells[j].getElementsByTagName("img")[0];
                if (img) {
                    const imageUrl = img.src;
                    cells[j].innerText = imageUrl; // Thay thế nội dung ô bằng URL của ảnh
                }
            }
        }

        // Loại bỏ cột chức năng (cột cuối cùng)
        if (row.cells.length > 0) {
            row.deleteCell(row.cells.length - 1); // Loại bỏ ô cuối cùng
        }
    }

    // Xuất bảng từ bản sao sang Excel
    const fileName = name + type;
    const wb = XLSX.utils.table_to_book(tableClone);
    XLSX.writeFile(wb, fileName);
}


    </script>

<script src="/CHVanPhongPham/lib/js/sheet.js"></script>
</body>
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
        #customers {
    width: 100%;
    border-collapse: collapse;
}
#customers th, #customers td {
    width: auto; /* Điều chỉnh tự động dựa trên nội dung */
    padding: 10px; /* Khoảng cách giữa nội dung và viền */
    text-align: center; /* Canh giữa nội dung */
}

/* Đảm bảo tất cả các tiêu đề và nội dung cột có kích thước phù hợp */
#customers th:nth-child(1), #customers td:nth-child(1) { width: 5%; }   /* ID sản phẩm */
#customers th:nth-child(2), #customers td:nth-child(2) { width: 7%; }   /* Tên sản phẩm */
#customers th:nth-child(3), #customers td:nth-child(3) { width: 5%; }   /* ID Loại sản phẩm */
#customers th:nth-child(4), #customers td:nth-child(4) { width: 10%; }  /* Giá tiền */
#customers th:nth-child(5), #customers td:nth-child(5) { width: 20%; }   /* Giảm giá */
#customers th:nth-child(6), #customers td:nth-child(6) { width: 7%; }  /* Ảnh sản phẩm */
#customers th:nth-child(7), #customers td:nth-child(7) { width: 20%; }   /* Số lượng */
#customers th:nth-child(8), #customers td:nth-child(8) { width: 7%; }  /* Chi tiết sản phẩm */
#customers th:nth-child(9), #customers td:nth-child(9) { width: 20%; }   /* Tình trạng */


/* Thêm các thiết lập tương tự cho các cột khác nếu cần thiết */

#customers tbody {
    display: block;
    max-height: 400px; /* Chiều cao tối đa của bảng */
    overflow-y: auto;  /* Tạo thanh cuộn dọc */
    overflow-x: hidden;
}

#customers thead, #customers tbody tr {
    display: table;
    width: 100%;
    table-layout: fixed; 
}

#customers th, #customers td {
    padding: 4px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

       
#customers td:last-child {
    text-align: center;
    white-space: nowrap;
    max-width: 200px; /* Đảm bảo chiều rộng phù hợp */
}

#customers td:last-child a {
    display: inline-block;
    width: auto; /* Đảm bảo button có kích thước linh hoạt */
    margin: 0 5px;
    vertical-align: middle;
}
 
      
    </style>