<div class="">
    <div class="">
        <div id="" style="margin-left: 1.5cm;margin-right: 1.5cm;">
            <hr style="border-top:3px double black;">
            <table width="100%">
                <tr>
                    <td style="text-align:center">
                        <h3>LAPORAN EVALUASI TAHUNAN GENERASI <?= $gen ?></h3>
                        <h3>PERIODE <?= $thn ?></h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <center>
                            <table border="1" cellpadding="5">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Asal Sekolah</th>
                                        <th>Periode</th>
                                        <?php foreach ($kriteria as $value) {
                                            echo "<th>" . $value->nama_kriteria . "</th>";
                                        } ?>
                                        <th>Nilai Ci</th>
                                        <th>Keputusan</th>
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
                                            <td><?php echo $value->asal_sekolah ?></td>
                                            <td><?php echo $value->tahun ?></td>
                                            <?php foreach ($nilai_alternatif as $value2) { ?>
                                                <td><?php echo $value2->nilai ?></td>
                                            <?php } ?>
                                            <td>
                                                <?php
                                                $op = 1;
                                                if (!empty($rcdx)) {
                                                    arsort($rcdx);
                                                    echo number_format($rcdx[$value->id_siswa], 2);
                                                }
                                                ?>
                                            </td>
                                            <?php $where = array('id_siswa ' => $value->id_siswa);
                                            $x  = $this->titian_model->get_where_data($where, 'rangking')->result();
                                            if (!empty($x)) {
                                                foreach ($x as $data) {
                                                    // echo "<td>" . $data->nilai . "</td>";
                                                    echo "<td>" . $data->keputusan . "</td>";
                                                }
                                            } else {
                                                echo "<td> !!! <b>Belum di isi</b> !!!</td>";
                                            }
                                            ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </center>
                    </td>
                </tr>
            </table>
            <table width="100%">
                <tr>
                    <td style="text-align:justify">
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    window.print();
</script>