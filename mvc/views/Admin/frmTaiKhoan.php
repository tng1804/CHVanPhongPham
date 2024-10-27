<?php
include(__DIR__ . '/../header.php');
include(__DIR__ . '/../Left_side.php');

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
                <div class="tile-body">
                    <div class="col-sm-2">
                    </div>
                    <div class='row element-button'>
                        <div class='col-sm-2' style="display: flex; gap: 10px;">
                            <a class='btn btn-add btn-sm' href='/CHVanPhongPham/TaiKhoan/addTK' title='Thêm'><i class='fas fa-plus'></i>
                                Thêm Tài khoản</a>
                            <br>
                            <br>
                            <a class='btn btn-add btn-sm' href='/CHVanPhongPham/TaiKhoan/SearchTK' title='Tìm'><i class='fas fa-plus'></i>
                                Tìm kiếm </a>
                            <br>
                            <br>
                            <a class='btn btn-add btn-sm' onclick="xuatexcel()" title='Xuat_excel'><i class='fas fa-plus'></i>
                                Xuất Excel </a>
                            <br>
                        </div>

                    </div>
                    <?php
                    if (mysqli_num_rows($data["TK"]) > 0) {


                        echo "<h1>QUẢN LÍ TÀI KHOẢN</h1>";
                        echo "<table id='customers'>";
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
                        while ($row = mysqli_fetch_assoc($data["TK"])) {

                            echo "<tr>";

                            echo "<td>" . $row["id_taikhoan"] . "</td>";
                            echo "<td>" . $row["ten"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["pass"] . "</td>";
                            echo "<td>" . $row["sdt"] . "</td>";
                            echo "<td>" . $row["diachi"] . "</td>";
                            echo "<td>" . $row["quyen"] . "</td>";
                            echo "<td> <a href='/CHVanPhongPham/TaiKhoan/editTK/" . $row["id_taikhoan"] . "'class='btn btn-edit ' type='button' title='Sửa'> 
                            <i class=''>Sửa</i> </a>
                            <a href='/CHVanPhongPham/TaiKhoan/deletetk/" . $row["id_taikhoan"] . "'
                           onclick = \" javascript: return confirm('Bạn có chắc muốn xóa tài khoản này?') \" class='btn btn-delete' type='button' title='Xóa'>xóa</a> </td>
                           ";

                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                    } else {
                        echo "Không có bản ghi";
                    }

                    ?>
                </div>

            </div>
        </div>
    </div>

    </div>
    <script type="text/javascript">
        function xuatexcel() {
            var name = prompt("Nhập tên file của bạn", "Tên");
            exportData(name, '.xlsx');
        }

        function exportData(name, type) {
            const fileName = name + type;
            const originalTable = document.getElementById("customers");
            const clonedTable = originalTable.cloneNode(true);
            const rows = clonedTable.getElementsByTagName('tr');
            for (let i = 0; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName('td');
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