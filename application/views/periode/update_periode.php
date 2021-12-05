<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Periode</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <?php foreach ($periode as $pr) : ?>
                    <form method="POST" action="<?php echo base_url('admin/data_periode/update_periode_aksi') ?>" enctype="multipart/form-data">
                        <div class="class row">
                            <div class="col-md-6">
                                <!-- <div class="form-group">
                                    <label>Kode</label>
                                    <input type="text" name="id_periode" class="form-control" value="<?= $pr->id_periode ?>" readonly>
                                    <?php echo form_error('kode', '<div class="text-small text-danger">', '</div>') ?>
                                </div> -->
                                <div class="form-group">
                                    <label>Generasi</label>
                                    <input type="text" name="generasi" class="form-control" value="<?php echo $pr->generasi ?>">
                                    <?php echo form_error('generasi', '<div class="text-small text-danger">', '</div>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Tahun</label>
                                    <input type="number" name="tahun" class="form-control" min="2000" max="3000" value="<?php echo $pr->tahun ?>">
                                    <?php echo form_error('tahun', '<div class="text-small text-danger">', '</div>') ?>
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