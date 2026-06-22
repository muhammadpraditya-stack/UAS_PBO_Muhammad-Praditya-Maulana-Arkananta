<?php
require_once 'karyawan.php';

class KaryawanKontrak extends Karyawan {
    // Properti tambahan spesifik karyawan kontrak
    private $durasiKontrakBulan;
    private $agensiPenyalur;

    // Konstruktor untuk memetakan data dari database ke properti objek
    public function __construct($data) {
        parent::__construct();
        $this->id_karyawan         = $data['id_karyawan'];
        $this->nama_karyawan       = $data['nama_karyawan'];
        $this->departemen           = $data['departemen'];
        $this->hariKerjaMasuk       = $data['hari_kerja_masuk'];
        $this->gajiDasarPerHari     = $data['gaji_dasar_per_hari'];
        
        // Memetakan properti spesifik
        $this->durasiKontrakBulan  = $data['durasi_kontrak_bulan'];
        $this->agensiPenyalur       = $data['agensi_penyalur'];
    }

    // Metode Query Spesifik (Berbasis Static agar aman dari warning)
    public static function getDaftarKontrak() {
        $db = new Database();
        $query = "SELECT * FROM tabel_karyawan WHERE jenis_karyawan = 'kontrak'";
        $result = $db->koneksi->query($query);
        
        $daftar = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $daftar[] = new KaryawanKontrak($row);
            }
        }
        return $daftar;
    }

    // Implementasi wajib dari metode abstrak induk
    public function hitungGajiBersih() {
        // Rumus awal standar: hari kerja dikali gaji per hari
        return $this->hariKerjaMasuk * $this->gajiDasarPerHari;
    }

    public function tampilkanProfilKaryawan() {
        return "Durasi: " . $this->durasiKontrakBulan . " Bulan | Agensi: " . $this->agensiPenyalur;
    }

    // Fungsi Getter untuk Dashboard View
    public function getId() { return $this->id_karyawan; }
    public function getNama() { return $this->nama_karyawan; }
    public function getDepartemen() { return $this->departemen; }
    public function getHariKerja() { return $this->hariKerjaMasuk; }
    public function getGajiDasar() { return $this->gajiDasarPerHari; }
}
?>