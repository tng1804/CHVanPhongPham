<?php
include(__DIR__ . '/../header.php');
include(__DIR__ . '/../Left_side.php');
?>
<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="qlyhoadon.php"><b>Quản lý Tài Khoản</b></a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="col-sm-2">
                    </div>
                    <form METHOD="POST">
                        <table>
                            <tr>

                                <select name='txtlc' id="txtlc">
                                    <option value="ten">Tên người dùng</option>
                                    <option value="email"> Email</option>
                                    <option value="sdt">SĐT</option>
                                    <option value="quyen">Quyền</option>
                                    <option value="diachi">Địa chỉ</option>
                                </select>
                                <input style="margin-top: 10px; margin-left: 10px" type='text' name='txttimkiem' id='txttimkiem'>
                                <td><button style="margin-top: 10px" type='submit' name='btntimkiemten'>Tìm kiếm</button>
                                </td>
                            </tr>

                        </table>
                    </form>

                    <?php
                    if ($data["TK"] == null)
                        return;
                    else
 if (mysqli_num_rows($data["TK"]) > 0) {
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
                            echo "<td><a href = '/CHVanPhongPham/TaiKhoan/EditTK/" . $row["id_taikhoan"] . "'>Sửa</a>
                                 
                                 <a onClick=\"javascript: return confirm('bạn có muốn xóa không');
                                 \" href = '/CHVanPhongPham/TaiKhoan/EditTK/" . $row["id_taikhoan"] . "'>Xóa </a>
                                 </td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                    } else {
                        echo "Không tìm thấy dữ liệu";
                    }

                    ?>
                    <br>
                    <button>
                        <a href="/CHVanPhongPham/TaiKhoan/Show">Quay về trang chủ</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    </body>

    </html>