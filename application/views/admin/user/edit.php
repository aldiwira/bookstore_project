<div class=container>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form edit data mahasiswa
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" id="id" name="id" value="<?= $user['id'] ?>">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" value="<?= $user['username'] ?>" id="username" name="username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" value="<?= $user['password'] ?>" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="level">Level</label>
                            <select id="level" class="form-control" name="level">
                                <?php foreach ($level as $key) { ?>
                                    <?php if ($key === $user['level']) { ?>
                                        <option value="<?= $key ?>" selected="<?= $key ?>"><?= $key ?></option>
                                    <?php } else { ?>
                                        <option value="<?= $key ?>"><?= $key ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <button type="submit" name="edit" class="btn btn-primary float-right" float="none">edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>