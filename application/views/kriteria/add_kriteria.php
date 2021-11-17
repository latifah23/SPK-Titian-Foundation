<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Kriteria</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <form method="POST" action="<?php echo base_url('admin/data_kriteria/add_kriteria_aksi')?>"enctype="multipart/form-data">
                <div class="class row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Kriteria</label>
                            <input type="text" name="nama_kriteria" class="form-control">
                            <?php echo form_error('nama_kriteria','<div class="text-small text-danger">','</div>')?>
                        </div>
                        <div class="form-group">
                            <label>Atribut</label>
                            <?php echo form_error('atribut','<div class="text-small text-danger">','</div>')?>
                            <select class="form-control">
                                        <option value="<?php echo "Benefit" ?>">Benefit</option>
                                        <option value="<?php echo "Cost" ?>">Cost</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Bobot</label>
                            <input type="text" name="bobot" class="form-control">
                            <?php echo form_error('bobot','<div class="text-small text-danger">','</div>')?>
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