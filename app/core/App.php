<?php 

class App {
    
    // untuk controller, method, dan params default dalam url
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];


    public function __construct(){
        // memanggil parseUrl
        $url = $this->parseUrl();

        // cek apakah ada yang diketikan di url dengan folder controllers || dimulai dari index public
        if( file_exists("../app/controllers/" . $url[0] . ".php") ) {
            // jika ada gunakan url baru tapi jika tidak makan controller akan default seperti property diatas
            $this->controller = $url[0];
            unset($url[0]);
       }

        // memanggil controllers home.php    
        require_once "../app/controllers/" . $this->controller . ".php";
        // instansiasi method yang ada di home.php || ubah home jadi object
        $this->controller = new $this->controller;
        
        // jika ada method, kalau tidak ada maka akan menjalakan method default
        if( isset($url[1]) ){
            // cek apakah di controller home ada method yang di tulis di url
            if(method_exists($this->controller, $url[1])){
                // jika ada isikan method dengan yang ditulis di url, tapi jika tidak maka method default
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // jika controllers dan method masih ada, maka itu adalah parameter
        if( !empty($url) ){
            // untuk mengisi variable dengan array
            $this->params = array_values($url);
        }

        // untuk menjalankan controller, method, dan mengirim params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    // untuk mengambil data yang di tulis di url -> lalu menulis ulang url dengan teknik untuk menkonfigurasi direcktori dengan .htaccess untuk prety url dengan cara di parse
    public function parseUrl(){
        if( isset($_GET["url"]) ){
            $url = $_GET["url"];
            
            // rtrim untuk menghilangkan / di akhir
            $url = rtrim($_GET["url"], "/");
            
            // filter var untuk menghilangkan character sql injection
            $url = filter_var($_GET["url"], FILTER_SANITIZE_URL);
            
            $url = explode("/", $url);
            
            return $url;
        }
    }

}
