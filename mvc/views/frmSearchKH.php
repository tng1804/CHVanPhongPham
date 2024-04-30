<?php
include "header.php";
include "Left_side.php";
?>
<main class='app-content'>
    <div class='app-title'>
    </div>
    <div class='row'>
        <div class='col-md-12'>
            <div class='tile'>
                <div class='tile-body'>
                    <div class='row element-button'>
                        <div class='col-sm-2'>
                            <form METHOD="POST">
                                <table>
                                    <tr>
                                        <td class="from-group col-md-3 ">
                                            <button type='submit' name='btntimkiemten' br>Tim Kiem</button><br> <br>
                                            <select class="form-control" required="required" name="txtlc" id="">
                                                <option value="tenKH">Tên khách hàng</option>
                                                <option value="id_khachhang">id khách hàng</option>
                                            </select>
                                            <input type='text' name='txttimkiem' id='txttimkiem'>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btntimkiemten'])){
                            if (mysqli_num_rows($data["KH"]) > 0) {
                                echo "<div class='row'>
    <div class='col-md-12'>
        <div class='tile'>
            <div class='tile-body'>
                <div class='row element-button'>
                    <div class='col-sm-2'>
                    <table id='customers'>;
                    </thead>
                  
    <thead>
    <tr>
    <th>ID khách hàng</th>
    <th>Tên khách hàng</th>
    <th>Địa chỉ</th>
    <th>SĐT</th>
    <th>Email</th>
  </tr>
  </div>
  </div>
<div>
  
    ";
                                while ($row = mysqli_fetch_assoc($data["KH"])) {

                                    echo "<tr>";
                                    echo " <td> " . $row["id_khachhang"] . "</td>";
                                    echo "<td> " . $row["ten"] . "</td>";
                                    echo "<td> " . $row["diachi"] . "</td>";
                                    echo "<td> " . $row["sdt"] . "</td>";
                                    echo "<td> " . $row["email"] . "</td>";
                                    echo "</tr>";
                                }
                                echo "
    </tbody>
    </table>";
                            } else {
                                echo "Khong tim thay du lieu";
                            }
                        }
                            ?>
                            <br>
                            <a href="listKH">Quay về trang chủ</a>
</main>
</body>

</html>
<style>
    /* General styles */
/* General styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
}

/* Form container */
form {
    max-width: 600px; /* Tăng độ rộng của biểu mẫu lên 600px */
    margin: 40px auto;
    padding: 20px;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

/* Form table */
form table {
    width: 100%; /* Đảm bảo bảng chiếm toàn bộ độ rộng của biểu mẫu */
}

/* Form table cells */
form td {
    padding: 10px;
}

/* Form button */
button[type="submit"] {
    background-color: #4a90e2;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
}

button[type="submit"]:hover {
    background-color: #357abd;
}

/* Select and input elements */
select,
input[type="text"] {
    width: 100%; /* Tăng độ rộng của ô nhập liệu và danh sách lựa chọn lên 100% */
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-bottom: 10px;
    font-size: 14px;
}

/* Select and input focus styles */
select:focus,
input[type="text"]:focus {
    border-color: #4a90e2;
    outline: none;
}

</style>