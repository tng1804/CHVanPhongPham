<?php
class Question extends Controller
{
    function SayHi()
    {
        $QT_Model = $this->model("QuestionModel");
        $this->view("questionList", ["QT" => $QT_Model->ListQT()
    ]);
    }
    function listQT()
    {
        // Gọi ra model
        $QT_Model = $this->model("QuestionModel");
        $this->view("questionList", ["QT" => $QT_Model->ListQT()
    ]);
    }
    function SortQT()
    {
        // Gọi ra model
        $QT_Model = $this->model("QuestionModel");
        $this->view("questionSort", ["QT" => $QT_Model->SortQT()
    ]);

    }

    function AddQT(){
        // Gọi ra model
        $QT_Model = $this->model("QuestionModel");
        $this->view("questionAdd", ["QT" => $QT_Model->AddQT()
    ]);
    }
    function UpdateQT($id){
        // Gọi ra model
        $QT_Model = $this->model("QuestionModel");
        $this->view("questionUpdate", ["GetQT" => $QT_Model->GetQT($id),
        "UpdateQT"=>$QT_Model->UpdateQT($id)
    ]);
    }

    function DeleteQT($id){
        $QT_Model = $this->model("QuestionModel");
        $QT_Model->DeleteQT($id);
    }

    function SearchQT(){
        $QT_Model = $this->model("QuestionModel");
        $this->view("questionSearch", ["QT" => $QT_Model->SearchQT()]);
    }
}
