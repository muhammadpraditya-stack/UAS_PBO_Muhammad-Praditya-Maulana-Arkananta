<?php
require_once 'karyawan.php';

class KaryawanKontrak extends Karyawan {
    private $durasiKontrakBulan;
    private $agensiPenyalur;

    public function __construct($data) {
        parent::__construct();
        $this->id_karyawan         = $data['id_karyawan'];
        $this->nama_karyawan       = $data['nama_karyawan'];
        $this->departemen           = $data['departemen'];
        $this->hariKerjaMasuk       = $data['hari_kerja_masuk'];
        $this->gajiDasarPerHari     = $data['gaji_dasar_per_hari'];
        $this->durasiKontrakBulan  = $data['durasi_kontrak_bulan'];
        $this->agensiPenyalur       = $data['agensi_penyalur'];
    }

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

    // =========================================================================
    // METHOD OVERRIDING - KARYAWAN KONTRAK
    // =========================================================================
    public function hitungGajiBersih() {
        // Gaji murni dari kehadiran
        return $this->hariKerjaMasuk * $this->gajiDasarPerHari;
    }

    public function tampilkanProfilKaryawan() {
        return "Durasi: " . $this->durasiKontrakBulan . " Bulan | Agensi: " . $this->agensiPenyalur;
    }

    public function getId() { return $this->id_karyawan; }
    public function getNama() { return $this->nama_karyawan; }
    public function getDepartemen() { return $this->departemen; }
    public function getHariKerja() { return $this->hariKerjaMasuk; }
    public function getGajiDasar() { return $this->gajiDasarPerHari; }
}
?>