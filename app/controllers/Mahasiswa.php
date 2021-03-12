<?php 

class Mahasiswa extends Controller{

    public function index(){

    $data["judul"] = "Daftar Mahasiswa";
    // model didapat dari controller
    $data["mhs"] = $this->model("Mahasiswa_model")->getAllMahasiswa();

    $this->view("templates/header", $data);
    $this->view("mahasiswa/index", $data);
    $this->view("templates/footer");
    }

    public function detail($id){

        $data["judul"] = "Profile Mahasiswa";
        $data["mhs"] = $this->model("Mahasiswa_model")->getMahasiswaById($id);
        $this->view("templates/header", $data);
        $this->view("mahasiswa/detail", $data);
        $this->view("templates/footer");
    }

    public function tambah(){
        // jika ada data yang berubah
        if( $this->model("mahasiswa_model")->tambahData($_POST) > 0 ){
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function hapus($id){
        if( $this->model("mahasiswa_model")->hapusData($id) > 0) {
            Flasher::setFlash("berhasil", "dihapus", "success");
            header("Location: " . BASEURL . "/mahasiswa");
            exit;
        } else {
            Flasher::setFlash("gagal", "dihapus", "success");
            header("Location: " . BASEURL . "/mahasiswa");
            exit;
        }
    }

    public function getUbah(){
        // merubah array jadi json object
        echo json_encode($this->model("mahasiswa_model")->getMahasiswaById($_POST["id"]));
    }

    public function ubah(){
        // json encode agar data berubah menjadi object json
        if( $this->model("mahasiswa_model")->ubahData($_POST) > 0 ){
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function cari(){
        $data["judul"] = "Daftar Mahasiswa";
        // model didapat dari controller
        $data["mhs"] = $this->model("Mahasiswa_model")->cariDataMahasiswa();

        $this->view("templates/header", $data);
        $this->view("mahasiswa/index", $data);
        $this->view("templates/footer");
    
    }
}