<?php
include(__DIR__ . '/../../views/header.php');
include(__DIR__ . '/../../views/Left_side.php');
?>
 <main class='app-content'>
       <div class='app-title'>
       <ul class='app-breadcrumb breadcrumb side'>
       <li class='breadcrumb-item active'><b>DS sản phẩm</b></li>
       </ul>
       </div>
<form METHOD="POST">
    <table>
        <tr>
            <td class="from-group col-md-3"><button type='submit' name='btntimkiemten'>Tìm kiếm</button><br><br>
            <select class="form-control" required="required" name="txtlc" id="">
                <option value="tenloaisp">Tên loại sản phẩm</option>
                <option value="id_loaisp">ID loại sản phẩm</option>
            </select>
            <input type='text' name = 'txttimkiem' id = 'txttimkiem'></td>
        </tr>
    </table>
  </form>
  <?php
  if($data["DL"]){
  if(mysqli_num_rows($data["DL"])>0){
       echo"  
      
       <div class='row'>
        <div class='col-md-12'>
            <div class='tile'>
                <div class='tile-body'>
                    <div class='row element-button'>
                   <div class='col-sm-12 d-flex justify-content-between'>
    
    <a class='btn btn-add btn-sm' onclick='xuatexcel()' title='Xuat_excel'>
        <i class='fas fa-file-excel'></i> Xuất Excel
    </a>
</div>

                      </div>
                    <div>
                      <table id='customers'>
                        <tr>
                          <th>STT</th>
                          <th>ID loại sản phẩm</th>                         
                          <th>Ten loại sản phẩm</th>
                          <th>Chức năng</th>
                        </tr>";
                        $coun=0;
        while($row = mysqli_fetch_assoc($data["DL"])){
            $coun++;
            echo "<tr>";
            echo "<td> " .$coun. "</td>";
            echo "<td> " .$row["id_loaisp"]. "</td>";
            echo "<td> " .$row['tenloaisp']. "</td>";
            echo "<td><a href='/CHVanPhongPham/LoaiSanPham/deleteLoaiSP/".$row['id_loaisp']."' class='btn btn-edit' type='button' title='Xóa'>Xóa
              </a>
              <a href='/CHVanPhongPham/LoaiSanPham/editLoaiSP/".$row['id_loaisp']."' class='btn btn-delete' type='button' title='Sửa'>Sửa</a>        
            </td>";
        }
        echo "</tbody>";

        
    }else{
        echo" Khong co du lieu";
    }
}

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script type="text/javascript">
     
     function xuatexcel() {
    var name = prompt("Nhập tên file của bạn", "Tên");
    exportData(name, '.xlsx');
}

function exportData(name, type) {
    // Tạo bản sao của bảng để thao tác xuất mà không thay đổi bảng gốc
    const table = document.getElementById("customers");
    const tableClone = table.cloneNode(true);

    // Loại bỏ cột cuối cùng từ bản sao
    const rows = tableClone.getElementsByTagName("tr");
    for (let i = 0; i < rows.length; i++) {
        const row = rows[i];
        if (row.cells.length > 0) {
            row.deleteCell(row.cells.length - 1); // Loại bỏ ô cuối cùng
        }
    }

    // Xuất bảng từ bản sao sang Excel
    const fileName = name + type;
    const wb = XLSX.utils.table_to_book(tableClone);
    XLSX.writeFile(wb, fileName);
}

    </script>

<script src="/CHVanPhongPham/lib/js/sheet.js"></script>
</body>
</html>
