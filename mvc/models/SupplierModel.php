<?php
class SupplierModel extends DB{
    public function listSupplier()
    {
        $sql = "SELECT * FROM tblsupplier";
        return $result = mysqli_query($this->con, $sql);
    }
    public function addSupplier(){
      if($_SERVER['REQUEST_METHOD']== "POST" || isset($_POST['btnsubmit'])){              
          $tenNCC = $_POST['tenNCC'];
          $diachi = $_POST['diachi'];
          $sdt = $_POST['sdt'];
          $masothue = $_POST['masothue'];
          $trangthai = $_POST['trangthai'];
          if(empty($tenNCC) || empty($diachi) || empty($sdt)|| empty($masothue) ||empty($trangthai)){
              echo "<script type = 'text/javascript'>alert('Vui lòng nhập đầy đủ thông tin');
              </script>";
              return;
          }else{
          
          $sql = "INSERT INTO tblsupplier VALUES ('','".$tenNCC."','".$diachi."','".$sdt."','".$masothue."','".$trangthai."')";
          $result = mysqli_query($this->con, $sql);
          
          if(!$result){
              echo "<script type='text/javascript'>alert('Thêm nhà cung cấp thất bại')</script>";
          } else {
              echo "<script type='text/javascript'>alert('Thêm nhà cung cấp thành công');
              window.history.pushState(null, '', '/CHVanPhongPham/Supplier/Show');
              window.location.href = '/CHVanPhongPham/Supplier/Show';
              </script>";
          }
        }
      }
  }
     public function showEdit($idNCC){
        $sql = "SELECT * FROM tblsupplier WHERE idNCC = '" .$idNCC. "'";
        return $result = mysqli_query($this->con,$sql);
    }
    public function editSupplier($idNCC){       
        if($_SERVER['REQUEST_METHOD']=="PUT" || isset($_POST["btnsubmit"])){
            $tenNCC = $_POST['tenNCC'];
            $diachi = $_POST['diachi'];
            $sdt = $_POST['sdt'];
            $masothue = $_POST['masothue'];
            $trangthai = $_POST['trangthai'];
            $sql = "UPDATE tblsupplier SET
             tenNCC = '".$tenNCC."',
             diachi = '".$diachi."',
             sdt = '".$sdt."',
             masothue = '".$masothue."',
             trangthai = '".$trangthai."'
             WHERE idNCC = '".$idNCC."'";
            $result = mysqli_query($this->con,$sql);
            if(!$result){
                echo "Update error" . mysqli_error($this->con);
            }
            else{
                echo " 
                <script> 
                alert('Sửa nhà cung cấp thành công');
                window.history.pushState(null, '', '/CHVanPhongPham/Supplier/Show');
                window.location.href = '/CHVanPhongPham/Supplier/Show';
                </script>";
            }
        }            
}
      public function deleteSPL($idNCC){
            $sql = "DELETE FROM tblsupplier WHERE idNCC ='" .$idNCC."'";
            $result = mysqli_query($this->con,$sql);
            if(!$result){
                echo "Delete error" .mysqli_error($this->con);
            }
            else{
                echo "<script type = 'text/javascript'>alert('Xóa nhà cung cấp thành công');
                window.history.pushState(null, '', '/CHVanPhongPham/Supplier/Show');
                window.location.href = '/CHVanPhongPham/Supplier/Show';
                </script>";
            }

    }
    public function SortSPL()
    {
        $qr = "SELECT * FROM tblsupplier ORDER BY tenNCC ASC";
        return mysqli_query($this->con, $qr);
    }
    public function searchSPL(){
        if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btntimkiemten']))
    {
        $tk = $_POST['txttimkiem'];
        $lc= $_POST['txtlc'];
        if($lc=="tenNCC")
    {
        $sql = "SELECT * FROM tblsupplier WHERE tenNCC LIKE '%$tk%' ORDER BY tenNCC";
    }
    else{
        $sql = "SELECT * FROM tblsupplier WHERE masothue  LIKE '%$tk%' ORDER BY masothue";
    }
     return $result = mysqli_query($this->con,$sql);
    }   
    }
}
?>