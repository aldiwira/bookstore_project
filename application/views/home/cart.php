<br><br><br><br>
<div class="container">
    <div>
        <div style="margin: 30px">
            <h1>Keranjang Belanja Kamu</h1>
        </div>
        <div class="card">
            <div class="card-header bg-primary text-white">
                &nbsp;
            </div>
            <table style="margin: 50px; border-collapse:separate; border-spacing: 0 1em;">
                <tbody>
                    <?php if (empty($this->cart->contents())) : ?>
                        <div style="margin: 20px">
                            <h2 style="text-align: center">Keranjang masih kosong</h2>
                            <div class="d-flex justify-content-center">
                                <a href="<?= base_url(); ?>home/catalog">
                                    <button type="button" style="margin: 10px; width: 80px ;height: 50px; font-size: 15px;" class="btn btn-primary">Catalog</button>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php foreach ($this->cart->contents() as $key) {
                        $tot = $key['price'] * $key['qty'] ?>
                        <tr class="c">
                            <td>
                                <p style="text-align: left;">
                                    ID Barang : <?= $key['id'] ?>
                                </p>
                            </td>
                            <td>
                                <p style="text-align: left;">
                                    Nama Barang : <?= $key['name'] ?>
                                </p>
                            </td>
                            <td>
                                <p style="text-align: left;">
                                    Harga : Rp.<?= number_format($tot, 2) ?>
                                </p>
                                <p style="text-align: left;">
                                    Jumlah : <?= $key['qty'] ?>
                                </p>
                            </td>
                            <td>
                            <td class="d-flex justify-content-center">
                                <a href="<?= base_url(); ?>home/deletCart/<?= $key['rowid'] ?>" class="badge badge-danger float-right tombol-hapus">hapus</a>
                            </td>
                            </td>
                        </tr>
                        <hr>
                    <?php } ?>
                </tbody>

            </table>

            <div style="margin: 30px; margin-right:200px;">
                <p style="text-align: right;">Total : Rp.<?php echo number_format($this->cart->total(), 2) ?></p>
                <div class="d-flex justify-content-end mt-4">
                    <a href="<?= base_url(); ?>home/pesan_proses">
                        <button type="button " style="width: 100px ;height: 40px; font-size: 15px;" class="btn btn-primary">Checkout</button>
                    </a>
                </div>
            </div>

        </div>
        <br>
    </div>
</div>