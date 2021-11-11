<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Admin</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <form method="POST" action="<?php echo base_url('admin/data_admin/add_admin_aksi')?>"enctype="multipart/form-data">
                <div class="class row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Admin</label>
                            <input type="text" name="nama" class="form-control">
                            <?php echo form_error('nama','<div class="text-small text-danger">','</div>')?>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control">
                            <?php echo form_error('username','<div class="text-small text-danger">','</div>')?>
                        </div>
                        
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        <button type="reset" class="btn btn-danger mt-3">Reset</button>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                            <?php echo form_error('password','<div class="text-small text-danger">','</div>')?>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value=""selected disabled>Pilih Status</option>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>                            
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>
</div>