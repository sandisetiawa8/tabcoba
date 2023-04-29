<?php


  $koneksi = new mysqli ("localhost","root","","kkp zawil");

  $sql = $koneksi->query("SELECT SUM(pemasukan) as tot_masuk  from keuangan where jenis = 'PM' and tgl BETWEEN '$date1' AND '$date2'");
  while ($data= $sql->fetch_assoc()) {
    $masuk=$data['tot_masuk'];
  }

  $sql = $koneksi->query("SELECT SUM(pengeluaran) as tot_keluar  from keuangan where jenis = 'TR' and tgl BETWEEN '$date1' AND '$date2'");
  while ($data= $sql->fetch_assoc()) {
    $keluar=$data['tot_keluar'];
  }

  $saldo= $masuk-$keluar;
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Laporan Pengeluaran</title>
</head>

<body>
	<center>
		<h2>LAPORAN PENGELUARAN</h2>
		<h3>BADAN STATISTIK PRINGSEWU</h3>
		<p>Periode :
			<?php $a=$date1; echo date("d-M-Y", strtotime($a))?>
			s/d
			<?php $b=$date2; echo date("d-M-Y", strtotime($b))?>
		
			<p>_________________________________________________________________________________________</p>

			<table border="1" cellspacing="0" style="width: 70%;">
				<thead>
					<tr>
						<th>No.</th>
						<th>kode</th>
						<th>tanggal</th>
						<th>Pengeluaran</th>
						<th>keterangan</th>
						<th>Satuan</th>
					</tr>
				</thead>
				<tbody>
					<?php

        
           
            $sql_tampil = "select * from keuangan where jenis = 'TR' and tgl BETWEEN '$date1' AND '$date2' order by tgl asc";
            
            $query_tampil = mysqli_query($koneksi, $sql_tampil);
            $no=1;
            while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
        ?>
					<tr>
						<td style="text-align: center;">
							<?php echo $no . '.'; ?>
							&emsp;&emsp;&emsp;
						</td>
						<td style="text-align: center;">
							<?php echo $data['kode']; ?>
							&emsp;&emsp;&emsp;
						</td>
						<td style="text-align: center;">
							<?php  $tgl = $data['tgl']; echo date("d/M/Y", strtotime($tgl))?>
							&emsp;&emsp;&emsp;
						</td>
						<td>
							<?php echo rupiah($data['pengeluaran']); ?>
							&emsp;&emsp;&emsp;
						</td>
						<td>
							<?php echo $data['keterangan']; ?>
							&emsp;&emsp;&emsp;
						</td>
						<td>
							<?php echo $data['satuan']; ?>
							&emsp;&emsp;&emsp;
						</td>
					</tr>
					<?php
            $no++;
            }
        ?>
				</tbody>
				<tr>
					<td colspan="3" style="text-align: center;">Total Pengeluaran</td>
					<td colspan="3">
						<?php echo rupiah($keluar); ?>
					</td>
				</tr>
			</table>
	</center>

	<script>
		window.print();
	</script>
</body>

</html>