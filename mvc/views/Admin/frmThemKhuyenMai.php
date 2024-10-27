<html>

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<form method="post">

    <body class="bg-gradient-to-r from-blue-50 to-indigo-100 p-6">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg transform transition duration-300 hover:shadow-2xl">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-indigo-600">Tạo khuyến mãi</h2>
                <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg transition duration-200 ease-in-out" class="btn-submit" name="btnsubmit" onclick="submitForm()">Lưu</button>
            </div>
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-800">* Tên chương trình khuyến mãi</label>
                    <input type="text" name="tenKM" class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm p-3 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-800">Miêu tả</label>
                    <input type="text" name="moTa" class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm p-3 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-800">* Thời gian bắt đầu</label>
                    <div class="flex items-center space-x-4 mt-2">
                        <input type="date" name="ngayTao" class="block w-full border border-gray-300 rounded-lg shadow-sm p-3 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out">
                        <div class="flex items-center space-x-2">
                            <input id="hasEndDate" type="checkbox" class="form-checkbox h-5 w-5 text-indigo-600 rounded focus:ring-indigo-500 transition duration-150 ease-in-out" onclick="toggleEndDate()">
                            <label class="text-sm font-medium text-gray-800">Có thời gian kết thúc</label>
                        </div>
                        <input id="endDate" name="ngayKetThuc" type="date" class="block w-full border border-gray-300 rounded-lg shadow-sm p-3 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out" value="---" disabled>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-800">* Loại khuyến mãi</label>
                    <div class="relative mt-2">
                        <select name="loaiKM" class="block w-full border border-gray-300 rounded-lg shadow-sm p-3 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out">
                            <option value="Giảm giá sản phẩm">Giảm giá sản phẩm</option>
                            <option value="Giảm giá vận chuyển">Giảm giá vận chuyển</option>
                        </select>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <label class="block text-sm font-medium text-gray-800">Mức giảm</label>
                    <input type="number" id="discountInput" name="mucGiam" class="block w-full border border-gray-300 rounded-lg shadow-sm p-3 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out" value="0" oninput="updateDiscountVNĐ()">
                    <span class="text-sm font-medium text-gray-800">đ</span>
                </div>
                <div>
                    <p id="discountDisplay" class="text-sm text-gray-600 mt-2">Số tiền: 0 VNĐ</p>
                </div>
                <div>
                    <?php
                    $options = "";
                    if ($data["danhmuc"]) {
                        while ($row = $data["danhmuc"]->fetch_assoc()) {
                            $options .= "<option value='{$row['id_danhmuc']}'>{$row['ten_danhmuc']}</option>";
                        }
                    } else {
                        $options .= "<option value=''>Không có danh mục nào</option>";
                    }
                    ?>
                    <label class="block text-sm font-medium text-gray-800">Sản phẩm áp dụng</label>
                    <div class="relative mt-2">
                        <select name="danhMucID" class="block w-full border border-gray-300 rounded-lg shadow-sm p-3 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out">
                            <option>Chọn</option>
                            <?php echo $options; ?>
                        </select>
                    </div>
                </div>
                <!-- Điều kiện tối thiểu -->
                <div>
                    <label class="block text-sm font-medium text-gray-800">Điều kiện tối thiểu</label>
                    <div class="flex items-center space-x-4 mt-2">
                        <label class="flex items-center">
                            <input type="radio" name="condition_type" value="0" class="form-radio h-5 w-5 text-indigo-600 transition duration-150 ease-in-out" checked onclick="updateConditionValue(0)">
                            <span class="ml-2 text-sm font-medium text-gray-800">Không yêu cầu</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="condition_type" value="discount" class="form-radio h-5 w-5 text-indigo-600 transition duration-150 ease-in-out" onclick="updateConditionValue('discount')">
                            <span class="ml-2 text-sm font-medium text-gray-800">Giá trị mua tối thiểu</span>
                        </label>
                    </div>
                    <input type="number" id="conditionInput" name="dieuKien" class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm p-3 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out" disabled>
                </div>
                <div>
                    <p id="conditionDisplay" class="text-sm text-gray-600 mt-2">Số tiền: 0 VNĐ</p>
                </div>
            </div>
        </div>

        <script>
            function toggleEndDate() {
                const endDateInput = document.getElementById('endDate');
                const hasEndDateCheckbox = document.getElementById('hasEndDate');

                if (hasEndDateCheckbox.checked) {
                    endDateInput.disabled = false;
                    endDateInput.value = ''; // Xóa giá trị '---' khi ô input được kích hoạt
                } else {
                    endDateInput.disabled = true;
                    endDateInput.value = '---'; // Thiết lập lại giá trị khi ô input bị vô hiệu hóa
                }
            }

            function submitForm() {
                // Tạo một đối tượng FormData từ form
                const formData = new FormData();
                const inputs = document.querySelectorAll('input, select'); // Chọn tất cả các input và select

                inputs.forEach(input => {
                    formData.append(input.name, input.value); // Thêm giá trị vào FormData
                });

                // Gửi dữ liệu qua AJAX hoặc Form Submit
                fetch('your_server_endpoint.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.text())
                    .then(data => {
                        console.log(data); // Xử lý phản hồi từ server
                    })
                    .catch(error => console.error('Error:', error));
            }
        </script>

        <script>
            function updateDiscountVNĐ() {
                const discountValue = document.getElementById('discountInput').value;
                const discountDisplay = document.getElementById('discountDisplay');
                discountDisplay.textContent = `Số tiền: ${discountValue.replace(/\B(?=(\d{3})+(?!\d))/g, ".")} VNĐ`;
            }

            // Hàm thay đổi trạng thái của ô "Điều kiện tối thiểu" dựa trên lựa chọn radio button
            function updateConditionValue(condition) {
                const conditionInput = document.getElementById('conditionInput');
                const conditionDisplay = document.getElementById('conditionDisplay');

                if (condition === 0) {
                    // Nếu chọn "Không yêu cầu", disable input và đặt giá trị là 0
                    conditionInput.value = "0";
                    conditionInput.disabled = true;
                    conditionDisplay.textContent = `Số tiền: 0 VNĐ`;
                } else {
                    // Nếu chọn "Giá trị mua tối thiểu", enable input và cho phép nhập
                    conditionInput.disabled = false;
                    conditionInput.value = document.getElementById('discountInput').value;
                    updateConditionVNĐ(); // Cập nhật hiển thị số tiền
                }
            }

            // Hàm cập nhật số tiền VNĐ cho ô "Điều kiện tối thiểu"
            function updateConditionVNĐ() {
                const conditionValue = document.getElementById('conditionInput').value;
                const conditionDisplay = document.getElementById('conditionDisplay');
                conditionDisplay.textContent = `Số tiền: ${conditionValue.replace(/\B(?=(\d{3})+(?!\d))/g, ".")} VNĐ`;
            }

            // Lắng nghe sự kiện nhập dữ liệu vào ô "Điều kiện tối thiểu" khi nó được bật
            document.getElementById('conditionInput').addEventListener('input', updateConditionVNĐ);
        </script>
    </body>
</form>

</html>