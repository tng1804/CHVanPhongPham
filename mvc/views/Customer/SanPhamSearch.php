<?php
include 'header.php';

// include 'slider.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tran Ngoc</title>
    <link rel="stylesheet" href="../../public/css/Search2.css">
    <link rel="stylesheet" href="../../public/css/header2.css">
</head>

<body>
    <?php
   
    if (mysqli_num_rows($data["Sp"]) > 0) {
        echo "
            <div class='main-index'>
            <div class='table-sanpham'>
            <div class='header-product'>
                <div class='info'><p>Tìm kiếm theo từ khóa</p></div>
                
                <div class='btnXemThem'></div>
            </div>
            
            <table>
            
            <tbody>
            ";
        // for ($i = 0; $i < mysqli_num_rows($result) / 5; $i += 5) {
        $count = 0;
        echo "<div class='item-td'>";
        echo "<tr>";
        while ($row = mysqli_fetch_assoc($data["Sp"])) {
            // for ($i = 0; $i < mysqli_num_rows($result) / 5; $i ++){
            $count++;
            $number = $count;
            if ($count == $number) {

                echo "
                
                 
                <div class='item-product'>
                    <a href='./SanPhamDetail.php?id_sanpham=".$row['id_sanpham']."'>
                    <img src='../../public/image/" . $row['anhsp'] . "' alt='' width='150px;'> <br>
                    <p class = 'item-tensp'>" . $row['tensp'] . "</p><br>
                    <span class = 'item-giasp'>" . $row['giasp'] . " VNĐ</span> 
                    <button class='btn-addCart'>
                    <i class='fas fa-shopping-cart'></i>
                    Thêm vào giỏ hàng
                    </button>
                    </a>
                </div> 
                
                
                ";
            }
        }

        echo "</tr>";
        echo "</div>";
        echo "
            </tbody>
            </table>
            ";
        echo "</div>";
        echo "</div>";
    }

    // }


    ?>

</body>
<div class="footer">
    <?php
    include 'footer.php';
    ?>
</div>

</html>