<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
  </head>
  <body>
    <div class="container">

	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<div class="card table-responsive-sm table-bordered" style="padding: 15px;">
            
        <table class="table table-hover" style="width: 100%;" id="example">
                <thead class="text-center" style="font-size: 15px;">
                    <tr class="text-center">
                        <th class="text-center">No</th>
						<th class="text-center">Email</th>
                        <th class="text-center">Nama Media</th>
						<th class="text-center">Nama Perusahaan</th>
                        <th class="text-center">Pimpinan Redaksi</th>
						<th class="text-center">Alamat</th>
						<th class="text-center">Keterangan</th>
                        <th class="text-center">File Soft</th>
						<th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                        
                    </tr>
                </thead>

                <tbody style="font-size: 15px;">
                <?php 
                $i=1;
                foreach($hasil as $user) {
                
                    ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $user['email']; ?></td>
                        <td><?= $user['nama_media']; ?></td>
						<td><?= $user['nama_perusahaan']; ?></td>
                        <td><?= $user['pimred']; ?></td>
						<td><?= $user['alamat']; ?></td>
						<td class="text-center"><?= $user['keterangan']; ?></td>
                        <td class="text-center"><a href="<?= base_url(); ?>assets/file/softcopy/<?= $user['file']; ?>" download>Download</a></td>
						<td class="text-center"><?= $user['status']; ?></td>

                        <td style="display: flex;">
                            <?php if($user['status'] == 'Menunggu') { ?>
                                <a class="btn btn-sm" href="#" role="button" style="margin-right: 5px; background-color: #f58d42; width: 100%;" onclick="verifikasi('<?= base_url('verifikator/verifikasi/'.$user['id']); ?>')">Verifikasi</a>
                                
                            <?php }else if($user['status'] == 'Sedang diverifikasi') { ?>
                                <a class="btn btn-primary btn-sm" href="#" role="button" style="margin-right: 5px; width: 50%;" onclick="setujui('<?= base_url('verifikator/setujui/'.$user['id']); ?>')">Setuju</a>
                                <a class="btn btn-danger btn-sm" href="#" role="button" style="margin-right: 5px; width: 50%;" onclick="tolak('<?= base_url('verifikator/setujui/'.$user['id']); ?>')">Tolak</a>
                            <?php } ?>
                        </td>

                    </tr>
                <?php } ?>
                </tbody>
            </table>
			</div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
    $('#example').DataTable();
    });
    </script>

            <footer class="sticky-footer bg-white" style="margin-top: 15%;">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SIKAM Jejama <?= date('Y'); ?></span>
                    </div>
                </div>
            </footer>

            <script src="sweetalert2.all.min.js"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <script>
                function setujui(href) {
                    Swal.fire({
                        icon: 'info',
                        title: 'Anda Yakin ?',
                        text: 'Menyetujui Proposal Kerjasama Ini',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#7055dd',
                        confirmButtonText: 'Setuju!!',
                        closeOnConfirm: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = href;
                            Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Berhasil',
                            showConfirmButton: true,
                            timer: 15000
                            })
                        }
                    })
                }
            </script>

            <script>
                function tolak(href) {
                    Swal.fire({
                        icon: 'info',
                        title: 'Anda Yakin ?',
                        text: 'Menolak Proposal Kerjasama Ini',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#c23a3a',
                        confirmButtonText: 'Tolak!!',
                        closeOnConfirm: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = href;
                            Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Berhasil',
                            showConfirmButton: true,
                            // timer: 15000
                            })
                        }
                    })
                }
            </script>

            <script>
                function verifikasi(href) {
                    Swal.fire({
                        icon: 'info',
                        title: 'Anda Yakin ?',
                        text: 'Meninjau Proposal Kerjasama Ini',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: 'rebeccapurple',
                        confirmButtonText: 'Tinjau!!',
                        closeOnConfirm: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = href;
                            Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Berhasil',
                            showConfirmButton: true,
                            // timer: 15000
                            })
                        }
                    })
                }
            </script>
  </body>
</html>