<?php
require_once 'controller.php';
class Home extends Controller{

    function __construct()
    {
      
    }

    function index(){
         
      $model=$this->model("Post");
      $data=$model->select();

   
        echo "<h1>index of home</h1>";
        $this->view("home",$data);

    }

}
?>