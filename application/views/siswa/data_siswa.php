<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Siswa</h1>
        </div>

        <a href="<?php echo base_url('admin/data_nilai_alternatif') ?>" class="btn btn-primary mb-3">Kembali -> Data Nilai Alternatif</a>

        <?php echo $this->session->flashdata('pesan') ?>

        <table class="table table-hover table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Siswa</th>
                    <th>Asal Sekolah</th>
                    <th>Periode</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($siswa as $sw) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $sw->id_siswa ?></td>
                        <td><?php echo $sw->nama ?></td>
                        <td><?php echo $sw->asal_sekolah ?></td>
                        <td>
                            <?php
                            $where = array('id_periode ' => $sw->id_periode);
                            $periode  = $this->titian_model->get_where_data($where, 'periode')->result();
                            foreach ($periode as $p) {
                                echo $p->tahun;
                            }
                            ?>
                        </td>
                        <td>
                            <a href="<?php echo base_url('admin/data_siswa/delete_siswa/') . $sw->id_siswa ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            <a href="<?php echo base_url('admin/data_siswa/update_siswa/') . $sw->id_siswa ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</div>