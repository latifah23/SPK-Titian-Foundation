<html>

<head>
    <title>Cetak PDF</title>
    <style>
        table {
            border-collapse: collapse;
            table-layout: fixed;
            width: 630px;
        }

        table td {
            word-wrap: break-word;
            width: 20%;
        }
    </style>
    <style type="text/css" media="print">
        @page {
            size: auto;
            /* auto is the initial value */
            margin: 0mm;
            /* this affects the margin in the printer settings */
        }
    </style>
</head>

<body>
    <b><?php echo $ket; ?></b><br /><br />

    <table border="1" cellpadding="8">
        <tr>
            <th>Tanggal</th>
            <th>Rangking</th>
            <th>Nama Siswa</th>
            <th>Nilai</th>
            <th>Keputusan</th>
        </tr>

        <?php
        if (!empty($transaksi)) {
            $no = 1;
            foreach ($transaksi as $data) {
                $tgl = date('d-m-Y', strtotime($data->tanggal));

                echo "<tr>";
                echo "<td>" . $tgl . "</td>";
                echo "<td>" . $data->rangking . "</td>";
                echo "<td>" . $data->nama_siswa . "</td>";
                echo "<td>" . $data->nilai . "</td>";
                echo "<td>" . $data->keputusan . "</td>";
                echo "</tr>";
                $no++;
            }
        }
        ?>
    </table>
</body>
<script type="text/javascript">
    window.print();
</script>

</html>