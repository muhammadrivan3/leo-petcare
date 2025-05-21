<?php  ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LEO PETCARE - Elite Veterinary Clinic</title>
    <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
    <header style="display: flex; justify-content: space-between; ">
        <div>
            <span>
            LEO PETCARE</span>
        </div>
        <div>
            <button id="get-started-btn">Diagnosa Rabies</button>
        </div>
    </header>

    <section class="hero">
        <div class="hero-text">
            <h1>klinik perawatan hewan yang dapat anda percaya</h1>
            <p>
Menyediakan layanan kesehatan penuh kasih sayang, modern, dan premium untuk hewan peliharaan kesayangan Anda.</p>
        </div>
        <div class="hero-images">
            <img src="assets/img/anjing.png" alt="Happy dog" />
            <img src="assets/img/kucing.png" alt="Content cat" />
        </div>
    </section>

    <section id="services">
        <h2>Layanan Premium kami</h2>
        <div class="services">
            <div class="service-item">
                <h3>Pemeriksaan Kesehatan Komprehensif</h3>
                <p>Pemeriksaan menyeluruh untuk memastikan kesehatan hewan peliharaan Anda optimal dan deteksi dini masalah apa pun.</p>
            </div>
            <div class="service-item">
                <h3>Prosedur Bedah Lanjutan</h3>
                <p>Perawatan bedah canggih yang dilakukan oleh dokter bedah hewan yang berpengalaman.</p>
            </div>
            <div class="service-item">
                <h3>Asrama & Perawatan Mewah</h3>
                <p>Lingkungan yang nyaman dan penuh perhatian untuk hewan peliharaan Anda saat Anda pergi.</p>
            </div>
        </div>
    </section>

    <section id="rabies-check" class="rabies-check">
        <h2>Pemeriksaan Rabies Modern untuk Anjing & Kucing</h2>
        <p>Pastikan hewan peliharaan Anda terlindungi dengan layanan vaksinasi dan pemantauan rabies kami yang canggih. Kami menyediakan pemeriksaan rabies komprehensif yang dirancang khusus untuk anjing dan kucing, menggunakan teknologi dan protokol terkini untuk menjaga hewan peliharaan Anda tetap aman dan sehat.</p>
        <ul>
            <li>Pengujian antibodi rabies tingkat lanjut</li>
            <li>Pengingat dan pelacakan vaksinasi</li>
            <li>Konsultasi ahli tentang pencegahan rabies</li>
        </ul>
    </section>

    <section id="rabies-analysis" class="rabies-analysis">
        <h2>Analisis Rabies dengan Metode Certainty Factor</h2>
        <form class="animal-select-form" method="GET" action="questions.php">
            <label for="animal-type">Pilih Hewan:</label>
            <select id="animal-type" name="hewan" required>
                <option value="">--Pilih--</option>
                <option value="anjing">Anjing</option>
                <option value="kucing">Kucing</option>
            </select>

            <button type="submit">Lanjutkan</button>
        </form>
        <div id="analysis-result"></div>
    </section>

    <section id="about" class="about">
        <h2>Tentang LEO PETCARE</h2>
        <p>Di LEO PETCARE, kami memadukan keahlian, kasih sayang, dan teknologi mutakhir untuk memberikan perawatan terbaik bagi hewan peliharaan kesayangan Anda. Tim profesional kami yang berdedikasi berkomitmen untuk memastikan kesehatan dan kebahagiaan hewan peliharaan Anda.</p>
    </section>

    <section id="contact" class="contact">
        <h2>Contact Us</h2>
        <form action="#" method="post" onsubmit="return false;">
            <input type="text" name="name" placeholder="Your Name" required />
            <input type="email" name="email" placeholder="Your Email" required />
            <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
            <button type="submit">Send Message</button>
        </form>
    </section>

    <footer>
        &copy; 2024 LEO PETCARE. All rights reserved.
    </footer>

    <script src="assets/js/script.js"></script>
</body>
</html>
