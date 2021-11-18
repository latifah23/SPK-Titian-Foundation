<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Nilai Siswa</h1>
        </div>

        <a href="<?php echo base_url('admin/data_nilai_alternatif/add_nilai') ?>" class="btn btn-primary mb-3">Tambah Data</a>
        <?php echo $this->session->flashdata('pesan') ?>
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Periode</th>
                        <?php foreach ($kriteria as $value) {
                            echo "<th>" . $value->nama_kriteria . "</th>";
                        } ?>
                        <th colspan="2"><center>Aksi</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1;
                    foreach ($nama as $key => $value) :
                        $where = array('id_siswa ' => $value->id_siswa);
                        $nilai_alternatif  = $this->titian_model->get_where_data($where, 'nilai_alternatif')->result();
                    ?>
                        <tr>
                            <td><?php echo $count++  ?></td>
                            <td><?php echo $value->nama ?></td>
                            <td><?php echo $value->tahun ?></td>                            
                            <?php foreach ($nilai_alternatif as $key => $value2) { ?>
                                <td><?php echo $value2->nilai ?></td>
                            <?php } ?>
                            <td>
                                <a href="<?php echo base_url('admin/data_nilai_alternatif/delete_nilai/') . $value->id_siswa ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                            <td>
                                <a href="<?php echo base_url('admin/data_nilai_alternatif/update_nilai/') . $value->id_siswa ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</div>