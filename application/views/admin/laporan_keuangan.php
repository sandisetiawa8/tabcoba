<?php


//   $koneksi = new mysqli ("localhost","root","","tabungan");
include "assets/inc/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Laporan Keuangan</title>
</head>

<body>
	<center>
		<h2 style="margin-top: 50px;">LAPORAN KEUANGAN TABUNGAN SISWA</h2>
		<h2>SD NEGERI 20 WAYLIMA</h2>
        <h2 style="margin-bottom: -20px;">Kelas <?= $user['kelas']; ?></h2>
			<p>____________________________________________________________________________</p>

	

			<table border="1" cellspacing="0" style="width: 70%; margin-top: 30px;">
				<thead>
					<tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">NIS</th>
                        <th class="text-center">Jumlah Tabungan</th>
					</tr>
				</thead>
				<tbody>
               <?php 
                $i=1;
                foreach($saldo as $data) {
                ?>
                    <tr>
                        <th scope="row" style="text-align: center;"><?= $i++ . '.'; ?></th>
                        <td class="text-center"><?= $data['nama']; ?></td>
                        <td class="text-center" style="text-align: center;"><?= $data['nis']; ?></td>
                        <td><?= rupiah($data['setoran'] - $data['penarikan']); ?></td>
                    </tr>
                <?php } ?>
               </tbody>
              
				<tr>
					<td colspan="3" style="text-align: center;"><b>Total Tabungan Semua Siswa</b></td>
                    <?php foreach($jumlah_semua as $data) { ?>
					<td colspan="2" >
                           <b> <?= rupiah($data['setoran'] - $data['penarikan']); ?> </b>
                        </td>
                        <?php } ?>
				</tr>
					
			</table>
	</center>

	<script>
		window.print();
	</script>
</body>

</html>