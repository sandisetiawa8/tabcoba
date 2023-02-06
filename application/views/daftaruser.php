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
        <table class="table table-hover" id="example">
                <thead style="text-align: center;">
                    <tr>
                        <th  style="text-align: center;">No</th>
                        <th  style="text-align: center;">Nama</th>
                        <th  style="text-align: center;">Email</th>
                        <th  style="text-align: center;">Image</th>
                        <th  style="text-align: center;">Tanggal Pendaftaran</th>
                    </tr>
                </thead>

                <tbody>
                <?php 
                $i=1;
                foreach($hasil as $user) {
                    
                
                    ?>
                    <tr>
                        <th scope="row"  style="text-align: center;"><?= $i++; ?></th>
                        <td><?= $user['nama']; ?></td>
                        <td><?= $user['email']; ?></td>
                        <td><?= $user['image']; ?></td>
                        <td><?= date('d F Y', $user['date_created']); ?></td> 
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
  </body>
</html>