<?php
// 1. Menyisipkan seluruh file subclass konkrit yang dibutuhkan
require_once 'karyawan_kontrak.php';
require_once 'karyawan_tetap.php';
require_once 'karyawan_magang.php';

// 2. Memanggil static method dari masing-masing Class tanpa instansiasi dummy object
$dataKontrak = KaryawanKontrak::getDaftarKontrak();
$dataTetap   = KaryawanTetap::getDaftarTetap();
$dataMagang  = KaryawanMagang::getDaftarMagang();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Rekapitulasi Slip Gaji Karyawan</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background-color: #f3f5f7; margin: 0; padding: 40px; color: #2d3436; }
        .container { max-width: 1300px; margin: 0 auto; }
        
        /* Header Dashboard */
        .header-panel { text-align: center; background: white; padding: 25px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.03); margin-bottom: 30px; }
        .header-panel h1 { margin: 0 0 5px 0; color: #2c3e50; font-size: 2rem; }
        .header-panel p { margin: 0; color: #7f8c8d; font-size: 0.95rem; }

        /* Judul Kelompok Karyawan */
        .section-title { padding: 12px 20px; color: white; font-weight: bold; font-size: 1.15rem; border-radius: 8px 8px 0 0; margin-top: 40px; display: flex; justify-content: space-between; align-items: center; }
        .title-kontrak { background-color: #2980b9; }
        .title-tetap { background-color: #27ae60; }
        .title-magang { background-color: #8e44ad; }
        .badge-count { background: rgba(255,255,255,0.2); padding: 3px 10px; border-radius: 20px; font-size: 0.85rem; }

        /* Desain Tabel */
        table { width: 100%; border-collapse: collapse; background: white; border-radius: 0 0 8px 8px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.04); margin-bottom: 20px; }
        th, td { padding: 14px 18px; text-align: left; border-bottom: 1px solid #edf2f7; font-size: 0.95rem; }
        th { color: white; font-weight: 600; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 0.5px; }
        
        .th-kontrak { background-color: #3498db; }
        .th-tetap { background-color: #2ecc71; }
        .th-magang { background-color: #9b59b6; }
        
        /* Zebra Striping & Hover */
        tr:nth-child(even) { background-color: #f9fbfd; }
        tr:hover { background-color: #f1f4f7; transition: background 0.2s ease; }
        
        /* Komponen Spesifik */
        .profil-spesifik { color: #57606f; font-style: italic; font-size: 0.9rem; }
        .gaji-badge { background-color: #2ed573; color: white; padding: 6px 12px; border-radius: 4px; font-weight: bold; display: inline-block; }
        .gaji-magang { background-color: #ffa502; } /* Bedakan warna untuk magang yang terkena potongan */
        .text-null { text-align: center; color: #a4b0be; font-style: italic; padding: 30px; }
    </style>
</head>
<body>

<div class="container">
    
    <div class="header-panel">
        <h1>📊 Sistem Informasi Penggajian & Slip Gaji Karyawan</h1>
        <p>Implementasi Struktur Polimorfisme & Pencatatan Data Terpusat Perusahaan</p>
    </div>

    <div class="section-title title-kontrak">
        <span>📋 Kategori Karyawan: Kontrak</span>
        <span class="badge-count"><?= count($dataKontrak); ?> Orang</span>
    </div>
    <table>
        <thead>
            <tr>
                <th class="th-kontrak" width="5%">ID</th>
                <th class="th-kontrak" width="22%">Nama Karyawan</th>
                <th class="th-kontrak" width="18%">Departemen</th>
                <th class="th-kontrak" width="10%">Hari Masuk</th>
                <th class="th-kontrak" width="15%">Gaji per Hari</th>
                <th class="th-kontrak" width="18%">Spesifikasi Jabatan (Polimorfik)</th>
                <th class="th-kontrak" width="12%">Gaji Bersih</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($dataKontrak)): ?>
                <tr><td colspan="7" class="text-null">Tidak ada data karyawan kontrak.</td></tr>
            <?php else: ?>
                <?php foreach ($dataKontrak as $k): ?>
                    <tr>
                        <td><?= $k->getId(); ?></td>
                        <td><strong><?= htmlspecialchars($k->getNama()); ?></strong></td>
                        <td><?= htmlspecialchars($k->getDepartemen()); ?></td>
                        <td><?= $k->getHariKerja(); ?> Hari</td>
                        <td>Rp <?= number_format($k->getGajiDasar(), 0, ',', '.'); ?></td>
                        <td class="profil-spesifik"><?= $k->tampilkanProfilKaryawan(); ?></td>
                        <td><span class="gaji-badge" style="background-color: #2980b9;">Rp <?= number_format($k->hitungGajiBersih(), 0, ',', '.'); ?></span></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>


    <div class="section-title title-tetap">
        <span>📋 Kategori Karyawan: Tetap</span>
        <span class="badge-count"><?= count($dataTetap); ?> Orang</span>
    </div>
    <table>
        <thead>
            <tr>
                <th class="th-tetap" width="5%">ID</th>
                <th class="th-tetap" width="22%">Nama Karyawan</th>
                <th class="th-tetap" width="18%">Departemen</th>
                <th class="th-tetap" width="10%">Hari Masuk</th>
                <th class="th-tetap" width="15%">Gaji per Hari</th>
                <th class="th-tetap" width="18%">Spesifikasi Jabatan (Polimorfik)</th>
                <th class="th-tetap" width="12%">Gaji Bersih</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($dataTetap)): ?>
                <tr><td colspan="7" class="text-null">Tidak ada data karyawan tetap.</td></tr>
            <?php else: ?>
                <?php foreach ($dataTetap as $k): ?>
                    <tr>
                        <td><?= $k->getId(); ?></td>
                        <td><strong><?= htmlspecialchars($k->getNama()); ?></strong></td>
                        <td><?= htmlspecialchars($k->getDepartemen()); ?></td>
                        <td><?= $k->getHariKerja(); ?> Hari</td>
                        <td>Rp <?= number_format($k->getGajiDasar(), 0, ',', '.'); ?></td>
                        <td class="profil-spesifik"><?= $k->tampilkanProfilKaryawan(); ?></td>
                        <td><span class="gaji-badge" style="background-color: #27ae60;">Rp <?= number_format($k->hitungGajiBersih(), 0, ',', '.'); ?></span></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>


    <div class="section-title title-magang">
        <span>📋 Kategori Karyawan: Magang (Internship)</span>
        <span class="badge-count"><?= count($dataMagang); ?> Orang</span>
    </div>
    <table>
        <thead>
            <tr>
                <th class="th-magang" width="5%">ID</th>
                <th class="th-magang" width="22%">Nama Karyawan</th>
                <th class="th-magang" width="18%">Departemen</th>
                <th class="th-magang" width="10%">Hari Masuk</th>
                <th class="th-magang" width="15%">Gaji per Hari</th>
                <th class="th-magang" width="18%">Spesifikasi Jabatan (Polimorfik)</th>
                <th class="th-magang" width="12%">Gaji Bersih</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($dataMagang)): ?>
                <tr><td colspan="7" class="text-null">Tidak ada data karyawan magang.</td></tr>
            <?php else: ?>
                <?php foreach ($dataMagang as $k): ?>
                    <tr>
                        <td><?= $k->getId(); ?></td>
                        <td><strong><?= htmlspecialchars($k->getNama()); ?></strong></td>
                        <td><?= htmlspecialchars($k->getDepartemen()); ?></td>
                        <td><?= $k->getHariKerja(); ?> Hari</td>
                        <td>Rp <?= number_format($k->getGajiDasar(), 0, ',', '.'); ?></td>
                        <td class="profil-spesifik"><?= $k->tampilkanProfilKaryawan(); ?></td>
                        <td><span class="gaji-badge gaji-magang">Rp <?= number_format($k->hitungGajiBersih(), 0, ',', '.'); ?></span></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

</div>

</body>
</html>