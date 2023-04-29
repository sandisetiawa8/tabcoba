<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome To Website TabunganSiswa</title>
    <link rel="icon" href="images/icon_tab.jpg">
    <link rel="stylesheet" href="<?=  base_url() ?>assets/css/styleutama.css" />
  </head>

  <body>
    <nav>
      <div class="wrapper">
        <div class="logo"><a href="">Sikam Jejama</a></div>
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
          src="<?=  base_url() ?>assets/img/tabikpun.jpg" width="450px" height="320px"
        />
        <div class="kolom">
          <p class="deskripsi center">Tabikpun</p>
          <h2 class="center">Sistem Kendali Media Jejama</h2>
          <p class="center">Sistem ini banyak menyediakan layanan untuk pendaftaran atau kerja sama antara media Pers dengan Dinas Komunikasi, Informatika, Statistik dan Persandian Kabupaten Pesawaran.</p>
          <p class="center"><a href="<?= base_url('auth'); ?>" class="tbl-pink">Mari Bergabung</a></p>
        </div>
      </section>


    <div id="contact">
      <div class="wrapper">
        <div class="footer">
          <div class="footer-section">
            <h3 class="tabungan1">Sikam Jejama</h3>
            <p>SIKAM JEJAMA merupakan sistem yang menyediakan layanan pendaftaran kerjasama antara media pers dengan Dinas KOMINFOTIKSAN Kab. Pesawaran</p>
          </div>
          <div class="footer-section">
            <h3 class="Right">Tentang</h3>
            <p class="Right">Sistem Kendali Media Jejama</p>
          </div>
          <div class="footer-section">
            <h3>Contact</h3>
            <p>Kominfo <br>Pesawaran Lampung</p>
            
          </div>
          <div class="footer-section">
            <h3 class="Right">Social</h3>
            <p class="Right">
              <a href="#"><b>Facebook: </b> Pesawaran-Bumi Andan Jejama</a>
            </p>
          </div>
        </div>
      </div>
    </div>

    <div id="copyright">
      <div class="wrapper">&copy; 2023. <b>SikamJejama</b> All Rights Reserved.</div>
    </div>
  </body>
</html>
