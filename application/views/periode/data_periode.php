<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Periode</h1>
        </div>

        <a href="<?php echo base_url ('admin/data_periode/add_periode')?>" class="btn btn-primary mb-3">Tambah Data</a>
        
        <?php echo $this->session->flashdata('pesan')?>
        
        <table class="table table-hover table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Generasi</th>
                    <th>Tahun Angkatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no=1;
                foreach($periode as $pr) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $pr->id_periode ?></td>
                    <td><?php echo $pr->generasi ?></td>
                    <td><?php echo $pr->tahun ?></td>
                    <td>
                        <a href="<?php echo base_url('admin/data_periode/delete_periode/').$pr->id_periode?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                        <a href="<?php echo base_url('admin/data_periode/update_periode/').$pr->id_periode?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</div>