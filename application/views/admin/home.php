<div>
    <h1>List Buku</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Row</th>
                <th>Judul Buku</th>
                <th>Tahun Terbit</th>
                <th>Penulis</th>
                <th>harga</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $num = 1;
            foreach ($book as $bk) { ?>
                <tr>
                    <td><?php echo $num ?></td>
                    <td><?php echo $bk['judul'] ?></td>
                    <td><?php echo $bk['tahun_terbit'] ?></td>
                    <td><?php echo $bk['penulis'] ?></td>
                    <td>Rp. <?php echo number_format($bk['harga'], 2) ?></td>
                    <td class="d-flex justify-content-center">
                        <a href="<?= base_url(); ?>admin/delete_book/<?= $bk['id'] ?>" class="badge badge-danger float-right tombol-hapus">hapus</a>
                        <a href="<?= base_url(); ?>admin/ubahdata/<?= $bk['id'] ?>" class="badge badge-success float-right">ubah</a>
                        <a href="<?= base_url(); ?>admin/detailbuku/<?= $bk['id'] ?>" class="badge badge-primary float-right">detail</a>
                    </td>
                    <?php $num++; ?>
                </tr>

            <?php } ?>
        </tbody>
    </table>
</div>