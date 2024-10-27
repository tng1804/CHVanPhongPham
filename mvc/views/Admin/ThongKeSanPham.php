<!DOCTYPE HTML>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .input-section {
            margin-bottom: 20px;
        }
    </style>
    <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.canvasjs.com/jquery.canvasjs.min.js"></script>
    <script>
        window.onload = function() {
            var dataPoints = [];

            var options = {
                animationEnabled: true,
                title: {
                    text: "Top sản phẩm bán chạy nhất"
                },
                axisY: {
                    title: "Số lượng bán",
                    suffix: " sp"
                },
                axisX: {
                    title: "Sản phẩm"
                },
                data: [{
                    type: "column",
                    yValueFormatString: "#,##0 sp",
                    dataPoints: dataPoints
                }]
            };

            function fetchTopProducts(limit) {
                $.ajax({
                    url: '/CHVanPhongPham/CheckoutController/thongkeSP?limit=' + limit,
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        dataPoints.length = 0;
                        $.each(data, function(index, product) {
                            dataPoints.push({
                                label: product.label,
                                y: product.y
                            });
                        });
                        $("#chartContainer").CanvasJSChart(options);
                    },
                    error: function(xhr, status, error) {
                        alert("Có lỗi xảy ra khi lấy dữ liệu: " + error);
                    }
                });
            }

            document.getElementById("statBtn").addEventListener("click", function() {
                var limit = parseInt(document.getElementById("productLimit").value);
                if (isNaN(limit) || limit <= 0) {
                    alert("Vui lòng nhập một số hợp lệ.");
                } else {
                    fetchTopProducts(limit);
                }
            });
        }
    </script>
</head>

<body>
    <div class="input-section">
        <label for="productLimit">Số lượng sản phẩm muốn xem:</label>
        <input type="number" id="productLimit" name="productLimit" min="1" placeholder="Nhập số lượng">
        <button id="statBtn">Thống kê</button>
    </div>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
</body>

</html>