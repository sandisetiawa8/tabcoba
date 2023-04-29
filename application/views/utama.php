<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TabunganKu</title>
    <link rel="icon" href="<?=  base_url() ?>assets/img/icon2.png">
    <link rel="stylesheet" href="<?=  base_url() ?>assets/css/styleutama.css" />
  </head>
  

  <body>
    <nav>
      <div class="wrapper">
        <div class="logo"><a href="">TabunganKu</a></div>
        <div class="menu">
          <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="<?= base_url('auth') ?>" class="tbl-biru">LOGIN</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="wrapper">
      <!-- untuk home -->
      <section id="home">
        <img
          src="<?=  base_url() ?>assets/img/3.jpg"
        />
        <div class="kolom">
          <p class="deskripsi center">Yuk Mulai #Menabung</p>
          <h2 class="center">Tetap Sehat, Tetap Semangat</h2>
          <p class="center" style="padding: 10px;">Menabung mempunyai berbagai manfaat diantaranya melatih anak untuk tidak hidup boros dan melatih anak untuk hemat serta membiasakan untuk tidak jajan sembarangan.</p>
          <p class="center"><a href="<?= base_url('auth') ?>" class="tbl-pink">Yuk Mulai Menabung</a></p>
        </div>
      </section>


      <div id="contact">
      <div class="wrapper">
        <div class="footer">
          <div class="footer-section">
            <h3 class="tabungan1">TabunganSiswa.</h3>
            <p style="text-align: justify;">Membiasakan anak menabung mempunyai berbagai manfaat diantaranya melatih anak untuk tidak hidup boros dan melatih anak untuk hemat serta membiasakan untuk tidak jajan sembarangan.</p>
          </div>
          <div class="footer-section">
            <h3 class="Right">About</h3>
            <p class="Right" style="text-align: justify;">Aplikasi tabungan siswa ini dibangun dengan menggunakan framework codeigniter 3 dan bootstrap versi 5</p>
          </div>
          <div class="footer-section">
            <h3>Contact</h3>
            <p>Kecamatan Waylima Lampung <br>Kode Pos: 35367</p>
            
          </div>
          <div class="footer-section">
            <h3 class="Right">Social</h3>
            <p class="Right">
              <a href="www.facebook.com/sandisiputra.gemini"><b>Facebook: </b> Sandi Setiawan</a>
            </p>
          </div>
        </div>
      </div>
    </div>

    <div id="copyright">
      <div class="wrapper">&copy; 2023. <b>TabunganKu.</b> All Rights Reserved.</div>
    </div>
  </body>
</html>
