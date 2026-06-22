<?php

class Database {
    private $host     = "localhost";
    private $username = "root";
    private $password = ""; // Kosongkan jika menggunakan XAMPP bawaan
    private $database = "DB_UAS_PBO_TI 1C_Muhammad Praditya Maulana Arkananta"; 
    public $koneksi;

    public function __construct() {
        $this->koneksi = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->koneksi->connect_error) {
            die("Koneksi ke database gagal: " . $this->koneksi->connect_error);
        }
    }
}
?>