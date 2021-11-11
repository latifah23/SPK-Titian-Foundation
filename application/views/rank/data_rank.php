<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Rangking</h1>
        </div>
        <button class="btn btn-primary" onclick="tampilhitung()">Show/Hide</button>
        <a href="<?php echo base_url('admin/data_rangking/keputusan/'); ?>"><button type="submit" class="btn btn-info">Keputusan <i class="fas fa-edit"></i></button></a>
        <div id="target">
            <!-- Tabel Nilai Alternatif -->
            <h5>Tabel Nilai Alternatif</h5>
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
            <!-- End Tabel Nilai Alternatif -->
            <!-- Tabel Pembagi -->
            <h5>Tabel Pembagi</h5>
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
            <!-- End Tabel Pembagi -->
            <!-- Tabel Keputusan Ternormalisasi -->
            <h5>Tabel Keputusan Ternormalisasi</h5>
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
            <!-- End Tabel Keputusan Ternormalisasi -->
            <!-- Tabel Keputusan Ternormalisasi dan Terbobot -->
            <h5>Tabel Keputusan Ternormalisasi dan Terbobot</h5>
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
            <!-- End Tabel Keputusan Ternormalisasi dan Terbobot -->
            <!-- Solusi Ideal Positif (A*) dan Negatif (A-) -->
            <h5>Solusi Ideal Positif (A*) dan Negatif (A-)</h5>
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
            <!-- End Solusi Ideal Positif (A*) dan Negatif (A-) -->
            <!-- Jarak Ideal Positif (S*) dan Negatif (S-) -->
            <h5>Jarak Ideal Positif (S*) dan Negatif (S-)</h5>
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Alternatif</th>
                        <th>Nilai S*</th>
                        <th>Nilai S-</th>
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
            <!-- End Jarak Ideal Positif (S*) dan Negatif (S-) -->
        </div>
        <hr>
        <!-- <form action="<?php echo base_url('admin/data_rangking/insert') ?>" method="POST" enctype="multipart/form-data"> -->
        <table class="table table-hover table-striped table-bordered">
            <thead>
                <tr>
                    <th>Rangking</th>
                    <th>Nama Siswa</th>
                    <th>Asal Sekolah</th>
                    <th>Nilai</th>
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
                        <td>
                            <?= number_format($value, 2) ?>
                        </td>
                    </tr>
                <?php
                    $op++;
                }
                ?>
            </tbody>
        </table>
    </section>
</div>