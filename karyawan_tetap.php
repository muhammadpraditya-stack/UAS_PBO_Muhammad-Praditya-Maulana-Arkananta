<?php
require_once 'karyawan.php';
//praditya
class KaryawanTetap extends Karyawan {
    private $tunjanganKesehatan;
    private $opsiSahamID;

    public function __construct($data) {
        parent::__construct();
        $this->id_karyawan         = $data['id_karyawan'];
        $this->nama_karyawan       = $data['nama_karyawan'];
        $this->departemen           = $data['departemen'];
        $this->hariKerjaMasuk       = $data['hari_kerja_masuk'];
        $this->gajiDasarPerHari     = $data['gaji_dasar_per_hari'];
        $this->tunjanganKesehatan  = $data['tunjangan_kesehatan'];
        $this->opsiSahamID          = $data['opsi_saham_id'];
    }

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

    // =========================================================================
    // METHOD OVERRIDING - KARYAWAN TETAP
    // =========================================================================
    public function hitungGajiBersih() {
        // Kehadiran harian + tunjangan kesehatan bervariasi
        return ($this->hariKerjaMasuk * $this->gajiDasarPerHari) + $this->tunjanganKesehatan;
    }

    public function tampilkanProfilKaryawan() {
        return "ID Saham: " . $this->opsiSahamID . " | Tunjangan Kes: Rp " . number_format($this->tunjanganKesehatan, 0, ',', '.');
    }

    public function getId() { return $this->id_karyawan; }
    public function getNama() { return $this->nama_karyawan; }
    public function getDepartemen() { return $this->departemen; }
    public function getHariKerja() { return $this->hariKerjaMasuk; }
    public function getGajiDasar() { return $this->gajiDasarPerHari; }
}
?>