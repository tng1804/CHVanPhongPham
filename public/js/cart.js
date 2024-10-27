$(document).ready(function () {
    $("#btn-addCart").on('click', function (e) {
        e.preventDefault();

        var formData = $("#cart-form").serialize();

        $.ajax({
            url: 'http://localhost/CHVanPhongPham/HomeUser/postCart',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function (response) {
                $("#message").html("<p>" + response.message + "</p>");
                var count = parseInt($('#productCart').text(), 10);
                // Lấy số lượng sản phẩm mới từ phản hồi hoặc từ formData
                //var newQuantity = parseInt($('input[name="soluong"]').val(), 10); // Lấy số lượng từ input trong form
                // Tính tổng số lượng mới
                var countNew = count + 1;
                $('#productCart').text(countNew);
                // In ra số lượng mới ra console để kiểm tra
                console.log("Số lượng mới trong giỏ hàng:", countNew);
            },
            error: function (xhr, status, error) {
                $("#message").html("<p>Đã xảy ra lỗi khi thêm vào giỏ hàng.</p>");
            }
        });
    });
    // hidden message
    setTimeout(function () {
        var messageDiv = $('#message');
        if (messageDiv) {
            messageDiv.hide();
        }
    }, 5000);

    $('.qty-input').on('change', function () {
        var cart_id = $(this).data('cart-id');
        var quantity = $(this).val();

        $.ajax({
            url: 'http://localhost/CHVanPhongPham/HomeController/updateCart',
            type: 'POST',
            data: {
                cart_id: cart_id,
                quantity: quantity
            },
            success: function (response) {
                var result = JSON.parse(response);

                if (result.success) {
                    // Cập nhật giá trị subtotal và tổng giá trong DOM
                    $('#subtotal-' + cart_id).html(result.subtotal + ' đ');
                    $('#total-price').html(result.total + ' đ');
                    $('#total-payment').html(result.total + ' đ');

                } else {
                    alert(result.message);
                }
            },
            error: function () {
                alert('Đã có lỗi xảy ra khi cập nhật.');
            }
        });
    });

    $('#deleteAllBtn').on('click', function () {
        var confirmation = confirm("Bạn có chắc chắn muốn xóa tất cả sản phẩm khỏi giỏ hàng ?");
        if (confirmation == true) {
            // Nếu người dùng chọn OK, form sẽ được submit
            $('#deleteAllForm').submit();
        } else {
            // Nếu người dùng chọn Cancel, không làm gì cả
            console.log("Hủy thao tác xóa.");
        }
    });
    function updateCartCount() {
        $.ajax({
            url: "http://localhost/CHVanPhongPham/HomeUser/sumCart", // Đường dẫn tới hàm sumCart trong controller của bạn
            method: "GET", // Hoặc "POST" tùy thuộc vào cấu trúc của bạn
            success: function (response) {
                let count = JSON.parse(response); // Phân tích chuỗi JSON nhận được từ PHP
                $('#productCart').text(count); // Đổ dữ liệu vào thẻ a có id là cart-count
                console.log(count);
            },
            error: function (xhr, status, error) {
                console.error("Lỗi khi lấy số lượng sản phẩm trong giỏ:", error);
            }
        });
    }
    updateCartCount();

})
