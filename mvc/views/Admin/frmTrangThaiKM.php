<?php
include(__DIR__ . '/../header.php');
?>

<html>

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    </link>
</head>

<body class="bg-gray-100 font-sans">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-1/5 p-4">
            <?php include(__DIR__ . '/../Left_side.php'); ?>
        </div>

        <!-- Main Content -->
        <div class="w-4/5 p-6 mx-auto">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold">Khuyến mãi</h1>
                <!-- Tạo một div chứa cả 2 nút: Tạo khuyến mãi và Tìm kiếm -->
                <div class="flex flex-col items-end">
                    <!-- Nút tạo khuyến mãi -->
                    <button class="mb-2">
                        <a class="bg-blue-500 text-white px-4 py-2 rounded" href="/CHVanPhongPham/KhuyenMai/addKM"> + Tạo khuyến mãi</a>
                    </button>
                </div>
            </div>

            <p class="mb-4">Dễ dàng quản lý và áp dụng loại hình khuyến mãi, thu hút khách hàng và tăng doanh số bán hàng nhanh chóng, hiệu quả.</p>

            <!-- Form để lọc khuyến mãi -->
            <form method="POST">
                <div class="flex items-center mb-4">
                    <label class="mr-4">Hiển thị:</label>
                    <input type="radio" name="trangthai" value="all" checked class="mr-2">Tất cả
                    <input type="radio" name="trangthai" value="active" class="ml-4 mr-2">Đang khuyến mãi
                    <input type="radio" name="trangthai" value="expired" class="ml-4 mr-2">Đã hết hạn
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Lọc</button>
            </form>

            <form method="POST">
                <!-- Table to display promotion data -->
                <table class="w-full bg-white shadow-md rounded">
                    <thead>
                        <tr class="bg-gray-200 text-left">
                            <th class="p-2">Tiêu đề</th>
                            <th class="p-2">Loại</th>
                            <th class="p-2">Trạng thái</th>
                            <th class="p-2">Đã sử dụng</th>
                            <th class="p-2">Bắt đầu</th>
                            <th class="p-2">Kết thúc</th>
                            <th class="p-2">Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($data["TT"]) {
                            // Hiển thị dữ liệu từ cơ sở dữ liệu
                            while ($row = $data["TT"]->fetch_assoc()) {
                                // Xử lý trạng thái khuyến mãi
                                $trangThai = ($row['ngayKetThuc'] > date('Y-m-d')) ? "Đang khuyến mãi" : "Đã hết hạn";
                                $trangThaiClass = ($trangThai == "Đang khuyến mãi") ? "text-green-500" : "text-red-500";

                                // Hiển thị dữ liệu từng dòng
                                echo "<tr class='border-b'>";
                                echo "<td class='p-2'>" . $row['tenKM'] . "<br><span class='text-gray-500'>" . $row['moTa'] . "</span></td>";
                                echo "<td class='p-2'>" . $row['loaiKM'] . "</td>";
                                echo "<td class='p-2 $trangThaiClass'>$trangThai</td>";
                                echo "<td class='p-2'>" . $row['soLanSuDung'] . "</td>";
                                echo "<td class='p-2'>" . date('d/m/Y<br> H:i', strtotime($row['ngayTao'])) . "</td>";
                                echo "<td class='p-2'>" . ($row['ngayKetThuc'] ? date('d/m/Y<br> H:i', strtotime($row['ngayKetThuc'])) : '---') . "</td>";
                                echo "<td class='p-2'>
                            <a href='editKM/{$row['ID']}' class='text-blue-500 hover:underline'>Sửa</a>
                            <a href='deleteKM/{$row['ID']}' class='text-red-500 hover:underline ml-4'>Xóa</a>
                            </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8' class='p-2 text-center'>Không có dữ liệu</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <!-- Nút tìm kiếm -->
                <div>
                    <button type="submit" name="btntimkiemten" class="bg-blue-500 mt-6 px-4 py-5 rounded">
                        <a class="text-white" href="/CHVanPhongPham/KhuyenMai/timkiemKM">Tìm kiếm</a>
                    </button>
                </div>
        </div>
    </div>
</body>

</html>