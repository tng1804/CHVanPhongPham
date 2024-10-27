<?php 
    class Controller{
        public function model($model){
            require_once "./mvc/models/".$model.".php";
            return new $model;
        }

        public function view($view, $data=[]){
            require_once "./mvc/views/".$view.".php";

        }
        public function viewUser($view, $data=[], $dataheader = []){
            require_once "./mvc/views/Customer/".$view.".php";

        }
        public function viewAdmin($view, $data=[]){
            require_once "./mvc/views/Admin/".$view.".php";

        }
    }
?>