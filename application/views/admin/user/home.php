<div>
    <h1>List User</h1>
    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <th>Row</th>
                <th>Username</th>
                <th>Password</th>
                <th>Level</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $num = 1;
            foreach ($user as $bk) { ?>
                <tr class="text-center">
                    <td><?php echo $num ?></td>
                    <td><?php echo $bk['username'] ?></td>
                    <td><?php echo $bk['password'] ?></td>
                    <td><?php echo $bk['level'] ?></td>
                    <td class="d-flex justify-content-center">
                        <?php if ($bk['level'] === "block") { ?>
                            <a href="<?= base_url(); ?>User_hand/delete_book/<?= $bk['id'] ?>" class="badge badge-info float-right tombol-hapus">Approve</a>
                        <?php } ?>
                        <a href="<?= base_url(); ?>User_hand/delete_user/<?= $bk['id'] ?>" class="badge badge-danger float-right tombol-hapus">hapus</a>
                        <a href="<?= base_url(); ?>User_hand/ubah_user/<?= $bk['id'] ?>" class="badge badge-success float-right">ubah</a>
                    </td>
                    <?php $num++; ?>
                </tr>

            <?php } ?>
        </tbody>
    </table>
</div>