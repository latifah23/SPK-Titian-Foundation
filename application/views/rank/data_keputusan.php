<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Keputusan</h1>
        </div>
        <div class="card">
            <!-- Filter -->
            <div class="d-flex">
                <form method="GET" action="">
                    <div class="p-2">
                        <!-- <h5>Hasil keputusan</h5> -->
                        <h6>Filter Berdasarkan tahun : <?php echo $ket; ?></h6>
                        <select name="tahun" class="form-control">
                            <?php
                            foreach ($option_tahun as $data) { // Ambil data tahun dari model yang dikirim dari controller
                            ?>
                                <option <?php if ($data->id_periode == $id_thn) echo "selected"; ?> value=" <?php echo $data->id_periode ?>">
                                    <?php echo $data->tahun ?> </option>
                            <?php }
                            ?>
                        </select>
                    </div>
                    <div class="p-2">
                        <button type="submit" class="btn btn-primary mt-3">Tampilkan</button>
                        <a href="<?php echo base_url('admin/data_rangking/keputusan'); ?>" class="btn btn-info mt-3">Reset Filter</a>
                    </div>
                </form>
            </div>
            <div class="card-body p-2">
                <?php echo $this->session->flashdata('pesan') ?>
                <h5>Form input keputusan</h5>
                <form action="<?php echo base_url('admin/data_rangking/insert') ?>" method="POST" enctype="multipart/form-data">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Rangking</th>
                                    <th>Nama Siswa</th>
                                    <th>Asal Sekolah</th>
                                    <th>Nilai Ci</th>
                                    <th>Keputusan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $op = 1;
                                if (!empty($rcdx)) {
                                    arsort($rcdx);
                                    foreach ($rcdx as $key => $value) {
                                ?>
                                        <tr>
                                            <td>
                                                <?= $op ?>
                                                <input type="text" name="id_rank[]" value="<?php echo $op ?>" hidden>
                                            </td>
                                            <?php
                                            $where = array('id_siswa ' => $key);
                                            $alter  = $this->titian_model->get_where_data($where, 'siswa')->result();
                                            foreach ($alter as $ss) {
                                            ?>
                                                <td>
                                                    <?php echo $ss->nama; ?>
                                                </td>
                                                <td>
                                                    <?php echo $ss->asal_sekolah; ?>
                                                </td>
                                            <?php } ?>
                                            <input type="text" name="id_siswa[]" value="<?php echo $ss->id_siswa; ?>" hidden>
                                            <td>
                                                <?= number_format($value, 2) ?>
                                                <input type="text" name="nilai[]" value="<?php echo number_format($value, 2) ?>" hidden>
                                            </td>
                                            <td>
                                                <select name="keputusan[]"" id="" class=" form-control">
                                                    <option value="<?php echo "Tidak" ?>">Tidak</option>
                                                    <option value="<?php echo "Satu Bulan" ?>">Satu Bulan</option>
                                                    <option value="<?php echo "Tiga Bulan" ?>">Tiga Bulan</option>
                                                    <option value="<?php echo "Enam Bulan" ?>">Enam Bulan</option>
                                                    <option value="<?php echo "Satu Tahun" ?>">Satu Tahun</option>
                                                </select>
                                            </td>
                                        </tr>
                                <?php
                                        $op++;
                                    }
                                }
                                ?>
                                <tr>
                                    <td colspan="8" align="right">
                                        <button type="submit" class="btn btn-success mt-3">Simpan <i class="fas fa-save"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body p-2">
                <div class="d-flex">
                    <div class="p-2">
                        <b><?php echo $ket; ?></b>
                    </div>
                    <div class="ml-auto p-2">
                        <a href="<?php echo $url_cetak; ?>" class="btn btn-danger mt-3" target="_blank">Print PDF <i class="fas fa-print"></i></a>
                    </div>
                </div>
                <form action="<?php echo base_url('admin/data_rangking/update') ?>" method="POST" enctype="multipart/form-data">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Rangking</th>
                                    <th>Nama Siswa</th>
                                    <th>Asal Sekolah</th>
                                    <th>Periode</th>
                                    <th>Nilai</th>
                                    <th>Keputusan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($transaksi)) {
                                    $no = 1;
                                    foreach ($transaksi as $value) { ?>
                                        <tr>
                                            <td>
                                                <?php echo $value->tanggal ?>
                                            </td>
                                            <td>
<<<<<<< HEAD
                                                <?php echo $value->keputusan ?>
                                                <input type="hidden" name="id_rank[]" value="<?php echo $value->id_keputusan; ?>">
=======
                                                <?php echo $value->rangking ?>
                                                <input type="hidden" name="id_rank[]" value="<?php echo $value->id_rangking; ?>">
                                                <input type="hidden" name="tahun" value="<?php echo $value->id_periode; ?>">
>>>>>>> 2a69229089e583c2b7cbf6538e8a05ec7e7223af
                                            </td>
                                            <td>
                                                <?php echo $value->nama_siswa ?>
                                            </td>
                                            <td>
                                                <?php echo $value->asal_sekolah ?>
                                            </td>
                                            <td>
                                                <?php
                                                $where = array('id_periode ' => $value->id_periode);
                                                $periodeSiswa  = $this->titian_model->get_where_data($where, 'periode')->result();
                                                foreach ($periodeSiswa as $p) : ?>
                                                    <?php echo $p->tahun ?>
                                                <?php endforeach; ?>
                                            </td>
                                            <td>
                                                <?php echo $value->nilai ?>
                                            </td>
                                            <td>
                                                <select name="keputusan[]"" id="" class=" form-control">
                                                    <option <?php if ($value->keputusan == 'Tidak') echo "selected"; ?> value="<?php echo "Tidak" ?>">Tidak</option>
                                                    <option <?php if ($value->keputusan == 'Satu Bulan') echo "selected"; ?> value="<?php echo "Satu Bulan" ?>">Satu Bulan</option>
                                                    <option <?php if ($value->keputusan == 'Tiga Bulan') echo "selected"; ?> value="<?php echo "Tiga Bulan" ?>">Tiga Bulan</option>
                                                    <option <?php if ($value->keputusan == 'Enam Bulan') echo "selected"; ?> value="<?php echo "Enam Bulan" ?>">Enam Bulan</option>
                                                    <option <?php if ($value->keputusan == 'Satu Tahun') echo "selected"; ?> value="<?php echo "Satu Tahun" ?>">Satu Tahun</option>
                                                </select>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url('admin/data_keputusan/delete/') . $value->id_keputusan ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                <?php }
                                } ?>
                                <tr>
                                    <td colspan="8" align="right">
                                        <button type="submit" class="btn btn-warning mt-3">Update <i class="fas fa-edit"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>