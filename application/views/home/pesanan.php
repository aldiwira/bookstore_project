<br><br><br><br>
<div class="container">
    <div>
        <h1>
            Data Pesanan
        </h1>
        <br>
        <?php foreach ($pesanan as $key) { ?>
            <div class="card">
                <div class="card-header bg-primary text-white">&nbsp;</div>
                <div class="card-body">
                    <div class="form-group">
                        <label>ID transaksi</label>
                        <label class="form-control"> <?= $key['id_transaksi'] ?> </label>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <label class="form-control"> <?= $key['username'] ?> </label>
                    </div>
                    <div class="form-group">
                        <label>Judul</label>
                        <label class="form-control"> <?= $key['judul'] ?> </label>
                    </div>
                    <div class="form-group">
                        <label>Penulis</label>
                        <label class="form-control"> <?= $key['penulis'] ?> </label>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <label class="form-control"> Rp. <?= number_format($key['harga'], 2) ?></label>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <label class="form-control">
                            <?php if ($key['status_transaksi'] == 0) {
                                echo "Menunggu pembayaran dan cek dari admin";
                            } else if ($key['status_transaksi'] == 1) {
                                echo "Sudah di ACC";
                            } else {
                                echo "";
                            }
                            ?>
                        </label>
                    </div>
                    <br>
                    <?php if ($key['status_transaksi'] == 0) { ?>
                        <center>
                            <a href="<?= base_url() ?>home/deletePesanan/<?= $key['id_transaksi'] ?>">
                                <button type="button" class="btn btn-primary" style="width:100px; height:35px;">Hapus</button>
                            </a>
                        </center>
                    <?php } ?>
                </div>
            </div>
            <br>
        <?php } ?>
    </div>
</div>