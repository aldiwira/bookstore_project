<br><br><br><br>
<div class="container">
    <div>
        <h1>
            Detail Buku
        </h1>
        <br>

        <div class="card">
            <div class="card-header bg-primary text-white">
                &nbsp;
            </div>
            <br>
            <table>
                <tbody>
                    <tr>
                        <br>
                        <td align="center" width="50%">
                            <img src="<?= base_url() ?>assets/upload/<?= $book['gambar'] ?>" width=300px" height="300px" style="border-style: outset;">
                            <br>
                            <br>
                            <br>
                            <a href="#">
                                <button type="button" class="btn btn-primary" style="width:200px; height:50px">Pesan</button>
                            </a>
                        </td>
                        <td>
                            <br>
                            <label>Judul</label>
                            <hr>
                            <p style="text-align: left;">
                                <?= $book['judul'] ?>
                            </p>
                            <br>
                            <label>Penulis</label>
                            <hr>
                            <p style="text-align: left;">
                                <?= $book['penulis'] ?>
                            </p>
                            <br>
                            <label>Tahun Terbit</label>
                            <hr>
                            <p style="text-align: left;">
                                <?= $book['tahun_terbit'] ?>
                            </p>
                            <br>
                            <label>Deskripsi</label>
                            <hr>
                            <p style="text-align: left;">
                                <?= $book['deskripsi'] ?>
                            </p>
                            <br>
                            <label>Harga</label>
                            <hr>
                            <p style="text-align: left;">
                                <?= $book['harga'] ?>
                            </p>
                            <br>
                        </td>
                    </tr>
                    <br>
                </tbody>
            </table>
        </div>
        <br>
    </div>
</div>