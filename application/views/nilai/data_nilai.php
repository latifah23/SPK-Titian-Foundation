<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Nilai</h1>
        </div>

        <a href="<?php echo base_url ('admin/data_nilai/add_nilai')?>" class="btn btn-primary mb-3">Tambah Data</a>
        
        <?php echo $this->session->flashdata('pesan')?>
        
        <table class="table table-hover table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kriteria</th>
                    <th>Nilai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no=1;
                foreach($hasil_nilai as $nl) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $nl['nama'] ?></td>
                    <td><?php echo $nl['nama_kriteria'] ?></td>
                    <td><?php echo $nl['nilai'] ?></td>
                    <td>
                        <a href="<?php echo base_url('admin/data_nilai/delete_nilai/').$nl['id_siswa']?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                        <a href="<?php echo base_url('admin/data_nilai/update_nilai/').$nl['id_siswa']?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</div>