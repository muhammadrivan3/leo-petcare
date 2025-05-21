<?php
$hewan = $_POST['hewan'] ?? '';
$gejala = $_POST['gejala'] ?? [];

$cf_total = null;
$i = 0;

foreach ($gejala as $key => $value) {
    $cf = floatval($value);

    // Netral (0) tidak dihitung dalam CF
    if ($cf === 0.0) continue;

    if ($cf_total === null) {
        $cf_total = $cf;
    } else {
        $cf_total = $cf_total + ((1 - abs($cf_total)) * $cf);
    }
}

if ($cf_total === null) {
    $cf_total = 0;
}
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
    <!-- Tidak perlu komentar ganda, langsung clean -->
    <main class="container result-main-container" style="display: flex; justify-content: center; justify-items: center;">
        <div class="result-content">
            <div style="display: flex; justify-content: center; justify-items: center;">
            <p class="cf-total">Total Certainty Factor: <strong><?= round($cf_total, 3) ?></strong></p>
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

        <!-- <div class="result-animal-image-container">
        <img src="assets/img/<?= strtolower($hewan) ?>.png" alt="<?= ucfirst($hewan) ?>" class="result-animal-image" />
    </div> -->
    </main>


    <!-- <?php if ($cf_total >= 0.8): ?>
            <p class="conclusion strong">Kesimpulan: Gejala sangat kuat menunjukkan rabies. Segera bawa ke dokter hewan!</p>
        <?php elseif ($cf_total >= 0.5): ?>
            <p class="conclusion moderate">Kesimpulan: Ada tanda-tanda rabies. Perlu pemeriksaan lanjutan.</p>
        <?php elseif ($cf_total <= -0.5): ?>
            <p class="conclusion low">Kesimpulan: Gejala menunjukkan bahwa rabies sangat kecil kemungkinan terjadi.</p>
        <?php else: ?>
            <p class="conclusion none">Kesimpulan: Tidak ada indikasi kuat ke arah rabies. Tetap pantau kondisi hewan Anda.</p>
        <?php endif; ?>

        <a href="index.php" class="btn back-btn">Kembali ke awal</a>
    </main> -->
</body>

</html>