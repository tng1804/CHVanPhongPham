<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lí đơn hàng</title>
  <link rel="stylesheet" type="text/css" href="/css/main.css">
  <link rel="stylesheet" type="text/css" href="/css/base.css">
  <link rel="stylesheet" type="text/css" href="/css/css.css">
  <link rel="stylesheet" type="text/css" href="/css/error_page.css">
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <link rel="stylesheet" type="text/css" href="/css/responsive.scss">
  <link rel="stylesheet" type="text/css" href="/css/util.css">
  <link rel="stylesheet" type="text/css" href="/themify-icons-font/themify-icons/themify-icons.css">

</head>
<body>
  
</body>
</html> -->
<?php
include "header.php";
include "Left_side.php";
// include "class/product_class.php";
// include "helper/format.php";

//$product = new product();
//  ======== Thông tin tất cả các đơn hàng  ============
//      function show_orderAll(){
//         $conn = mysqli_connect("localhost","root","","cuahangtienloi");
//         $query = "SELECT * FROM tbl_payment ";
//         $result = mysqli_query($conn,$query);
//         return $result;
//     }

//     // ========== Chi tiết đơn hàng  ==========
//      function show_order_detail($order_ma){
//         $conn = mysqli_connect("localhost","root","","cuahangtienloi");
//         $query = "SELECT * FROM tbl_carta WHERE session_idA = '$order_ma' ORDER BY carta_id DESC";
//         $result = mysqli_query($conn,$query);
//         return $result;
//     }
// $fm = new Format();
?>

      <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>DS đơn hàng</b></a></li>
                <!-- <li class="breadcrumb-item active"><a href="orderlistdone.php"><b>Đã hoàn thành</b></a></li>
                <li class="breadcrumb-item active"><a href="orderlist.php"><b>Chưa hoàn thành</b></a></li> -->
                
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                           <h1>Tất cả các đơn hàng:</h1>
                        </div>
                        <div>
                          <table id="customers">
                            <tr>
                              <th>STT</th>
                              <th>Mã đơn hàng</th>
                              <th>Ngày đặt hàng</th>
                              <th>ID khách hàng</th>
                              <!-- <th>Thông tin khách hàng</th> -->
                              <th>Giao hàng</th>
                              <th>Thanh toán</th>
                              <th>Chi tiết đơn hàng</th>
                              <th>Chức năng</th>
                            </tr>
                            <?php
                            // $show_orderAll = show_orderAll();
                            if(mysqli_num_rows($data["DH"])>0){
                              $i=0;
                            while($result = mysqli_fetch_assoc($data["DH"])){$i++;
                            ?>
                          <tr>
                            <td> <?php echo $i ?></td>
                            <!-- <td><?php //$ma = substr($result['session_idA'],0,8); echo $ma   ?></td> -->
                            <td><?php echo $result['payment_id']?></td>
                            <td><?php echo $result['order_date']?></td>
                            <td><?php echo $result['register_id']?></td>    
                            <td><?php echo $result['giaohang']  ?></td>
                            <td><?php echo $result['thanhtoan'] ?></td>
                            <td class="td-list"><a href="/VanPhongPham/DonHang/ShowdetailDH/<?php echo $result['session_idA'] ?>"> Xem </a></td>
                            
                            <td><a href="/VanPhongPham/DonHang/deleteDH/<?php echo $result['payment_id'] ?>" onclick="return confirm('Đơn hàng sẽ bị xóa vĩnh viễn, bạn có chắc muốn tiếp tục không?');" class="btn btn-edit" type="button" title="Xóa"><i class="fas ti-trash">Xóa</i></a>                     
                          </td>
                          </tr>
                          <?php
                            }echo "<h3>Tổng:  ".$i."</h3>";}
                          ?>
                          </table>
                          
                        </div>
                        
                    </div>
                    
                </div>
    </main>

</body>
</html>
