<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Rangking</h1>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4></h4>
                    <div class="card-header-action">
                        <div class="input-group">
                            <button class="btn btn-primary" onclick="tampilhitung()">
                                Tampilkan perhitungan
                                <i class="fas fa-th"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
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
                                        foreach ($krit as $key) {
                                        ?>
                                            <th>
                                                <?= $key->nama_kriteria ?>
                                            </th>
                                        <?php
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
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
                                    foreach ($krit as $key) {
                                    ?>
                                        <th>
                                            <?= $key->nama_kriteria ?>
                                        </th>
                                    <?php
                                    }
                                    ?>
                                </thead>
                                <tr>
                                    <td>Nilai Pembagi</td>
                                    <?php
                                    foreach ($cekpembagi as $key) {
                                        echo "<td>" . number_format($key, 2) . "</td>";
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
                                        foreach ($krit as $key) {
                                        ?>
                                            <th>
                                                <?= $key->nama_kriteria ?>
                                            </th>
                                        <?php
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
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
                                        foreach ($krit as $key) {
                                        ?>
                                            <th>
                                                <?= $key->nama_kriteria ?>
                                            </th>
                                        <?php
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
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
                                        foreach ($krit as $key) {
                                        ?>
                                            <th>
                                                <?= $key->nama_kriteria ?>
                                            </th>
                                        <?php
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>A*</td>
                                        <?php
                                        foreach ($plus as $key => $value) {
                                        ?>
                                            <td><?= number_format($value, 2) ?></td>
                                        <?php
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>A-</td>
                                        <?php
                                        foreach ($min as $key => $value) {
                                        ?>
                                            <td><?= number_format($value, 2) ?></td>
                                        <?php
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