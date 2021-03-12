
<div class="container">
    <h1 class=mt-3><?= $data["judul"] ?></h1>
    <div class="row">
        <div class="col-lg-6">
            <!-- memanggil static method -->
            <?php Flasher::flash() ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>/mahasiswa/cari" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" name="keyword" id="keywod" placeholder="cari nama" autocomplete=off>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" id="tombolCari">cari</button>
                    </div>  
                    </div>
                </div>
            </form>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <!-- button -->
            <button type="button" class="btn btn-primary tampilModalTambah" data-toggle="modal" data-target="#tambahModal">
                Tambah Data
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <ul class="list-group">
                <?php foreach($data["mhs"] as $mhs) : ?>
                    <li class="list-group-item">
                        <?= $mhs["nama"]; ?>
                        <!-- lebih bagus menggunakan switch alert -->
                        <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs["id"] ?>" class="badge badge-danger float-right ml-2" onclick="return confirm('yakin?');" >hapus</a>
                        
                        <!-- jika menggunakan ajax mengambil id || data-NamaData -->
                        <a href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $mhs["id"] ?>" class="badge badge-success float-right ml-2 tampilModalUbah" data-toggle="modal" data-target="#tambahModal" data-id="<?= $mhs['id']; ?>">ubah</a>
                        
                        <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs["id"] ?>" class="badge badge-primary float-right">detail</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" Tambah Data="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="<?= BASEURL;?>/mahasiswa/tambah" method="post">
        <input type="hidden" name ="id" id="id">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="number" class="form-control" id="nim" name="nim">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
            <label for="jurusan">Jurusan</label>
                <select class="form-control" id="jurusan" name="jurusan">
                    <option value = "Teknik Informatika">Teknik Informatika</option>
                    <option value = "Teknik Mesin">Teknik Mesin</option>
                    <option value = "Teknik Bangunan">Teknik Bangunan</option>
                    <option value = "Teknik Plantologi">Teknik Plantologi</option>
                </select>
            </div>       
    </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
        </form>
    </div>
</div>
</div>
