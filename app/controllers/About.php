<?php 

class About extends Controller{
    
    // method default
    public function index($nama = "Handoko Adji Pangestu", $pekerjaan = "Gamer", $umur = 21){
        
        $data["nama"] = $nama;
        $data["pekerjaan"] = $pekerjaan;
        $data["umur"] = $umur;

        // dikirim ke header
        $data["judul"] = "About";
        
        $this->view("templates/header", $data);
        $this->view("about/index", $data);
        $this->view("templates/footer");
    }

    public function page(){
        
        // dikirim ke header
        $data["judul"] = "Page";
        
        $this->view("templates/header", $data);
        $this->view("about/page");
        $this->view("templates/footer");
    }
}