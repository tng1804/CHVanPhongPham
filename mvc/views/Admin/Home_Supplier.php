
<?php
include(__DIR__ . '/../../views/header.php');
include(__DIR__ . '/../../views/Left_side.php');
?>

 <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="Home_Supplier.php"><b>Thông tin Nhà cung cấp</b></a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                    <div class="col-sm-2">
                    </div>
    <?php

        if(mysqli_num_rows($data["SPL"])>0){
                
                echo "<p>THÔNG TIN NHÀ CUNG CẤP</p>";
                echo"<table id='employee'>";
                    echo "<thead>";
                        echo "<tr>
                        <th>ID nhà cung cấp</th>
                        <th>Tên nhà cung cấp</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Mã số thuế</th>
                        <th>Trạng thái</th>
                        <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>";
                    
                        while($row = mysqli_fetch_assoc($data["SPL"])){
                            {                                
                            echo "<tr>";                                
                            echo "<td> " .$row["idNCC"]. "</td>";
                            echo "<td> " .$row['tenNCC']. "</td>";
                            echo "<td> " .$row['diachi']. "</td>";
                            echo "<td> " .$row["sdt"]. "</td>";
                            echo "<td> " .$row["masothue"]. "</td>";
                            echo "<td> " .$row["trangthai"]. "</td>";
                            echo "<td>
                            <a href='Delete/".$row["idNCC"]."' class='btn btn-delete' type='button' title='Xóa'>Xóa</a>
                            
                              <a href='Edit/".$row["idNCC"]."' class='btn btn-edit' type='button'  title='Sửa'>Sửa</a>     
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
        <a href = '/CHVanPhongPham/Supplier/Add'> Thêm Nhà Cung Cấp </a>                
    </button>

    <button>
        <a href = '/CHVanPhongPham/Supplier/Search'> Tìm Kiếm</a>                
    </button>

    <button>
        <a href = '/CHVanPhongPham/Supplier/Sort'> Sắp Xếp</a>                
    </button>

    <a class='btn btn-add btn-sm' onclick = "xuatexcel()" title='Xuat_excel'><i class='fas fa-plus'></i>
     Xuất Excel </a>     
          
     
    
    </div>
    </div>
    </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script type="text/javascript">
    function xuatexcel() {
        var name = prompt("Nhập tên file của bạn", "Tên");
        if (!name) name = "DuLieu"; // Tên mặc định nếu người dùng không nhập
        exportData(name, '.xlsx');
    }

    function exportData(name, type) {
        // Lấy bảng
        const table = document.getElementById("employee");
        const rows = table.getElementsByTagName("tr");
        const data = [];

        for (let i = 0; i < rows.length; i++) {
            const cells = rows[i].getElementsByTagName("td");
            if (cells.length > 0) {
                const rowData = [];
                
                // Lấy giá trị idnhaphang ở cột đầu tiên (giả sử đây là cột đầu)
                rowData.push(cells[0].innerText); 
                
                for (let j = 1; j < cells.length - 1; j++) { // Bắt đầu từ cột thứ 2, loại bỏ cột cuối
                    if (j === 5 && cells[j].getElementsByTagName("img").length > 0) {
                        // Lấy đường dẫn ảnh
                        rowData.push(cells[j].getElementsByTagName("img")[0].src);
                    } else {
                        rowData.push(cells[j].innerText); // Lấy dữ liệu văn bản
                    }
                }
                data.push(rowData);
            }
        }

        const wb = XLSX.utils.book_new();
        const ws = XLSX.utils.aoa_to_sheet(data);
        XLSX.utils.book_append_sheet(wb, ws, "Products");
        XLSX.writeFile(wb, name + type);
    }
</script>

<script src="CHVanPhongPham/lib/js/sheet.js"></script>


<style>
       
       /* Kiểu bảng tổng quát */
#employee {
    width: 100%;
    border-collapse: collapse; /* Đảm bảo viền bảng liền mạch */
    margin-bottom: 20px; /* Tạo khoảng cách với các phần khác */
}

/* Đường viền cho các ô */
#employee th, #employee td {
    border: 1px solid black; /* Đường viền màu đen */
    padding: 10px 15px; /* Tạo khoảng cách bên trong các ô */
    text-align: center; /* Canh giữa nội dung */
}

/* Tiêu đề bảng */
#employee th {
    background-color: #f2f2f2; /* Màu nền tiêu đề bảng */
    font-weight: bold;
}

/* Các hàng có màu khác nhau */
#employee tr:nth-child(even) {
    background-color: #f9f9f9; /* Màu nền cho hàng chẵn */
}

#employee tr:nth-child(odd) {
    background-color: #ffffff; /* Màu nền cho hàng lẻ */
}

/* Canh đều nội dung */
#employee td {
    vertical-align: middle; /* Canh giữa theo chiều dọc */
}

/* Kiểu cho các nút */
.btn {
    padding: 6px 12px;
    margin: 2px;
    border-radius: 5px;
    font-size: 14px;
    text-align: center;
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

/* Nút thêm nhân viên */
button {
    padding: 10px 20px;
    background-color: #28a745;
    color: white;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    border: none;
    margin-top: 20px;
}

button:hover {
    background-color: #218838;
}

/* Liên kết bên trong nút */
button a {
    color: white;
    text-decoration: none;
}


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