<br><br><br><br><br>

<div class="container">
    <div class="row">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    <img src="assets/img/1.jpg" alt="Slide 1">
                    <div class="carousel-caption">
                        <h1>KamarBuku.com</h1>
                        <p>Website Toko Buku Paling Terpercaya</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br><br><br>

<div class="container">
    <div class="row mtb-60">
        <div>
            <h1>Catalog Of Books</h1>
            <br>
        </div>
        <br>
        <br>
        <div class="row">
            <?php foreach ($book as $key) { ?>
                <div class="col-md-4">
                    <div class="well">
                        <img class="thumbnail img-responsive" style="width:100%; height: 100%;" alt="Bootstrap template" src="assets/upload/<?= $key['gambar'] ?>" />
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