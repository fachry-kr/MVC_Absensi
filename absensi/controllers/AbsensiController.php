<?php
require_once 'models/Absensi.php';

class AbsensiController {
    private $absensi;

    public function __construct($db) {
        $this->absensi = new Absensi($db);
    }

    public function index() {
        $result = $this->absensi->read();
        include 'views/absensi/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->absensi->nama_karyawan = $_POST['nama_karyawan'];
            $this->absensi->tanggal = date('Y-m-d');
            $this->absensi->waktu_masuk = date('H:i:s');
            $this->absensi->status = 'Hadir';

            if($this->absensi->create()) {
                header("Location: index.php");
            }
        }
        include 'views/absensi/create.php';
    }

    public function checkout() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->absensi->id = $_POST['id'];
            $this->absensi->waktu_keluar = date('H:i:s');

            if($this->absensi->update()) {
                header("Location: index.php");
            }
        }
    }
}