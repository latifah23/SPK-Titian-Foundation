<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Admin</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <?php foreach ($admin as $ad) : ?>
                <form method="POST" action="<?php echo base_url('admin/data_admin/update_admin_aksi')?>"enctype="multipart/form-data">
                <div class="class row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status Admin</label>
                            <select name="status" class="form-control" type="text"> value="<?php echo $ad->status?>">
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                            <?php echo form_error('status','<div class="text-small text-danger">','</div>')?>
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