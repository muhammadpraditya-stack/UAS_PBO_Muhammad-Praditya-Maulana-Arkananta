<?php
require_once 'karyawan.php';

class KaryawanMagang extends Karyawan {
    private $uangSakuBulanan;
    private $sertifikatKampusMerdeka;

    public function __construct($data) {
        parent::__construct();
        $this->id_karyawan         = $data['id_karyawan'];
        $this->nama_karyawan       = $data['nama_karyawan'];
        $this->departemen           = $data['departemen'];
        $this->hariKerjaMasuk       = $data['hari_kerja_masuk'];
        $this->gajiDasarPerHari     = $data['gaji_dasar_per_hari'];
        $this->uangSakuBulanan     = $data['uang_saku_bulanan'];
        $this->sertifikatKampusMerdeka = $data['sertifikat_kampus_merdeka'];
    }

    public static function getDaftarMagang() {
        $db = new Database();
        $query = "SELECT * FROM tabel_karyawan WHERE jenis_karyawan = 'magang'";
        $result = $db->koneksi->query($query);
        $daftar = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $daftar[] = new KaryawanMagang($row);
            }
        }
        return $daftar;
    }

    // =========================================================================
    // METHOD OVERRIDING - KARYAWAN MAGANG
    // =========================================================================
    public function hitungGajiBersih() {
        // Kehadiran harian dipotong 20% (sisa 80%)
        return ($this->hariKerjaMasuk * $this->gajiDasarPerHari) * 0.80;
    }

    public function tampilkanProfilKaryawan() {
        return "Uang Saku: Rp " . number_format($this->uangSakuBulanan, 0, ',', '.') . " | SK: " . $this->sertifikatKampusMerdeka;
    }

    public function getId() { return $this->id_karyawan; }
    public function getNama() { return $this->nama_karyawan; }
    public function getDepartemen() { return $this->departemen; }
    public function getHariKerja() { return $this->hariKerjaMasuk; }
    public function getGajiDasar() { return $this->gajiDasarPerHari; }
}
?>