<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Update Data Kriteria</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <?php foreach ($kriteria as $ad) : ?>
                    <form method="POST" action="<?php echo base_url('admin/data_kriteria/update_kriteria_aksi') ?>" enctype="multipart/form-data">
                        <div class="class row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kode</label>
                                    <input type="text" name="id_kriteria" class="form-control" value="<?= $ad->id_kriteria ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Nama Kriteria</label>
                                    <input type="text" name="nama_kriteria" class="form-control" value="<?php echo $ad->nama_kriteria ?>">
                                    <?php echo form_error('nama_kriteria', '<div class="text-small text-danger">', '</div>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Atribut</label>                                    
                                    <?php echo form_error('atribut', '<div class="text-small text-danger">', '</div>') ?>
                                    <select name="atribut" class="form-control">
                                        <option <?php if ($ad->atribut == 'Benefit') echo "selected"; ?>  value="<?php echo "Benefit" ?>">Benefit</option>
                                        <option <?php if ($ad->atribut == 'Cost') echo "selected"; ?>  value="<?php echo "Cost" ?>">Cost</option>                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Bobot</label>
                                    <input type="number" name="bobot" class="form-control" value="<?php echo $ad->bobot ?>" step=".1">
                                    <?php echo form_error('bobot', '<div class="text-small text-danger">', '</div>') ?>
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