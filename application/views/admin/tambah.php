<div class="card">
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Judul</label>
                <input type="text" name="judul" class="form-control" id="judul">
                <small class="form-text text-danger"><?= form_error('nama'); ?></small>
            </div>
            <div class="form-group">
                <label for="nrp">Tahun Terbit</label>
                <input type="text" name="tahun_terbit" class="form-control" id="tahun_terbit">
                <small class="form-text text-danger"><?= form_error('nrp'); ?></small>
            </div>
            <div class="form-group">
                <label for="email">Penulis / Pengarang buku</label>
                <input type="text" name="penulis" class="form-control" id="penulis">
                <small class="form-text text-danger"><?= form_error('email'); ?></small>
            </div>
            <div class="form-group">
                <label for="email">Harga Buku</label>
                <input type="text" name="harga" class="form-control" id="harga">
                <small class="form-text text-danger"><?= form_error('email'); ?></small>
            </div>
            <div class="form-group">
                <label for="email">Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control" id="deskripsi">
                <small class="form-text text-danger"><?= form_error('email'); ?></small>
            </div>
            <div class="form-group">
                <label for="email">Gambar</label>
                <input type="file" name="input_gambar">
                <small class="form-text text-danger"><?= form_error('gambar'); ?></small>
            </div>

            <button type="submit" name="ubah" class="btn btn-primary float-right">Tambah data</button>
        </form>
    </div>
</div>