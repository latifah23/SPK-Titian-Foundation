<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Nilai</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <?php echo $this->session->flashdata('pesan') ?>
                <form method="POST" action="<?php echo base_url('admin/data_nilai_alternatif/add_nilai_aksi') ?>" enctype="multipart/form-data">
                    <div class="class row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Siswa</label>
                                <input type="text" name="nama" class="form-control">
                                <?php echo form_error('nama', '<div class="text-small text-danger">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label>Asal Sekolah</label>
                                <input type="text" name="asal_sekolah" class="form-control">
                                <?php echo form_error('asal_sekolah', '<div class="text-small text-danger">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="">Periode</label>
                                <select name="id_periode" class="form-control">
                                    <option value=""> --Pilih Periode--</option>
                                    <?php foreach ($periode as $sw) : ?>
                                        <option value="<?php echo $sw->id_periode ?>">
                                            <?php echo $sw->tahun ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('id_periode', '<div class="text-small text-danger">', '</div>') ?>
                            </div>
                            <table>
                                <tr>
                                    <th>Nama Kriteria</th>
                                    <th>Nilai</th>
                                </tr>
                                <?php foreach ($kriteria as $key => $value) : ?>
                                    <tr>
                                        <td><?php echo $value->nama_kriteria ?></td>
                                        <td>
                                            <label id="">
                                                <input type="text" name="id_kriteria[]" value="<?= $value->id_kriteria; ?>" hidden>
                                            </label>
                                            <!-- <input type="text" name="nilai[]" value=""> -->
                                            <input type="range" name="nilai[]" value="1" min="1" max="5" oninput="this.nextElementSibling.value = this.value">
                                            <output>1</output>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                            <button type="reset" class="btn btn-danger mt-3">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>