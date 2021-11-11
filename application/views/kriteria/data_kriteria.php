<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Kriteria</h1>
        </div>

        <a href="<?php echo base_url ('admin/data_kriteria/add_kriteria')?>" class="btn btn-primary mb-3">Tambah Data</a>
        
        <?php echo $this->session->flashdata('pesan')?>
        
        <table class="table table-hover table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Kriteria</th>
                    <th>Atribut</th>
                    <th>Bobot</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no=1;
                foreach($kriteria as $kr) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $kr->id_kriteria ?></td>
                    <td><?php echo $kr->nama_kriteria ?></td>
                    <td><?php echo $kr->atribut ?></td>
                    <td><?php echo $kr->bobot ?></td>
                    <td>
                        <a href="<?php echo base_url('admin/data_kriteria/delete_kriteria/').$kr->id_kriteria?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                        <a href="<?php echo base_url('admin/data_kriteria/update_kriteria/').$kr->id_kriteria?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</div>