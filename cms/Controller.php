 
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class Controller{


    public function model($model){

        require_once "../app/models/".$model.".php";

        return new $model;
    }

    public function view($view,$data=[]){

        if(file_exists("../app/views/".$view.".php")){

            require_once "../app/views/".$view.".php";

        }else{
            die($view." view dosen't exist");
        }
    }
}