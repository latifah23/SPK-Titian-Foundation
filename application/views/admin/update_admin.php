<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Update Data Admin</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <?php foreach ($admin as $ad) : ?>
                    <form method="POST" action="<?php echo base_url('admin/data_admin/update_admin_aksi') ?>" enctype="multipart/form-data">
                        <div class="class row">
                            <div class="col-md-6">
                                <input type="text" name="id_admin" value="<?= $ad->id_admin ?>" hidden>
                                <div class="form-group">
                                    <label>Nama Admin</label>
                                    <input type="text" name="nama" class="form-control" value="<?php echo $ad->nama ?>">
                                    <?php echo form_error('nama', '<div class="text-small text-danger">', '</div>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Username Admin</label>
                                    <input type="text" name="username" class="form-control" value="<?php echo $ad->username ?>">
                                    <?php echo form_error('username', '<div class="text-small text-danger">', '</div>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Password Admin</label>
                                    <input type="password" name="password" class="form-control" value="<?php echo $ad->password ?>">
                                    <?php echo form_error('password', '<div class="text-small text-danger">', '</div>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Status Admin</label>
                                    <select name="status" class="form-control" type="text">
                                        <option <?php if ($ad->status == 1) echo "selected"; ?> value="1">Aktif</option>
                                        <option <?php if ($ad->status == 0) echo "selected"; ?> value="0">Tidak Aktif</option>
                                    </select>
                                    <?php echo form_error('status', '<div class="text-small text-danger">', '</div>') ?>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                                <button type="reset" class="btn btn-danger mt-3">Reset</button>                                
                            </div>
                        </div>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>