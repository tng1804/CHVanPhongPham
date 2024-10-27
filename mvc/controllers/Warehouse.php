<?php
class Warehouse extends Controller 
{
    public function SayHi(){
        $wh = $this->model("WarehouseModel");
        $this->Show();
    }
    function Show(){
        $wh = $this->model("WarehouseModel");

        $this->view("Admin/Home_Warehouse",
        ["WH"=>$wh->listWarehouse()]);
    }

    function Add(){
        $wh = $this->model("WarehouseModel");
        $this->view("Admin/Add_Warehouse",
        ['SPL'=>$wh->addWarehouse()]);
        // $wh->addWarehouse();
    }
    function Edit($idNCC){
        $wh = $this->model("WarehouseModel");
        $this->view("Admin/Edit_Warehouse", [
            "WH" => $wh->showEdit($idNCC),
            
        ]);
        $wh->editWarehouse($idNCC);
    }
    function Delete($id_nhanvien){
        $wh = $this->model("WarehouseModel");
        $wh->deleteWH($id_nhanvien);
    }
    function Sort()
    {
        $wh = $this->model("WarehouseModel");
        $this->view("Admin/Sort_Warehouse", [
        "WH" => $wh->SortWH()]);
    }
    function Search(){
        $wh = $this->model("WarehouseModel");
        $this->view("Admin/Search_Warehouse", ["WH"=>$wh->searchWH()]);
    }
}
?>