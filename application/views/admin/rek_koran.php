<!DOCTYPE html>
<html lang="en">

<head>
	<title>Laporan Tabungan Siswa</title>
</head>

<body>
	<center>
		<h2>LAPORAN TABUNGAN SISWA</h2>
		<h2>SD NEGERI 20 WAYLIMA</h2>
			
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
                        <th class="text-center">Jumlah Penarikan</th>
					</tr>
				</thead>
				<tbody>
				<?php 
                $i=1;
                foreach($hasil as $data) {
                ?>
					<?php if($data['tgl'] != '0000-00-00') { ?>
                    <tr>
                        <th scope="row"  style="text-align: center;"><?= $i++ . '.'; ?></th>
                        <td style="text-align: center;" ><?php $tgl = $data['tgl']; echo date("d M Y", strtotime($tgl)) ?></td>
                        <td><?= rupiah($data['setoran']); ?></td>
                        <td><?= rupiah($data['penarikan']); ?></td>
                    </tr>
					<?php } ?>
                    <?php } ?>
                </tbody>
				<tr>
                <?php foreach($jumlah_semua as $saldo) { ?>
                <tr>
					<td colspan="2" style="text-align: center;"><b>Total Saldo Akhir</b></td>
					<td colspan="2">
                       <b> <?= rupiah($saldo['setoran'] - $saldo['penarikan']); ?> </b>
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