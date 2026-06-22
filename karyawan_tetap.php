<?php
require_once 'karyawan.php';

class KaryawanTetap extends Karyawan {
    // Properti tambahan spesifik karyawan tetap
    private $tunjanganKesehatan;
    private $opsiSahamID;

    // Konstruktor untuk memetakan data dari database ke properti objek
    public function __construct($data) {
        parent::__construct();
        $this->id_karyawan         = $data['id_karyawan'];
        $this->nama_karyawan       = $data['nama_karyawan'];
        $this->departemen           = $data['departemen'];
        $this->hariKerjaMasuk       = $data['hari_kerja_masuk'];
        $this->gajiDasarPerHari     = $data['gaji_dasar_per_hari'];
        
        // Memetakan properti spesifik
        $this->tunjanganKesehatan  = $data['tunjangan_kesehatan'];
        $this->opsiSahamID          = $data['opsi_saham_id'];
    }

    // Metode Query Spesifik (Berbasis Static agar aman dari warning)
    public static function getDaftarTetap() {
        $db = new Database();
        $query = "SELECT * FROM tabel_karyawan WHERE jenis_karyawan = 'tetap'";
        $result = $db->koneksi->query($query);
        
        $daftar = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $daftar[] = new KaryawanTetap($row);
            }
        }
        return $daftar;
    }

    // Implementasi wajib dari metode abstrak induk
    public function hitungGajiBersih() {
        return $this->hariKerjaMasuk * $this->gajiDasarPerHari;
    }

    public function tampilkanProfilKaryawan() {
        return "ID Saham: " . $this->opsiSahamID . " | Tunjangan Kes: Rp " . number_format($this->tunjanganKesehatan, 0, ',', '.');
    }

    // Fungsi Getter untuk Dashboard View
    public function getId() { return $this->id_karyawan; }
    public function getNama() { return $this->nama_karyawan; }
    public function getDepartemen() { return $this->departemen; }
    public function getHariKerja() { return $this->hariKerjaMasuk; }
    public function getGajiDasar() { return $this->gajiDasarPerHari; }
}
?>