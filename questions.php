<?php
$hewan = $_GET['hewan'] ?? 'anjing';

$pertanyaan = [];

// Menentukan pertanyaan dan nilai Certainty Factor berdasarkan jenis hewan
if ($hewan == 'anjing') {
    $pertanyaan = [
        'agresif' => ['Apakah anjing Anda tiba-tiba menjadi sangat agresif terhadap orang atau hewan lain?', 0.9, 0.1],
        'air_liur' => ['Apakah anjing Anda mengeluarkan air liur berlebihan?', 0.85, 0.15],
        'takut_air' => ['Apakah anjing Anda terlihat takut atau menghindari air?', 0.8, 0.2],
        'sulit_menelan' => ['Apakah anjing Anda terlihat kesulitan saat menelan makanan atau air?', 0.85, 0.15],
        'kejang' => ['Apakah anjing Anda mengalami kejang atau tubuhnya bergetar tanpa sebab?', 0.95, 0.05],
        'tidak_respon' => ['Apakah anjing Anda tidak merespons saat dipanggil atau disentuh?', 0.75, 0.25],
        'jalan_aneh' => ['Apakah anjing Anda berjalan dengan gerakan yang aneh atau tidak stabil?', 0.9, 0.1],
        'demam' => ['Apakah anjing Anda mengalami demam tinggi (di atas 39°C)?', 0.65, 0.35],
        'hipersensitif' => ['Apakah anjing Anda sangat sensitif terhadap cahaya atau suara?', 0.7, 0.3],
        'luka_gigitan' => ['Apakah anjing Anda memiliki luka gigitan yang tidak sembuh?', 0.7, 0.3],
        'mual' => ['Apakah anjing Anda sering merasa mual atau muntah?', 0.75, 0.25],
        'perubahan_nafsu_makan' => ['Apakah anjing Anda kehilangan nafsu makan atau makan berlebihan?', 0.8, 0.2]
    ];
} else {
    $pertanyaan = [
        'gelisah' => ['Apakah kucing Anda terlihat gelisah dan tidak bisa diam?', 0.8, 0.2],
        'bersembunyi' => ['Apakah kucing Anda lebih sering bersembunyi dari biasanya?', 0.75, 0.25],
        'tidak_nafsu' => ['Apakah kucing Anda kehilangan nafsu makan secara drastis?', 0.7, 0.3],
        'air_liur' => ['Apakah kucing Anda mengeluarkan air liur berlebihan?', 0.85, 0.15],
        'menjilat_berlebihan' => ['Apakah kucing Anda menjilat tubuhnya secara berlebihan atau obsesif?', 0.7, 0.3],
        'tidak_respon' => ['Apakah kucing Anda tampak linglung atau tidak merespons panggilan?', 0.65, 0.35],
        'jalan_aneh' => ['Apakah kucing Anda berjalan dengan gaya yang aneh atau oleng?', 0.8, 0.2],
        'agresif' => ['Apakah kucing Anda menjadi lebih agresif dari biasanya?', 0.9, 0.1],
        'suara_mengeong' => ['Apakah suara mengeong kucing Anda berubah? Misalnya menjadi lebih keras atau berbeda.', 0.7, 0.3],
        'kaku_otot' => ['Apakah kucing Anda mengalami kaku otot atau tremor?', 0.8, 0.2],
        'koordinasi' => ['Apakah kucing Anda tampak kehilangan koordinasi saat bergerak?', 0.85, 0.15],
        'keluar_tidur' => ['Apakah kucing Anda lebih sering keluar dari tempat tidur atau bergerak lebih aktif dari biasanya?', 0.7, 0.3]
    ];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pertanyaan Gejala - <?= ucfirst($hewan) ?></title>
    <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
    <header class="page-header">
        <h2>Jawab Pertanyaan Gejala - <?= ucfirst($hewan) ?></h2>
    </header>
    <main class="container question-page-container">
        <form method="POST" action="result.php" class="question-form">
            <input type="hidden" name="hewan" value="<?= $hewan ?>">
            <?php foreach ($pertanyaan as $key => [$text, $mb, $md]): ?>
                <div class="question-item">
                    <p class="question-text"><?= $text ?></p>
                    <div class="radio-group">
                        <label><input type="radio" name="gejala[<?= $key ?>]" value="-1" required /> Tidak</label>
                        <label><input type="radio" name="gejala[<?= $key ?>]" value="0" /> Ragu-ragu</label>
                        <label><input type="radio" name="gejala[<?= $key ?>]" value="1" /> Ya</label>
                    </div>
                </div>
            <?php endforeach; ?>
            <button type="submit" class="submit-btn">Lihat Hasil Diagnosis</button>
        </form>
        <div>
            <?php if ($hewan == 'anjing'): ?>
                <img src="assets/img/anjing.png" alt="Dog" class="animal-image" />
            <?php elseif ($hewan == 'kucing'): ?>
                <img src="assets/img/kucing.png" alt="Cat" class="animal-image" />
            <?php endif; ?>
        </div>
    </main>
</body>
</html>
