<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Periode</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <form method="POST" action="<?php echo base_url('admin/data_periode/add_periode_aksi') ?>" enctype="multipart/form-data">
                    <div class="class row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Generasi</label>
                                <input type="text" name="generasi" class="form-control">
                                <?php echo form_error('generasi', '<div class="text-small text-danger">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label>Tahun</label>
                                <input type="number" name="tahun" class="form-control" min="2000" max="3000" value="<?php echo date("Y") ?>">
                                <?php echo form_error('tahun', '<div class="text-small text-danger">', '</div>') ?>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                            <button type="reset" class="btn btn-danger mt-3">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>