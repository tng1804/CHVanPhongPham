<?php
include(__DIR__ . '/../../views/header.php');
include(__DIR__ . '/../../views/Left_side.php');
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
            <td class="from-group col-md-3"><br><br>
            <select class="form-control" required="required" name="txtlc" id="">
                <option value="tenNCC">Tên nhà cung cấp</option>
                <option value="masothue">Mã số thuế</option>
            </select>
            <input type='text' name = 'txttimkiem' id = 'txttimkiem'></td>
        </tr>
        
    </table>
    <button type='submit' name='btntimkiemten'>Tìm kiếm</button>
  </form>
  <?php
     if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btntimkiemten']))
     {         
     $result = $data["SPL"];
    if(mysqli_num_rows($data["SPL"])>0)
{
    echo"<br>";
    echo "<div class='row'>
    <div class='col-md-12'>
        <div class='tile'>
            <div class='tile-body'>
                <div class='row element-button'>
                    <div class='col-sm-2'>
                    <table id='employee'>;
                    </thead>
    <tr>
    <th>ID nhà cung cấp</th>
    <th>Tên nhà cung cấp</th>
    <th>Địa chỉ</th>
    <th>Số điện thoại</th>
    <th>Mã số thuế</th>
    <th>Trạng thái</th>
    <th>Chức năng</th>
    </tr>
    </thead>
    <tbody>
    ";
    while( $row = mysqli_fetch_assoc($data["SPL"]))
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
    echo"
    </tbody>
    </table>";

}else {
    echo"Khong tim thay du lieu";
}}
  ?>
  <br>
  <a href="/CHVanPhongPham/Supplier/Show">Quay về trang chủ</a>
  </body>
</html>

<style>
/* Bảng hiển thị thông tin nhân viên */
#employee {
    width: 100%; /* Chiếm 100% chiều rộng của phần chứa */
    border-collapse: collapse; /* Bỏ khoảng trống giữa các ô */
    margin-bottom: 20px;
}

#employee th, #employee td {
    border: 1px solid black; /* Đường viền màu đen */
    padding: 12px 15px; /* Khoảng cách bên trong ô */
    text-align: center; /* Canh giữa nội dung */
    white-space: nowrap; /* Giữ nội dung trên cùng một dòng, không xuống dòng */
}

#employee th {
    background-color: #4CAF50; /* Màu nền cho tiêu đề bảng */
    color: white; /* Màu chữ cho tiêu đề */
}

#employee tr:nth-child(even) {
    background-color: #f2f2f2; /* Màu nền cho các hàng chẵn */
}

#employee tr:nth-child(odd) {
    background-color: #ffffff; /* Màu nền cho các hàng lẻ */
}

#employee td {
    vertical-align: middle; /* Canh giữa theo chiều dọc */
    word-wrap: break-word; /* Tự động xuống dòng khi nội dung quá dài */
}

/* Căn đều các cột */
#employee th, #employee td {
    width: auto; /* Tự động căn chỉnh độ rộng */
    max-width: 200px; /* Đặt giới hạn độ rộng tối đa cho các cột */
}

/* Tạo khoảng cách cho nút */
button {
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #28a745;
    color: white;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    border: none;
}

button:hover {
    background-color: #218838;
}

button a {
    color: white;
    text-decoration: none;
}


    /* CSS cho nút "Tìm kiếm" */
button[name='btntimkiemten'] {
    background-color: #007bff; /* Màu nền (màu xanh lam) */
    color: white; /* Màu chữ (trắng) */
    padding: 10px 20px; /* Khoảng đệm bên trong */
    border: none; /* Bỏ đường viền */
    border-radius: 5px; /* Bo góc cho nút */
    cursor: pointer; /* Con trỏ chuột thành hình tay khi di chuyển vào nút */
    font-size: 16px; /* Cỡ chữ */
    font-weight: bold; /* Độ đậm của chữ */
    text-align: center; /* Canh giữa nội dung bên trong nút */
    transition: background-color 0.3s; /* Hiệu ứng chuyển đổi màu nền */
    margin-top: 15px;
    margin-left:15px;
}

/* Hiệu ứng khi hover */
button[name='btntimkiemten']:hover {
    background-color: #0056b3; /* Màu nền khi di chuột qua (xanh đậm hơn) */
}

/* Hiệu ứng khi nhấn */
button[name='btntimkiemten']:active {
    background-color: #004080; /* Màu nền khi nhấn (xanh sậm) */
}

</style>

