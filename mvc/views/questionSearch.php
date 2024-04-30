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
                                            <button type='submit' name='btntimkiemten' br>Tìm kiếm</button><br> <br>
                                            <select class="form-control" required="required" name="txtlc" id="">
                                                <option value="cauhoi">Câu hỏi</option>
                                                <option value="id">id câu hỏi</option>
                                            </select>
                                            <input type='text' name='txttimkiem' id='txttimkiem'>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btntimkiemten'])){
                            if (mysqli_num_rows($data["QT"]) > 0) {
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
                                <th>ID</th>
                                <th>Câu hỏi</th>
                                <th>Trả lời</th>
                            </tr>
                            </div>
                            </div>
                            <div>
  
                             ";
                                while ($row = mysqli_fetch_assoc($data["QT"])) {

                                    echo "<tr>";
                                    echo " <td> " . $row["id"] . "</td>";
                                    echo "<td> " . $row["cauhoi"] . "</td>";
                                    echo "<td> " . $row["traloi"] . "</td>";
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
                            <a href="listQT">Quay về trang chủ</a>
</main>
</body>

</html>
<!-- <style>
    .col-md-3 {
        width: 50%; /* Tăng độ rộng lên 50% */
        margin: 0 auto; /* Căn giữa phần tử */
        padding: 20px; /* Thêm khoảng cách xung quanh phần tử */
        background-color: #f2f2f2; /* Màu nền */
        border: 1px solid #ccc; /* Viền */
        border-radius: 5px; /* Góc bo tròn */
        box-sizing: border-box; /* Đảm bảo kích thước không bị thay đổi bởi padding và border */
    }

    button[type='submit'] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    select.form-control,
    input[type='text'] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

</style> -->
