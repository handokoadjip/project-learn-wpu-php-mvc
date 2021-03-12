
    <div class="container">
        <!-- semua di html harus menggunakan baseurl -->
        <img src="<?= BASEURL; ?>/img/1.jpg" alt="Hipster" width=200 class="mt-3 mb-3 rounded-circle shadow" >
        <h1>Selamat datang di halaman About</h1>
        <p>Nama saya <?= $data["nama"]; ?>, pekerjaan saya <?= $data["pekerjaan"]; ?> dan berumur <?= $data["umur"]; ?>   </p>
    </div>
