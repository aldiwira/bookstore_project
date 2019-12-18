<div class="card">
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Username</label>
                <input type="text" name="username" class="form-control" id="username">
                <small class="form-text text-danger"><?= form_error('nama'); ?></small>
            </div>
            <div class="form-group">
                <label for="nrp">Password</label>
                <input type="text" name="password" class="form-control" id="password">
                <small class="form-text text-danger"><?= form_error('nrp'); ?></small>
            </div>
            <div class="form-group">
                <label for="email">Level</label>
                <select id="level" class="form-control" name="level">
                    <option value="#"></option>
                    <?php foreach ($level as $key) {
                    ?>
                        <option value="<?= $key ?>"><?= $key ?></option>
                    <?php  } ?>
                </select>
                <small class="form-text text-danger"><?= form_error('level'); ?></small>
            </div>

            <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah</button>
        </form>
    </div>
</div>