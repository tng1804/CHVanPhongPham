<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tìm kiếm sản phẩm</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f2f5;
        height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-top: 20px;
    }

    .container {
        background-color: white;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        max-width: 900px;
        width: 100%;
    }

    .btn-search, .btn-back {
        width: 100%;
        font-size: 16px;
        padding: 10px;
    }

    .select-group, .input-group {
        margin-bottom: 20px;
    }

    .form-control {
        height: 45px;
        font-size: 16px;
    }

    .btn-back {
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-back:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }

    h3 {
        text-align: center;
        margin-bottom: 20px;
        color: #007bff;
    }

    .table {
        margin-top: 20px;
        background-color: #fff;
    }

    .table th, .table td {
        text-align: center;
    }

    .table th {
        background-color: #007bff;
        color: #fff;
    }

    .table tbody tr:nth-child(odd) {
        background-color: #f2f2f2;
    }
</style>
</head>
<body>
<div class="container">
    <h3>Tìm kiếm sản phẩm</h3>
    <form method="POST">
        <div class="form-group select-group">
            <select class="form-control" required="required" name="txtlc" id="txtlc">
                <option value="tensp">Tên sản phẩm</option>
                <option value="id_sanpham">ID sản phẩm</option>
            </select>
        </div>
        <div class="form-group input-group">
            <input type="text" name="txttimkiem" id="txttimkiem" class="form-control" placeholder="Nhập từ khóa tìm kiếm">
        </div>
        <button type="submit" name="btntimkiemten" class="btn btn-primary btn-search">Tìm kiếm</button>
<br> </br>
        <a class='btn btn-primary btn-search' onclick='xuatexcel()' title='Xuat_excel'>
        <i class='fas fa-file-excel'></i> Xuất Excel
    </a>
    <br> </br>
    </form>

    <!-- Phần bảng dữ liệu -->
    <?php
     echo "
     <table id='customers' class='table table-bordered table-striped'>
         <thead class='thead-dark'>
             <tr>
                 <th>ID sản phẩm</th>
                 <th>Tên sản phẩm</th>
                 <th>Loại sản phẩm</th>
                 <th>Giá tiền</th>
                 <th>Ảnh sản phẩm</th>
                 <th>Số lượng</th>
                 <th>Chi tiết sản phẩm</th>
                 <th>Nhà cung cấp</th>
                 <th>Chức năng </th>
             </tr>
         </thead>
         <tbody>";
    if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btntimkiemten'])) {
        $result = $data["SP"];
        if (mysqli_num_rows($data["SP"]) > 0) {
           
            while ($row = mysqli_fetch_assoc($data["SP"])) {
                echo "<tr>";
                echo "<td>" . $row["id_sanpham"] . "</td>";
                echo "<td>" . $row["tensp"] . "</td>";
                echo "<td>" . $row["loaisp_id"] . "</td>";
                echo "<td>" . $row["giasp"] . "</td>";
                echo "<td><img src='/CHVanPhongPham/public/uploads/" . $row["anhsp"] . "' alt='' style='max-width:100px;'></td>";
                echo "<td>" . $row["soluong"] . "</td>";
                echo "<td>" . $row["chitiet_sp"] . "</td>";
                echo "<td>" . $row["id_NCC"] . "</td>";
                echo "<td>
                <a href='/CHVanPhongPham/SanPham/Delete/".$row["id_sanpham"]."' class='btn btn-delete' type='button' title='Xóa'>Xóa</a>
                
                  <a href='/CHVanPhongPham/SanPham/Edit/".$row["id_sanpham"]."' class='btn btn-edit' type='button'  title='Sửa'>Sửa</a>     
                </td>";
                echo "</tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "Không tìm thấy dữ liệu";
        }
    }
    ?>
    <a href="/CHVanPhongPham/SanPham" class="btn btn-back">Quay về trang chủ</a>
</div>
</body>
</html>
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