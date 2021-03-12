<?php 
// di require di inits

// beda dengan folder controllers || parents dari folder controllers
class Controller {

    public function view($view, $data = []){
        
        // memanggil views yang di tentukan
        require_once "../app/views/" . $view . ".php";
    }

    public function model($model){
        require_once "../app/models/" . $model . ".php";
        return new $model;
    }
}
