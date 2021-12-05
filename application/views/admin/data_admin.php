<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Admin</h1>
        </div>

        <!-- <a href="<?php echo base_url ('admin/data_admin/add_admin')?>" class="btn btn-primary mb-3">Tambah Data</a> -->
        
        <?php echo $this->session->flashdata('pesan')?>

        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Admin</th>
                        <th>Username</th>                        
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1;
                    foreach($admin as $ad) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $ad->nama ?></td>
                        <td><?php echo $ad->username?></td>
                        <td><?php
                        if ($ad->status == "0") {
                            echo "<span class= 'badge badge-danger'>Tidak Aktif</span>";
                        }else {
                            echo "<span class= 'badge badge-primary'>Aktif</span>";
                        }
                        ?></td>
                        <td>
                            <a href="<?php echo base_url('admin/data_admin/delete_admin/').$ad->id_admin?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            <a href="<?php echo base_url('admin/data_admin/update_admin/').$ad->id_admin?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
            
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</div>