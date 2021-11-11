<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		td,
		th {
			border: 1px solid #dddddd;
			text-align: left;
			padding: 8px;
		}

		tr:nth-child(even) {
			background-color: #dddddd;
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
	<!-- Advanced Tables -->
	Tabel Nilai Alternatif
	<table>
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
						// echo "<td>" . $key. "</td>";
						echo "<td>" . number_format($key, 2) . "</td>";
					}
					?>
				</tr>
			<?php
			}
			?>
		</tbody>
	</table>
	<!--End Advanced Tables -->
	<!-- Advanced Tables -->

	Tabel Pembagi
	<table>
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
	<!--End Advanced Tables -->
	<!-- Advanced Tables -->
	Tabel Keputusan Ternormalisasi
	<table>
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
	<!--End Advanced Tables -->
	<!-- Advanced Tables -->
	Tabel Keputusan Ternormalisasi dan Terbobot
	<table>
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
	<!--End Advanced Tables -->
	<!-- Advanced Tables -->
	Solusi Ideal Positif (A*) dan Negatif (A-)
	<table>
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
	<!--End Advanced Tables -->
	<!-- Advanced Tables -->
	Jarak Ideal Positif (S*) dan Negatif (S-)
	<table>
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
	<!--End Advanced Tables -->
	<!-- Advanced Tables -->
	Kedekatan Relatif (RC)
	<table>
		<thead>
			<tr>
				<th>No</th>
				<th>Alternatif</th>
				<th>Nilai RC</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$op = 1;
			arsort($rcd);
			foreach ($rcd as $key => $value) {
			?>
				<tr>
					<td><?= $op ?></td>
					<td><?= $key ?></td>
					<td><?= round($value, 2) ?></td>
				</tr>
			<?php
				$op++;
			}
			//$jsondata['ranking'] = $rcd;
			// $testjson=json_encode($jsondata);
			// echo $testjson;
			?>
		</tbody>
	</table>
	<!--End Advanced Tables -->
</body>
</html>