<?php
class Supplier extends Controller 
{
    public function SayHi(){
        $spl = $this->model("SupplierModel");
        $this->Show();
    }
    function Show(){
        $spl = $this->model("SupplierModel");

        $this->view("Admin/Home_Supplier",
        ["SPL"=>$spl->listSupplier()]);
    }

    function Add(){
        $spl = $this->model("SupplierModel");
        $this->view("Admin/Add_Supplier",
        ['SPL'=>$spl->addSupplier()]);
        // $spl->addSupplier();
    }
    function Edit($idNCC){
        $spl = $this->model("SupplierModel");
        $this->view("Admin/Edit_Supplier", [
            "SPL" => $spl->showEdit($idNCC),
            
        ]);
        $spl->editSupplier($idNCC);
    }
    function Delete($id_nhanvien){
        $spl = $this->model("SupplierModel");
        $spl->deleteSPL($id_nhanvien);
    }
    function Sort()
    {
        $spl = $this->model("SupplierModel");
        $this->view("Admin/Sort_Supplier", [
        "SPL" => $spl->SortSPL()]);
    }
    function Search(){
        $spl = $this->model("SupplierModel");
        $this->view("Admin/Search_Supplier", ["SPL"=>$spl->searchSPL()]);
    }
}
?>