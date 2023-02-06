<!DOCTYPE html>
<html>
<head>
    <title>Update Proposal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <?php

    //Include file koneksi, untuk koneksikan ke database
    $koneksi = new mysqli ("localhost","root","","kerjasama");

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id
    if (isset($_GET['id'])) {
        $id=input($_GET["id"]);

        $sql="select * from tb_proposal where id=$id";
        $hasil=mysqli_query($koneksi,$sql);
        $data = mysqli_fetch_assoc($hasil);


    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id=htmlspecialchars($_POST["id"]);
        $email=input($_POST['email']);
        $namamedia=input($_POST["namamedia"]);
        $kabiro=input($_POST["kabiro"]);
        $pimred=input($_POST["pimred"]);
        $namaperusahaan=input($_POST["namaperusahaan"]);
        $alamat=input($_POST["alamat"]);
        $npwp=input($_POST["npwp"]);
        $no_rek=input($_POST["rekening"]);
        $no_siup=input($_POST["siup"]);
        $keterangan=input($_POST["keterangan"]);
        // $file=input($_POST["file"]);

        //Query update data pada tabel tb_proposal
        $sql="update tb_proposal set
        email='$email',
        namamedia='$namamedia',
        kabiro='$kabiro',
        pimred='$pimred',
        namaperusahaan='$namaperusahaan',
        alamat='$alamat',
              npwp='$npwp',
              no_rek='$no_rek',
              no_siup='$no_siup',
              keterangan='$keterangan'
              
        where id=$id";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($koneksi,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            redirect('admin/daftarproposal');
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }

    ?>
    <h2>Update Data Proposal</h2>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <div class="mb-3">
              <label for="namamedia" class="form-label">Nama Media</label>
              <input type="text" class="form-control" name="namamedia" id="namamedia" />
            </div>
            <div class="mb-3">
              <label for="kabiro" class="form-label">Nama Kabiro</label>
              <input type="text" class="form-control" name="kabiro" id="kabiro" />
            </div>
            <div class="mb-3">
              <label for="pimred" class="form-label">Nama Pimpinan Redaksi</label>
              <input type="text" class="form-control" name="pimred" id="pimred" />
            </div>
            <div class="mb-3">
              <label for="namaperusahaan" class="form-label">Nama Perusahaan</label>
              <input type="text" class="form-control" name="namaperusahaan" id="namaperusahaan" />
            </div>
            <div class="mb-3">
              <label for="alamat" class="form-label">Alamat</label>
              <input type="text" class="form-control" name="alamat" id="alamat" />
            </div>
            <div class="mb-3">
              <label for="npwp" class="form-label">Nomor NPWP</label>
              <input type="text" class="form-control" name="npwp" id="npwp" />
            </div>
            <div class="mb-3">
              <label for="rekening" class="form-label">Nomor Rekening</label>
              <input type="text" class="form-control" name="rekening" id="rekening" />
            </div>
            <div class="mb-3">
              <label for="siup" class="form-label">SIUP/ TDP/ NIB</label>
              <input type="text" class="form-control" name="siup" id="siup" />
            </div>
            <div class="mb-3">
              <label for="keterangan" class="form-label">Keterangan</label>
              <input type="text" class="form-control" name="keterangan" id="keterangan" />
            </div>
            <label for="">Upload Softcopy Proposal</label><br />
            <div class="input-group mb-3 mt-2">
              <input type="file" class="form-control" id="inputGroupFile02" name="file" />
              <label class="input-group-text" for="inputGroupFile02">Upload</label>
            </div>
            
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
            
            <button type="submit" name="btnsubmit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>