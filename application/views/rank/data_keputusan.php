<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Rangking</h1>
        </div>
        <button class="btn btn-primary" onclick="tampilhitung()">Show/Hide</button>
        <span class="btn btn-info"><?php echo date('Y-m-d'); ?></span>
        <br>
        <div id="target">
            <form action="<?php echo base_url('admin/data_rangking/insert') ?>" method="POST" enctype="multipart/form-data">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Rangking</th>
                            <th>Nama Siswa</th>
                            <th>Asal Sekolah</th>
                            <th>Nilai</th>
                            <th>Keputusan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $op = 1;
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
                        ?>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-success mt-3">Simpan <i class="fas fa-save"></i></button>
            </form>
        </div>
        <!-- Filter -->
        <!-- <hr>
        <form method="get" action="">
            <label>Filter Berdasarkan</label><br>
            <select name="filter" id="filter">
                <option value="">Pilih</option>
                <option value="1">Per Tanggal</option>
                <option value="2">Per Bulan</option>
                <option value="3">Per Tahun</option>
            </select>
            <br /><br />

            <div id="form-tanggal">
                <label>Tanggal</label><br>
                <input type="text" name="tanggal" class="input-tanggal" />
                <br /><br />
            </div>

            <div id="form-bulan">
                <label>Bulan</label><br>
                <select name="bulan">
                    <option value="">Pilih</option>
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
                <br /><br />
            </div>

            <div id="form-tahun">
                <label>Tahun</label><br>
                <select name="tahun">
                    <option value="">Pilih</option>
                    <?php
                    foreach ($option_tahun as $data) { // Ambil data tahun dari model yang dikirim dari controller
                        echo '<option value="' . $data->tahun . '">' . $data->tahun . '</option>';
                    }
                    ?>
                </select>
                <br /><br />
            </div>

            <button type="submit" class="btn btn-primary mt-3">Tampilkan</button>
            <a href="<?php echo base_url('admin/data_rangking/keputusan'); ?>" class="btn btn-info mt-3">Reset Filter</a>
            <a href="<?php echo $url_cetak; ?>" class="btn btn-danger mt-3" target="_blank">Print PDF <i class="fas fa-print"></i></a>
        </form>
        <hr /> -->
        <hr>
        <form method="GET" action="">
            <label>Filter Berdasarkan</label><br>

            <div id="form-tahun">
                <select name="tahun">
                    <?php
                    foreach ($option_tahun as $data) { // Ambil data tahun dari model yang dikirim dari controller
                        echo '<option value="' . $data->id_periode . '">' . $data->tahun . '</option>';
                    }
                    ?>
                </select>
                <br /><br />
            </div>

            <button type="submit" class="btn btn-primary mt-3">Tampilkan</button>
            <a href="<?php echo base_url('admin/data_rangking/keputusan'); ?>" class="btn btn-info mt-3">Reset Filter</a>
            <a href="<?php echo $url_cetak; ?>" class="btn btn-danger mt-3" target="_blank">Print PDF <i class="fas fa-print"></i></a>
        </form>
        <hr />
        <!-- End Filter -->
        <!-- <b><?php echo $ket; ?></b> -->
        <form action="<?php echo base_url('admin/data_rangking/update') ?>" method="POST" enctype="multipart/form-data">
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Rangking</th>
                        <th>Nama Siswa</th>
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
                                    <?php echo $value->rangking ?>
                                    <input type="hidden" name="id_rank[]" value="<?php echo $value->id_rangking; ?>">
                                </td>
                                <td>
                                    <?php echo $value->nama_siswa ?>
                                </td>
                                <td>
                                    <?php echo $value->nilai ?>
                                </td>
                                <td>
                                    <select name="keputusan[]"" id="" class=" form-control">
                                        <option value="<?php echo $value->keputusan ?>"><?php echo $value->keputusan ?></option>
                                        <option value="<?php echo "Tidak" ?>">Tidak</option>
                                        <option value="<?php echo "Satu Bulan" ?>">Satu Bulan</option>
                                        <option value="<?php echo "Tiga Bulan" ?>">Tiga Bulan</option>
                                        <option value="<?php echo "Enam Bulan" ?>">Enam Bulan</option>
                                        <option value="<?php echo "Satu Tahun" ?>">Satu Tahun</option>
                                    </select>

                                </td>
                                <td>
                                    <a href="<?php echo base_url('admin/data_rangking/delete/') . $value->id_rangking ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                    <?php }
                    } ?>
                    <tr>
                        <td colspan="6"><button type="submit" class="btn btn-primary mt-3">Update <i class="fas fa-edit"></i></button></td>
                    </tr>
                </tbody>
        </form>
        </table>
    </section>
</div>