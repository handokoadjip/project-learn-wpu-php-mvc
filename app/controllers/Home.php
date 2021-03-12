<?php 

// bisa di extends karena sudah di panggil di app
class Home extends Controller {
    
    // untuk menjadikan method default nya
    public function index(){

        // dikirim ke header
        $data["judul"] = "Home";

        // mengirim data dari models
        // menjalankan class sekaligus instan model dan mengambil methodnya
        $data["nama"] = $this->model("User_model")->getUser();

        // memanggil header
        $this->view("templates/header", $data);
        // memanggil views nya
        $this->view('home/index', $data);
        // memanggil footer
        $this->view("templates/footer");
    }
}