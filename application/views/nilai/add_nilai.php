<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Nilai</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <?php echo $this->session->flashdata('pesan') ?>
                <form method="POST" action="<?php echo base_url('admin/data_nilai/add_nilai_aksi') ?>" enctype="multipart/form-data">
                    <div class="class row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Siswa</label>
                                <select name="id_siswa" class="form-control">
                                    <option value=""> --Pilih Nama Siswa--</option>
                                    <?php foreach ($siswa as $sw) : ?>
                                        <option value="<?php echo $sw->id_siswa ?>">
                                            <?php echo $sw->nama ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('id_siswa', '<div class="text-small text-danger">', '</div>') ?>
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