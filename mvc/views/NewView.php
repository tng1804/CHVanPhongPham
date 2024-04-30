<?php
include "header.php";
include "Left_side.php";
?>

 <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="frmThongTinSP.php"><b>Quản lý tin tức</b></a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body" >
                    <div class="col-sm-2">
                    </div>
    <?php

        if(mysqli_num_rows($data["TT"])>0){
                
                echo "<p>Thông Tin Các Tin Tức</p>";
                echo"<table id='customers'>";
                    echo "<thead>";
                        echo "<tr>
                        <th>ID tin tức</th>
                        <th>Tiêu đề</th>
                        <th>Nội dung</th>
                        <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>";
                    
                        while($row = mysqli_fetch_assoc($data["TT"])){
                            {                                
                            echo "<tr>";                                
                            echo "<td> " .$row["id_tintuc"]. "</td>";
                            echo "<td> " .$row["tieude"]. "</td>";
                            echo "<td> " .$row["noidung"]. "</td>";
                           
                            echo "<td>
                            <a href='/VanPhongPham/News/Delete/".$row["id_tintuc"]."' class='btn btn-delete' type='button' title='Xóa'>Xóa</a>
                            
                              <a href='/VanPhongPham/News/Edit/".$row["id_tintuc"]."' class='btn btn-edit' type='button'  title='Sửa'>Sửa</a>     
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
        <a href = '/VanPhongPham/News/Add'> Thêm Tin Tức </a>                
    </button>

    <button>
        <a href = '/VanPhongPham/News/Search'> Tìm Kiếm </a>                
    </button>

    <a class='btn btn-add btn-sm' onclick = "xuatexcel()" title='Xuat_excel'><i class='fas fa-plus'></i>
     Xuất Excel </a>     
                
     <button>
        <a href = '/VanPhongPham/News/Sort'> Sắp xếp </a>                
    </button>


    </div>
    </div>
    </div>
    </div>
</body>
</html>
<!-- Sử dụng CDN -->
<!-- Sử dụng CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script type="text/javascript">
      
      function xuatexcel(){
        var name = prompt("Nhập tên file của bạn", "Tên");
         exportData(name,'.xlsx');
    
      }
      function exportData(name, type) {
    // Lấy bảng customers
    const table = document.getElementById("customers");

    // Loại bỏ cột cuối cùng của bảng
    const rows = table.getElementsByTagName("tr");
    for (let i = 0; i < rows.length; i++) {
        const row = rows[i];
        if (row.cells.length > 0) {
            row.deleteCell(row.cells.length - 1); // Loại bỏ ô cuối cùng
        }
    }

    // Xuất bảng sang Excel
    const fileName = name + type;
    const wb = XLSX.utils.table_to_book(table);
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