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
						
						<td style="width: 12%;"></td>
						<td style="width: 20%; margin-left: 10px;">Nama: <?= $user['nama'] ?></td>
                        <td style="width: 2%;"></td>
                        <td style="width: 22%;" style="text-align: end;">NIS: <?= $user['nis']; ?> </td>
					</tr>
				
		</table>
						
		<br>

		<table class="table table-hover align-middle" border="1" id="example">
                <thead style="text-align: center;">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Jumlah Setoran</th>
                        <th class="text-center">Jumlah Penarikan</th>
					</tr>
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
                        <td><?= rupiah($data['penarikan']); ?></td>
                        
                    </tr>
                <?php } ?>
               </tbody>
              
				<tr>
					<td colspan="2" style="text-align: center;"><b>Total TabunganKu</b></td>
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