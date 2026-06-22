<?php
// Menyisipkan file koneksi database
require_once 'koneksi.php';

abstract class Karyawan extends Database {
    // Atribut Global Terenkapsulasi (protected)
    protected $id_karyawan;
    protected $nama_karyawan;
    protected $departemen;
    protected $hariKerjaMasuk;
    protected $gajiDasarPerHari;

    // Constructor untuk mewarisi koneksi database induk
    public function __construct() {
        parent::__construct();
    }

    // =========================================================================
    // METODE ABSTRAK (Wajib Diimplementasikan oleh Seluruh Kelas Anak)
    // =========================================================================
    
    // Melakukan kalkulasi take-home pay bersih sesuai formula masing-masing jenis karyawan
    abstract public function hitungGajiBersih();

    // Mencetak informasi profil dasar beserta spesifikasi unik bawaan kelas anak
    abstract public function tampilkanProfilKaryawan();
}
?>