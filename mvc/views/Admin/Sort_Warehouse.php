<?php
include(__DIR__ . '/../../views/header.php');
include(__DIR__ . '/../../views/Left_side.php');
?>


<head>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="/CHVanPhongPham/Warehouse/Show"><b>Thông tin kho</b></a></li>
            <li class="breadcrumb-item active"><a href="/CHVanPhongPham/Warehouse/Add"><b>Thêm thông tin kho</b></a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class='row element-button'>
                        <div class='col-sm-2'>
                            <a class='btn btn-add btn-sm' href='' onclick="xuatexcel()" title='Xuất Excel'><i class='fas fa-plus'></i>
                                Xuất Excel</a>
                        </div>

                    </div>
                    <div>
                        <h2>Tất cả thông tin kho đã sắp xếp tăng theo ngày nhập :</h2>
                        <table id="customers">
                            <tr>
                            <th>Mã nhập hàng</th>
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng nhập</th>
                            <th>Giá nhập</th>
                            <th>Ngày nhập</th>
                            <th>Hoạt động</th>
                            </tr>
                            <?php
                            $count = 0;
                            if (mysqli_num_rows($data["WH"]) > 0) {
                                while ($row = mysqli_fetch_assoc($data["WH"])) {
                                    $count++;
                            ?>
                                    <tr>
                                        <td><?php echo $row['idnhaphang'] ?></td>
                                        <td><?php echo $row['id_sanpham'] ?></td>
                                        <td><?php echo $row['tensp'] ?></td>
                                        <td><?php echo $row['soluongnhap'] ?></td>
                                        <td><?php echo $row['gianhap'] ?></td>
                                        <td><?php echo $row['ngaynhap'] ?></td>
                                        <td>
                                            <a name="submit" href="<?php echo 'Edit/' . $row["idnhaphang"] . '' ?>" class="btn btn-delete" type="button" title="Sửa">
                                                <i class="fas fa-edit"></i></a>
                                            <a href="<?php echo 'Delete/' . $row["idnhaphang"] . '' ?>" onclick="return confirm('Thông tin sẽ bị xóa vĩnh viễn, bạn có chắc muốn tiếp tục không?');" class="btn btn-edit" type="button" title="Xóa"><i class="fas fa-trash"></i></a>
                                        </td>

                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </table>
                    </div>

                </div>
                <div class='row element-button'>
                <div class='col-sm-2'>
                        <br>
                        <br>
                        <a class='btn btn-add btn-sm' href='/CHVanPhongPham/Warehouse/Show' title='Sắp xếp'><i class='fas fa-plus'></i>
                            Quay lại</a>
                    </div>
                </div>
            </div>

        </div>
</main>

</body>

</html>

<!-- Sử dụng CDN -->
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
