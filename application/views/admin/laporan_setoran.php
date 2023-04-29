<?php


//   $koneksi = new mysqli ("localhost","root","","tabungan");
include "assets/inc/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Laporan Setoran</title>
</head>

<body>
	<center>
		<h2>LAPORAN SETORAN</h2>
		<h1>SD NEGERI 20 WAYLIMA</h1>
		
			
			<p>______________________________________________________________________________________</p>

		<table border="0" cellspacing="0" style="width: 70%; justify-content: center;">
				
					<tr>
						<?php foreach($nama as $data) { ?>
						<td style="width: 8%;"></td>
						<td style="width: 50%; margin-left: 10px;">Nama: <?= $data['nama'] ?></td>
						<?php } ?>
                        <td style="width: 15%;"></td>
                        <td style="width: 27%;" style="text-align: end;">NIS: <?= $data['nis']; ?> </td>
					</tr>
				
		</table>
						
		<br>

			<table border="1" cellspacing="0" style="width: 70%;">
				<thead>
					<tr>
						<th class="text-center">No</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Jumlah Setoran</th>
					</tr>
				</thead>
				<tbody>
				<?php 
                $i=1;
                foreach($hasil as $data) {
                ?>
                    <tr>
                        <th scope="row"  style="text-align: center;"><?= $i++ . '.'; ?></th>
                        <td style="text-align: center;" ><?php $tgl = $data['tgl']; echo date("d M Y", strtotime($tgl)) ?></td>
                        <td><?= rupiah($data['setoran']); ?></td>
                        
                    </tr>
                <?php } ?>
                </tbody>
				<tr>
                <?php foreach($total as $user) { ?>
                <tr>
					<td colspan="2" style="text-align: center;">Total Setoran</td>
					<td colspan="2">
						<?= rupiah($user['setoran']) ?>
                        
					</td>
				</tr>
                <?php } ?>
					
			</table>
	</center>

	<script>
		window.print();
	</script>
</body>

</html>