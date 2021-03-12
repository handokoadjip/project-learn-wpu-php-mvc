<?php 

class Mahasiswa_model{

    // private $mahasiswa = [
    //     [
    //         "nama" => "Handoko Adji Pangestu",
    //         "nim" => "11217052",
    //         "email" => "Handokoadjip@gmail.com",
    //         "jurusan" => "Teknik Informatika"
    //     ],
        
    //     [
    //         "nama" => "Mahmud Setyo Aji",
    //         "nim" => "11114052",
    //         "email" => "Mahmudaji@gmail.com",
    //         "jurusan" => "Teknik Mesin"
    //     ],
        
    //     [
    //         "nama" => "Iqbal Rizal",
    //         "nim" => "11213062",
    //         "email" => "Beehive@gmail.com",
    //         "jurusan" => "Teknik Bangunan"
    //     ]
    // ];

    // menggunakan database pdo tanpa database wrapper
    // private $dbh; // database handler
    // private $stmt; // statement untuk query

    // public function __construct(){
    //     // data source name untuk conn
    //     $dsn = "mysql:host=localhost;dbname=phpmvc";

    //     // try block exception
    //     try {
    //         // connect pdo
    //         $this->dbh = new PDO($dsn, 'root', '');
    //     } catch (PDOException $e) {
    //         die($e->getMessage());
    //     }
    // }
    
    // public function getAllMahasiswa(){
        
        //     // query
        //     $this->stmt = $this->dbh->prepare("SELECT * FROM mahasiswa");
        //     // execute
        //     $this->stmt->execute();
        
        //     return $this->stmt->fetchAll(ARRAY_ASSOC);
        
    // }
    private $table = "mahasiswa";
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllMahasiswa(){
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }
    
    public function getMahasiswaById($id){
        // tidak langsung di masukan $id. di bind dahulu agar aman dari sql injection
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id=:id");
        $this->db->bind('id', $id);
        return $this->db->singleSet();
    }

    public function tambahData($data){
        $query = "INSERT INTO " . $this->table . " 
                    VALUES 
                ('', :nama, :nim, :email, :jurusan)";
        
            $this->db->query($query);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('nim', $data['nim']);
            $this->db->bind('email', $data['email']);
            $this->db->bind('jurusan', $data['jurusan']);

            $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusData($id){
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahData($data){
        $query = "UPDATE mahasiswa SET
                nama = :nama, 
                nim = :nim, 
                email = :email,
                jurusan = :jurusan
                WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cariDataMahasiswa(){
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM " . $this->table . " WHERE nama LIKE :nama";
        $this->db->query($query);
        $this->db->bind("nama", "%$keyword%");

        return $this->db->resultSet();
    }

}