<?php
include 'header.php';

?>


<!-- <body> -->
    <!-- <div class="slider">
    </div> -->
    <?php

// var_dump($data);
// exit;
foreach ($data["Sp"] as $item) {
    echo "<div class='main-index'>
            <div class='table-sanpham'>
                <div class='header-product'>
                    <div class='info'><p>Loại: " . $item['Loai'] . "</p></div>
                    <div class='btnXemThem'>
                        <a href='/CHVanPhongPham/HomeUser/ShowByCategory" . $item['id_loaisp'] . "'>
                        <button>Xem thêm</button>
                        </a>
                    </div>
                </div>
                <table>
                    <tbody>
                        <tr>";

    $sanphamResult = $item['sanpham'];
    if (mysqli_num_rows($sanphamResult) > 0) {
        $count = 0;
        while ($row = mysqli_fetch_assoc($sanphamResult)) {
            $count++;
            echo "<td> 
                    <div class='item-product'>
                        <a href='/CHVanPhongPham/HomeUser/ShowDetailProduct/" . $row['id_sanpham'] . "'>
                            <img src='../public/image/" . $row['anhsp'] . "' alt='' width='150px;'> <br>
                            <p class='item-tensp'>" . $row['tensp'] . "</p><br>
                            <span class='item-giasp'>" . $row['giasp'] . " VNĐ</span>
                            <button class='btn-addCart' name='btn-addCart'>
                                <i class='fas fa-shopping-cart'></i>
                                Xem thông tin chi tiết
                            </button>
                        </a>
                    </div> 
                </td>";

            // Nếu muốn giới hạn số lượng sản phẩm hiển thị, bạn có thể bỏ dòng này:
            if ($count == 4) { break; }
        }
    } else {
        echo "<td colspan='4'>Không có sản phẩm nào.</td>"; // Thay số 4 bằng số cột bạn cần
    }

    echo "</tr>
            </tbody>
            </table>
            </div>
            </div>";
}

    ?>
<?php
echo " abc";
// print_r($dataheader["loaisp"]); 
// foreach ($data["Sp"] as $item) {
//     echo $item['Loai']; // Giả sử 'loai' là một trường trong mảng
//     echo $item['sanpham']; // Giả sử 'sanpham' là một trường trong mảng
// }
?>
<?php

?>




</body>
<div class="footer">
    <?php
   // include 'footer.php';
    ?>
</div>

</html>