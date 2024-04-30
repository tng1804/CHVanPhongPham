<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Hóa Đơn</title>
    <style>
        /* CSS cho form */
        form {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"], input[type="date"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Thêm Hóa Đơn</h2>
    <form  action="" method="POST" enctype="multipart/form-data"> 
        <label for="makhachhang">Mã Khách Hàng:</label>
        <select id="makhachhang" name="makhachhang" >
            <?php
            $conn = mysqli_connect("localhost", "root", "", "chvanphongpham");
            $query = "SELECT id_khachhang FROM tblkhachhang";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['id_khachhang'] . "'>" . $row['id_khachhang'] . "</option>";
            }
            ?>
        </select>

        <label for="tongtien">Tổng Tiền:</label>
        <input type="number" id="tongtien" name="tongtien" required>

        <label for="ngaytao">Ngày Tạo:</label>
        <input type="date" id="ngaytao" name="ngaytao" required>

        <input type="submit" name="btn_addhd" value="Thêm Hóa Đơn">
    </form>
</body>
</html>
