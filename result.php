<?php
$hewan = $_POST['hewan'] ?? '';
$gejala = $_POST['gejala'] ?? [];

// Basis aturan dengan MB dan MD (Certainty Factor)
$aturan = [
    'anjing' => [
        'agresif' => ['mb' => 0.9, 'md' => 0.1],
        'air_liur' => ['mb' => 0.85, 'md' => 0.15],
        'takut_air' => ['mb' => 0.8, 'md' => 0.2],
        'sulit_menelan' => ['mb' => 0.85, 'md' => 0.15],
        'kejang' => ['mb' => 0.95, 'md' => 0.05],
        'tidak_respon' => ['mb' => 0.75, 'md' => 0.25],
        'jalan_aneh' => ['mb' => 0.9, 'md' => 0.1],
        'demam' => ['mb' => 0.65, 'md' => 0.35],
        'hipersensitif' => ['mb' => 0.7, 'md' => 0.3],
        'luka_gigitan' => ['mb' => 0.7, 'md' => 0.3],
        'mual' => ['mb' => 0.75, 'md' => 0.25],
        'perubahan_nafsu_makan' => ['mb' => 0.8, 'md' => 0.2]
    ],
    'kucing' => [
        'gelisah' => ['mb' => 0.8, 'md' => 0.2],
        'bersembunyi' => ['mb' => 0.75, 'md' => 0.25],
        'tidak_nafsu' => ['mb' => 0.7, 'md' => 0.3],
        'air_liur' => ['mb' => 0.85, 'md' => 0.15],
        'menjilat_berlebihan' => ['mb' => 0.7, 'md' => 0.3],
        'tidak_respon' => ['mb' => 0.65, 'md' => 0.35],
        'jalan_aneh' => ['mb' => 0.8, 'md' => 0.2],
        'agresif' => ['mb' => 0.9, 'md' => 0.1],
        'suara_mengeong' => ['mb' => 0.7, 'md' => 0.3],
        'kaku_otot' => ['mb' => 0.8, 'md' => 0.2],
        'koordinasi' => ['mb' => 0.85, 'md' => 0.15],
        'keluar_tidur' => ['mb' => 0.7, 'md' => 0.3]
    ]
];

$cf_total = 0;
$first = true;

foreach ($gejala as $kode => $nilai_input) {
    $nilai = floatval($nilai_input);
    if ($nilai == 0.0) continue;

    $mb = $aturan[$hewan][$kode]['mb'] * $nilai;
    $md = $aturan[$hewan][$kode]['md'] * $nilai;
    $cf = $mb - $md;

    if ($first) {
        $cf_total = $cf;
        $first = false;
    } else {
        $cf_total = $cf_total + ($cf * (1 - $cf_total));
    }
}

$cf_total = round($cf_total, 3);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Hasil Diagnosis Rabies</title>
    <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
    <header class="page-header">
        <h2>Hasil Deteksi Rabies untuk <?= ucfirst($hewan) ?></h2>
    </header>
    <main class="container result-main-container" style="display: flex; justify-content: center; justify-items: center;">
        <div class="result-content">
            <div style="display: flex; justify-content: center; justify-items: center;">
                <p class="cf-total">Total Certainty Factor: <strong><?= $cf_total ?></strong></p>
            </div>
            <?php if ($cf_total >= 0.8): ?>
                <p class="conclusion strong">Kesimpulan: Gejala sangat kuat menunjukkan rabies. Segera bawa ke dokter hewan!</p>
            <?php elseif ($cf_total >= 0.5): ?>
                <p class="conclusion moderate">Kesimpulan: Ada tanda-tanda rabies. Perlu pemeriksaan lanjutan.</p>
            <?php elseif ($cf_total <= -0.5): ?>
                <p class="conclusion low">Kesimpulan: Gejala menunjukkan bahwa rabies sangat kecil kemungkinan terjadi.</p>
            <?php else: ?>
                <p class="conclusion none">Kesimpulan: Tidak ada indikasi kuat ke arah rabies. Tetap pantau kondisi hewan Anda.</p>
            <?php endif; ?>
            <div style="display: flex; justify-content: center; justify-items: center;">
                <a href="index.php" class="btn back-btn">Kembali ke awal</a>
            </div>
        </div>
    </main>
</body>
</html>
