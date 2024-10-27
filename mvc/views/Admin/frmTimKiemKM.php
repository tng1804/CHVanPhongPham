<?php
include(__DIR__ . '/../header.php');
include(__DIR__ . '/../Left_side.php');
?>
<main class='app-content'>
    <div class='app-title'>
        <h1>Tìm kiếm khuyến mãi</h1>
    </div>
    <div class='row'>
        <div class='col-md-12'>
            <div class='tile'>
                <div class='tile-body'>
                    <div class='row element-button'>
                        <div class='col-sm-12'>
                            <form method="POST" class="form-inline mb-4">
                                <div class="form-group mx-sm-3 mb-2" style="max-width: 400px;">
                                    <select class="form-control" required="required" name="txtlc">
                                        <option value="tenKM">Tên khuyến mãi</option>
                                        <option value="loaiKM">Loại khuyến mãi</option>
                                    </select>
                                    <input type='text' name='txttimkiem' id='txttimkiem' class="form-control mx-2" placeholder="Nhập từ khóa" required>
                                </div>
                                <button type='submit' name='btntimkiemten' class="btn btn-primary mb-2">Tìm kiếm</button>
                            </form>

                            <?php
                            $result = $data["DL"];
                            if ($result && mysqli_num_rows($result) > 0) {
                                echo "<br>";
                                echo "<div class='row'>
                                        <div class='col-md-12'>
                                            <div class='tile'>
                                                <div class='tile-body'>
                                                    <table id='customers' class='table table-striped'>
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Tên khuyến mãi</th>
                                                                <th>Mô tả</th>
                                                                <th>Loại khuyến mãi</th>
                                                                <th>Ngày tạo</th>
                                                                <th>Ngày kết thúc</th>
                                                                <th>Số lần sử dụng</th>
                                                                <th>Mức giảm</th>
                                                                <th>Danh mục ID</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>";
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td> " . $row["ID"] . "</td>";
                                    echo "<td> " . $row["tenKM"] . "</td>";
                                    echo "<td> " . $row["moTa"] . "</td>";
                                    echo "<td> " . $row["loaiKM"] . "</td>";
                                    echo "<td> " . date('d/m/Y', strtotime($row["ngayTao"])) . "</td>";
                                    echo "<td> " . date('d/m/Y', strtotime($row["ngayKetThuc"])) . "</td>";
                                    echo "<td> " . $row["soLanSuDung"] . "</td>";
                                    echo "<td> " . $row["mucGiam"] . "</td>";
                                    echo "<td> " . $row["danhMucID"] . "</td>";
                                    echo "</tr>";
                                }
                                echo "
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>";
                            } else {
                                echo "<div class='alert alert-warning'>Không tìm thấy dữ liệu</div>";
                            }
                            ?>
                            <br>
                            <a href="/CHVanPhongPham/KhuyenMai/Show" class="btn btn-secondary">Quay về trang chủ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
    /* CSS cho nút "Tìm kiếm" */
    button[name='btntimkiemten'] {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        transition: background-color 0.3s;
        margin-top: 15px;
        margin-left: 15px;
    }

    /* Hiệu ứng khi hover */
    button[name='btntimkiemten']:hover {
        background-color: #0056b3;
    }

    /* Hiệu ứng khi nhấn */
    button[name='btntimkiemten']:active {
        background-color: #004080;
    }
</style>