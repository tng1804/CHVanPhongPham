<!DOCTYPE HTML>
<html>

<head>
    <style>
        /* Định dạng cho Header */
        header {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 24px;
        }

        /* Định dạng cho Sidebar */
        .sidebar {
            height: 100vh;
            width: 200px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #333;
            padding-top: 20px;
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
        }

        .sidebar a:hover {
            background-color: #575757;
        }

        /* Định dạng cho nội dung chính */
        .content {
            margin-left: 220px; /* Khoảng cách bên trái cho nội dung để không đè lên sidebar */
            padding: 20px;
        }
    </style>
    <script>
        window.onload = function() {
            var dataPoints = [];
            var options = {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Thống kê doanh thu theo tháng"
                },
                axisX: {
                    valueFormatString: "DD MMM YYYY"
                },
                axisY: {
                    title: "Tổng tiền bán (đ)",
                    titleFontSize: 24
                },
                data: [{
                    type: "spline",
                    yValueFormatString: "#,### đ",
                    dataPoints: dataPoints
                }]
            };

            function addData(data) {
                dataPoints.length = 0;
                for (var i = 0; i < data.length; i++) {
                    dataPoints.push({
                        x: new Date(data[i].date + "-01"),
                        y: parseFloat(data[i].units)
                    });
                }
                $("#chartContainer").CanvasJSChart(options);
            }

            document.getElementById("submitBtn").addEventListener("click", function() {
                var startDate = document.getElementById("startDate").value;
                var endDate = document.getElementById("endDate").value;
                if (startDate && endDate) {
                    $.getJSON(`/CHVanPhongPham/CheckoutController/thongketienngay?startDate=${startDate}&endDate=${endDate}`, addData);
                } else {
                    alert("Vui lòng chọn khoảng thời gian hợp lệ.");
                }
            });
        }
    </script>
</head>

<body>
    <!-- Header -->
    <header>
        Hệ thống Thống kê doanh thu
    </header>

    <!-- Sidebar bên trái -->
    <div class="sidebar">
        <a href="#home">Trang chủ</a>
        <a href="#sales">Doanh thu</a>
        <a href="#products">Sản phẩm</a>
        <a href="#reports">Báo cáo</a>
        <a href="#settings">Cài đặt</a>
    </div>

    <!-- Nội dung chính -->
    <div class="content">
        <label for="startDate">Start Date:</label>
        <input type="date" id="startDate" name="startDate">
        
        <label for="endDate">End Date:</label>
        <input type="date" id="endDate" name="endDate">

        <button id="submitBtn">Xem thống kê</button>

        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    </div>

    <!-- Script -->
    <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.canvasjs.com/jquery.canvasjs.min.js"></script>
</body>

</html>
