<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="http://localhost/CHVanPhongPham/public/css/SanPham_Detail.css">
    <link rel="stylesheet" href="http://localhost/CHVanPhongPham/public/css/header2.css">
</head>

<body>
    <?php

    if (mysqli_num_rows($data["Sp"]) > 0) {
        while ($row = mysqli_fetch_assoc($data["Sp"])) {
            echo "
            <div class='mainDetail'>
            <h2 class='heading'>Thông tin sản phẩm</h2>
            <div class='main-detail'>

            <div class='sp-img'>
                <img src='../../public/image/" . $row['anhsp'] . "' alt='' width='300px;'> <br>
            </div> 
            <div class='sp-info'>
            <h2 class = 'info-name'> " . $row['tensp'] . "</h2>";
            echo "<p class = 'sp-chitiet'>Chi tiết sản phẩm:  " . $row['chitiet_sp'] . "</p>";


            if ($row['tinhtrang'] == '0') {
                echo "<p>Tình trạng: Hết hàng</p>";
            } else if ($row['tinhtrang'] == 0) {
                echo "<p>Tình trạng: Còn hàng</p>";
            }

            echo "<p class = 'sp-Kho'>Kho:  " . $row['soluong'] . "</p>";

            echo "<p class='info-gia'>" . $row['giasp'] . " VNĐ</p>";
            echo "<form id='cart-form' action='' method='post'>";
            echo "<p class = 'sp-soluong'>Số lượng: 
            <input class='txt-soluong' name= 'soluong' type='number' min='1' max='100' value = '1' > </p>";
            echo "
            <div class='btn-thaotac'>
            
            ";
    ?>
            <input type="hidden" value="<?php echo $row['id_sanpham'] ?>" name="id_sanpham">
            <input type="hidden" value="<?php echo $row['giasp'] ?>" name="price">
            <div class='btn-thaotac'>
                <button type='button' id="btn-addCart" class='btn-addCart' name='btn-addCart'>Thêm vào giỏ hàng</button>
            </div>

            <!-- <button class='btn-muahang'>
                <i class='fas fa-shopping-cart'></i>
                Mua hàng
            </button> -->
    <?php
            echo "
            </form>
            </div>";

            // <td> " . $row[''] . "</td>
            // <td> " . $row[''] . "</td>
            // <td> " . $row[''] . "</td>
            // <td> " . $row[''] . "</td>


            echo "
        </div> 
        </div> 
            
            </div> 
        ";
            // if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btn-addCart'])) {
            //     $sanpham_anh = $row['anhsp'];
            //     $session_idA = session_id();

            //     $sanpham_id =  $row['id_sanpham'];
            //     $sanpham_tieude =  $row['tensp'];
            //     $sanpham_gia =  $row['giasp'];
            //     $quantitys =  $_POST['soluong'];
            //     if ($quantitys > $row['soluong']) {
            //         echo "
            //         <script>
            //         alert('So luong nhap vao lon hon so luong san pham trong kho');

            //         </script> ";
            //     } else {
            //         $sql = "INSERT INTO tbl_cart VALUES('','" . $sanpham_anh . "','" . $session_idA . "','" . $sanpham_id . "','" . $sanpham_tieude . "','" . $sanpham_gia . "','" . $quantitys . "')";
            //         $result = mysqli_query($conn, $sql);
            //         if (!$result) {
            //             echo "Thêm giỏ hàng không thành công";
            //         } else {
            //             echo "
            //         <script>
            //         alert('Thêm giỏ hàng thành công');
            //             window.location.href='index.php';
            //         </script>
            //     ";
            //         }
            //     }
            // }
        }
    } else {
        echo "Không có dữ liệu";
    }
    ?>
    <div class="form-comment">
        <h2 class="text-heading">
            Ý kiến bình luận / câu hỏi sản phẩm
        </h2>
        <!-- <button type="submit"></button> -->
        <form action="" method="post">
            <p class="txt-pidsp">
                <input type="hidden" name="txt-idsanpham" value="">
            </p>

            <p class="txt-pten">
                <input type="text" name="txt-name" placeholder="Ẩn danh">
            </p>

            <p class="txt-pbinhluan"><textarea class="txt-cmt" name="txt-comment" id="" cols="125" rows="10" placeholder="Mời bạn bình luận hoặc đặt câu hỏi"></textarea></p>

            <p class="btn-psubmit"><button type="submit" name="btn-guicmt">Gửi câu hỏi</button></p>





        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btn-guicmt'])) {
            // $id_sanpham = $_POST['txt-idsanpham'];
            $cauhoi =  $_POST['txt-comment'];
            $traloi =  "";
            // $date =  date('Y-m-d');
            $sql = "INSERT INTO tblquestion VALUES('','" . $cauhoi . "','" . $traloi . "')";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                echo "Đặt câu hỏi không thành công";
            }
        }

        ?>
        <div class="clear"></div>
        <!-- In bình luận -->
        <div class="list-cmt">
            <?php
            // $sql = "SELECT * FROM tblquestion";
            // $result = mysqli_query($conn, $sql);

            // if (mysqli_num_rows($result) > 0) {
            //     while ($row = mysqli_fetch_assoc($result)) {
            echo "<h3> Chế độ ẩn danh </h3>";
            //  echo "<h3> " . $row['cauhoi'] . "</h3>";
            // echo "<p> " . $row['traloi'] . "</p>";
            echo "<button class='btn-like'><i class='far fa-thumbs-up'></i> Thích 
                    </button>";
            //     }
            // }




            ?>

        </div>


    </div>
</body>
<div class="footer">
    <?php
    include 'footer.php';
    ?>
</div>

</html>