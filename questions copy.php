<?php
$hewan = $_GET['hewan'] ?? 'anjing';

$pertanyaan = [];

if ($hewan == 'anjing') {
    $pertanyaan = [
        'agresif' => ['Apakah anjing Anda tiba-tiba menjadi sangat agresif terhadap orang atau hewan lain?', 0.8],
        'air_liur' => ['Apakah anjing Anda mengeluarkan air liur berlebihan?', 0.7],
        'takut_air' => ['Apakah anjing Anda terlihat takut atau menghindari air?', 0.6],
        'sulit_menelan' => ['Apakah anjing Anda terlihat kesulitan saat menelan makanan atau air?', 0.7],
        'kejang' => ['Apakah anjing Anda mengalami kejang atau tubuhnya bergetar tanpa sebab?', 0.9],
        'tidak_respon' => ['Apakah anjing Anda tidak merespons saat dipanggil atau disentuh?', 0.6],
        'jalan_aneh' => ['Apakah anjing Anda berjalan dengan gerakan yang aneh atau tidak stabil?', 0.8]
    ];
} else {
    $pertanyaan = [
        'gelisah' => ['Apakah kucing Anda terlihat gelisah dan tidak bisa diam?', 0.7],
        'bersembunyi' => ['Apakah kucing Anda lebih sering bersembunyi dari biasanya?', 0.6],
        'tidak_nafsu' => ['Apakah kucing Anda kehilangan nafsu makan secara drastis?', 0.5],
        'air_liur' => ['Apakah kucing Anda mengeluarkan air liur berlebihan?', 0.8],
        'menjilat_berlebihan' => ['Apakah kucing Anda menjilat tubuhnya secara berlebihan atau obsesif?', 0.6],
        'tidak_respon' => ['Apakah kucing Anda tampak linglung atau tidak merespons panggilan?', 0.6],
        'jalan_aneh' => ['Apakah kucing Anda berjalan dengan gaya yang aneh atau oleng?', 0.8]
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
    <header class="page-header" >
        <h2>Jawab Pertanyaan Gejala - <?= ucfirst($hewan) ?></h2>
    </header>
    <main class="container question-page-container">
        <form method="POST" action="result.php" class="question-form">
            <input type="hidden" name="hewan" value="<?= $hewan ?>">
            <?php foreach ($pertanyaan as $key => [$text, $cf]): ?>
                <div class="question-item">
                    <p class="question-text"><?= $text ?></p>
                    <div class="radio-group">
                        <label>
                            <input type="radio" name="gejala[<?= $key ?>]" value="-1" required />
                            Tidak
                        </label>
                        <label>
                            <input type="radio" name="gejala[<?= $key ?>]" value="0" />
                            Ragu-ragu
                        </label>
                        <label>
                            <input type="radio" name="gejala[<?= $key ?>]" value="<?= $cf ?>" />
                            Ya
                        </label>
                    </div>
                </div>
            <?php endforeach; ?>
            <button type="submit" class="submit-btn">Lihat Hasil Diagnosis</button>
        </form>
        <div >
            <?php if ($hewan == 'anjing'): ?>
                <img src="assets/img/anjing.png" alt="Dog" class="animal-image" />
            <?php elseif ($hewan == 'kucing'): ?>
                <img src="assets/img/kucing.png" alt="Cat" class="animal-image" />
            <?php endif; ?>
        </div>
    </main>
</body>
</html>
