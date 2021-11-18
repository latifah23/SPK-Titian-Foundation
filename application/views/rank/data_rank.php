<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Rangking</h1>
        </div>
        <div class="col-12">
            <div class="card">
                <!-- Filter -->
                <div class="d-flex">
                    <form method="GET" action="">
                        <div class="p-2">
                            <h5>Hasil Rangking</h5>
                            <h6>Filter Siswa berdasarkan tahun : </h6>
                            <select name="tahun" class="form-control">
                                <?php
                                echo '<option value=""> --- ' . $thn. ' --- </option>';
                                foreach ($option_tahun as $data) { // Ambil data tahun dari model yang dikirim dari controller
                                    echo '<option value="' . $data->id_periode . '">' . $data->tahun . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="p-2">
                            <button type="submit" class="btn btn-primary mt-3">Tampilkan</button>
                            <a href="<?php echo base_url('admin/data_rangking/'); ?>" class="btn btn-info mt-3">Reset Filter</a>
                        </div>
                    </form>
                    <div class="ml-auto p-2">
                        <button class="btn btn-primary" onclick="tampilhitung()">
                            Tampilkan perhitungan
                            <i class="fas fa-calculator"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <b><?php echo $ket; ?></b>
                    <div id="target">
                        <!-- Tabel Nilai Alternatif -->
                        <h5>Tabel Nilai Alternatif</h5>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Alternatif</th>
                                        <?php
                                        if (isset($krit)) {
                                            foreach ($krit as $key) {
                                        ?>
                                                <th>
                                                    <?= $key->nama_kriteria ?>
                                                </th>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($nilaialter)) {
                                        foreach ($nilaialter as $key2) {
                                    ?>
                                            <tr>
                                                <td><?= $key2['no'] ?></td>
                                                <td><?= $key2['nama'] ?></td>
                                                <?php
                                                foreach ($key2['nilai'] as $key) {
                                                    // echo "<td>" . round($key,2). "</td>";
                                                    echo "<td>" . number_format($key, 2) . "</td>";
                                                }
                                                ?>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- End Tabel Nilai Alternatif -->
                        <!-- Tabel Pembagi -->
                        <h5>Tabel Pembagi</h5>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <th>Keterangan</th>
                                    <?php
                                    if (isset($krit)) {
                                        foreach ($krit as $key) {
                                    ?>
                                            <th>
                                                <?= $key->nama_kriteria ?>
                                            </th>
                                    <?php
                                        }
                                    }
                                    ?>
                                </thead>
                                <tr>
                                    <td>Nilai Pembagi</td>
                                    <?php
                                    if (isset($cekpembagi)) {
                                        foreach ($cekpembagi as $key) {
                                            echo "<td>" . number_format($key, 2) . "</td>";
                                        }
                                    }
                                    ?>
                                </tr>
                            </table>
                        </div>
                        <!-- End Tabel Pembagi -->
                        <!-- Tabel Keputusan Ternormalisasi -->
                        <h5>Tabel Keputusan Ternormalisasi</h5>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Alternatif</th>
                                        <?php
                                        if (isset($krit)) {
                                            foreach ($krit as $key) {
                                        ?>
                                                <th>
                                                    <?= $key->nama_kriteria ?>
                                                </th>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($tabkep)) {
                                        foreach ($tabkep as $key2) {
                                    ?>
                                            <tr>
                                                <td><?= $key2['no'] ?></td>
                                                <td><?= $key2['nama'] ?></td>
                                                <?php
                                                foreach ($key2['nilai'] as $key) {
                                                    echo "<td>" . number_format($key, 2) . "</td>";
                                                }
                                                ?>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- End Tabel Keputusan Ternormalisasi -->
                        <!-- Tabel Keputusan Ternormalisasi dan Terbobot -->
                        <h5>Tabel Keputusan Ternormalisasi dan Terbobot</h5>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Alternatif</th>
                                        <?php
                                        if (isset($krit)) {
                                            foreach ($krit as $key) {
                                        ?>
                                                <th>
                                                    <?= $key->nama_kriteria ?>
                                                </th>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($tabbot)) {
                                        foreach ($tabbot as $key) {
                                    ?>
                                            <tr>
                                                <td><?= $key['no'] ?></td>
                                                <td><?= $key['nama'] ?></td>
                                                <?php
                                                foreach ($key['nilai'] as $key) {
                                                    echo "<td>" . number_format($key, 2) . "</td>";
                                                }
                                                ?>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- End Tabel Keputusan Ternormalisasi dan Terbobot -->
                        <!-- Solusi Ideal Positif (A*) dan Negatif (A-) -->
                        <h5>Solusi Ideal Positif (A+) dan Negatif (A-)</h5>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Solusi Ideal</th>
                                        <?php
                                        if (isset($krit)) {
                                            foreach ($krit as $key) {
                                        ?>
                                                <th>
                                                    <?= $key->nama_kriteria ?>
                                                </th>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>A*</td>
                                        <?php
                                        if (isset($plus)) {
                                            foreach ($plus as $key => $value) {
                                        ?>
                                                <td><?= number_format($value, 2) ?></td>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>A-</td>
                                        <?php
                                        if (isset($min)) {
                                            foreach ($min as $key => $value) {
                                        ?>
                                                <td><?= number_format($value, 2) ?></td>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- End Solusi Ideal Positif (A*) dan Negatif (A-) -->
                        <!-- Jarak Ideal Positif (S*) dan Negatif (S-) -->
                        <h5>Jarak Ideal Positif (D+) dan Negatif (D-)</h5>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Alternatif</th>
                                        <th>Nilai D+</th>
                                        <th>Nilai D-</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($jaridl)) {
                                        foreach ($jaridl as $key2) {
                                    ?>
                                            <tr>
                                                <td><?= $key2['no'] ?></td>
                                                <td><?= $key2['nama'] ?></td>
                                                <td><?= number_format($key2['jarakpositif'], 2) ?></td>
                                                <td><?= number_format($key2['jaraknegatif'], 2) ?></td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- End Jarak Ideal Positif (S*) dan Negatif (S-) -->
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Rangking</th>
                                    <th>Nama Siswa</th>
                                    <th>Asal Sekolah</th>
                                    <th>Nilai Ci</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $op = 1;
                                if (isset($rcdx)) {
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
                                        </tr>
                                <?php
                                        $op++;
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </section>
</div>