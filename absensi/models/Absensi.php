<?php
class Absensi {
    private $conn;
    private $table = "absensi";

    public $id;
    public $nama_karyawan;
    public $tanggal;
    public $waktu_masuk;
    public $waktu_keluar;
    public $status;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . " 
                 SET nama_karyawan=:nama_karyawan, 
                     tanggal=:tanggal,
                     waktu_masuk=:waktu_masuk,
                     status=:status";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nama_karyawan", $this->nama_karyawan);
        $stmt->bindParam(":tanggal", $this->tanggal);
        $stmt->bindParam(":waktu_masuk", $this->waktu_masuk);
        $stmt->bindParam(":status", $this->status);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY tanggal DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function update() {
        $query = "UPDATE " . $this->table . "
                SET waktu_keluar = :waktu_keluar
                WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':waktu_keluar', $this->waktu_keluar);
        $stmt->bindParam(':id', $this->id);
        
        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
