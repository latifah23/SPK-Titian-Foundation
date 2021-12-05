<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Siswa</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <?php foreach ($siswa as $sw) : ?>
                    <form method="POST" action="<?php echo base_url('admin/data_siswa/update_siswa_aksi') ?>" enctype="multipart/form-data">
                        <div class="class row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kode</label>
                                    <input type="text" name="id_siswa" class="form-control" value="<?= $sw->id_siswa ?>" readonly>
                                    <?php echo form_error('nama', '<div class="text-small text-danger">', '</div>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Nama Siswa</label>
                                    <input type="text" name="nama" class="form-control" value="<?php echo $sw->nama ?>">
                                    <?php echo form_error('nama', '<div class="text-small text-danger">', '</div>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Asal Sekolah</label>
                                    <input type="text" name="asal_sekolah" class="form-control" value="<?php echo $sw->asal_sekolah ?>">
                                    <?php echo form_error('asal_sekolah', '<div class="text-small text-danger">', '</div>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Periode</label>
                                    <select name="id_periode" class="form-control">
                                        <?php
                                        $where = array('id_periode ' => $sw->id_periode);
                                        $periodeSiswa  = $this->titian_model->get_where_data($where, 'periode')->result();
                                        foreach ($periodeSiswa as $p) : ?>
                                            <option value="<?php echo $p->id_periode; ?>">---<?php echo $p->tahun ?>---</option>
                                        <?php endforeach; ?>
                                        <?php foreach ($periode as $sw) : ?>
                                            <option value="<?php echo $sw->id_periode ?>">
                                                <?php echo $sw->tahun ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php echo form_error('id_periode', '<div class="text-small text-danger">', '</div>') ?>
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