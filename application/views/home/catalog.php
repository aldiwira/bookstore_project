<br><br><br><br>
<div class="container">
    <div>
        <div>
            <h1>
                Catalog Of Books
            </h1>
            <br>
        </div>
        <div class="row">
            <?php foreach ($book as $key) { ?>
                <div class="col-md-4">
                    <div class="well">
                        <img class="thumbnail img-responsive" style="width:100%; height: 100%;" alt="Bootstrap template" src="<?= base_url() ?>assets/upload/<?= $key['gambar'] ?>" />
                        <center>
                            <h3><?= $key['judul'] ?></h3>
                        </center>
                        <p style="text-align: left;">Pengarang &nbsp;&nbsp;&nbsp; : <?= $key['penulis'] ?></p>
                        <p style="text-align: left;">Penerbit &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?= $key['penulis'] ?></p>
                        <p style="text-align: left;">Tahun Terbit &nbsp; : <?= $key['tahun_terbit'] ?></p>
                        <br>
                        <center>
                            <a href="<?= base_url() ?>home/detail/<?= $key['id'] ?>">
                                <button class="form-control detail-box" style=" font-size:15px; height: 40px;" data-toggle="modal" data-target="#exampleModal">
                                    Details
                                </button>
                            </a>
                        </center>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>