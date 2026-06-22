<?php

class Database {
    private $host     = "localhost";
    private $username = "root";
    private $password = ""; // Kosongkan jika menggunakan XAMPP bawaan
    
    // UBAH BARIS INI SESUAI NAMA DATABASE UAS ANDA:
    private $database = "db_uas_pbo_ti1c_muhammad praditya maulana arkananta"; 
    public $koneksi;

    public function __construct() {
        $this->koneksi = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->koneksi->connect_error) {
            die("Koneksi ke database gagal: " . $this->koneksi->connect_error);
        }
    }
}
?>