<?php 

class Database{

    private $host = DB_HOST;
    private $db_name = DB_NAME;
    private $user = DB_USER;
    private $pass = DB_PASS;
    
    // menggunakan database pdo
    private $dbh; // database handler
    private $stmt; // statement untuk query

    // conn
    public function __construct(){
        // data source name untuk conn
        $dsn = "mysql:host=" . $this->host .";dbname=" . $this->db_name;

        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        // try block exception
        try {
            // connect pdo || option untuk optimasi database
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    // query
    public function query($query){

        $this->stmt = $this->dbh->prepare($query);
    }

    // bind agar tidak kena sql injection
    public function bind($param, $value, $type = null){
        
        if( is_null($type) ){
            
            switch( true ){

                case is_int($value) :
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value) :
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value) :
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    // execute
    public function execute(){   
        $this->stmt->execute();
    }

    // mengambil isi semua table
    public function resultSet(){
        
        // execute ambil dari method diatas
        $this->execute();
        // kalo mysqli_fetch_assoc || PDO seperti ini
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // mengambil isi satu table 
    public function singleSet(){

        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    // untuk menampilkan ada berapa data yang diubah
    public function rowCount(){
        return $this->stmt->rowCount();
    }

}