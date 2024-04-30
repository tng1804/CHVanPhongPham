

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
    }

    .container {
        margin-top: 50px;
    }

    .btn-search {
        margin-bottom: 20px;
    }

    .table {
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

    .btn-back {
        margin-top: 20px;
    }
</style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form method="POST">
                <div class="form-group row">
                    <div class="col-md-3">
                        <button type="submit" name="btntimkiemten" class="btn btn-primary btn-search">Tìm kiếm</button>
                        <select class="form-control" required="required" name="txtlc" id="txtlc">
                            <option value="tensp">Tên sản phẩm</option>
                            <option value="id_sanpham">ID sản phẩm</option>
                        </select>
                        <input type="text" name="txttimkiem" id="txttimkiem" class="form-control">
                    </div>
                </div>
            </form>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btntimkiemten'])) {
                $result = $data["SP"];
                if (mysqli_num_rows($data["SP"]) > 0) {
                    echo "<div class='row'>
                    <div class='col-md-12'>
                    <div class='tile'>
                    <div class='tile-body'>
                    <div class='row element-button'>
                    <div class='col-sm-2'>
                    <table class='table table-bordered table-striped'>
                    <thead class='thead-dark'>
                    <tr>
                        <th>ID sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Loại sản phẩm</th>
                        <th>Giá tiền</th>
                        <th>Giảm giá</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Chi tiết sản phẩm</th>
                        <th>Tình trạng</th>
                    </tr>
                    </thead>
                    <tbody>";

                    while ($row = mysqli_fetch_assoc($data["SP"])) {
                        echo "<tr>";
                        echo "<td>" . $row["id_sanpham"] . "</td>";
                        echo "<td>" . $row["tensp"] . "</td>";
                        echo "<td>" . $row["loaisp_id"] . "</td>";
                        echo "<td>" . $row["giasp"] . "</td>";
                        echo "<td>" . $row["khuyenmai"] . "</td>";
                        echo "<td><img src='/VanPhongPham/public/uploads/" . $row["anhsp"] . "' alt='' style='max-width:100px;'></td>";
                        echo "<td>" . $row["soluong"] . "</td>";
                        echo "<td>" . $row["chitiet_sp"] . "</td>";
                        echo "<td>" . $row["tinhtrang"] . "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody></table></div></div></div></div></div>";
                } else {
                    echo "Không tìm thấy dữ liệu";
                }
            }
            ?>
            <a href="/VanPhongPham/SanPham" class="btn btn-primary btn-back">Quay về trang chủ</a>
        </div>
    </div>
</div>
</body>
</html>
