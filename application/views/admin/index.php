<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
  <div class="page-content">
     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="container-fluid">
    <div class="col-lg">
        <?= $this->session->flashdata('message'); ?>
    </div>

<!-- <?php var_dump(base_url()) ?> -->

      <!-- start page title -->
      <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <a href="<?= base_url('admin/daftaruser'); ?>" style="text-decoration: none">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah User</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_user; ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <a href="<?= base_url('admin/setoran'); ?>" style="text-decoration: none">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Setoran Hari ini</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php if($setoran_hari >
                      0) { ?>
                      <?= rupiah($setoran_hari); ?>
                      <?php }else{ ?>
                      <?= rupiah(0); ?>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
              <a href="<?= base_url('admin/penarikan'); ?>" style="text-decoration: none">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Penarikan Hari ini</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php if($penarikan_hari >
                      0) { ?>
                      <?= rupiah($penarikan_hari); ?>
                      <?php }else{ ?>
                      <?= rupiah(0); ?>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
              <a href="<?= base_url('admin/keuangan'); ?>" style="text-decoration: none">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Tabungan Semua Siswa</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php if($jumlah_semua >
                      0) { ?>
                      <?php foreach($jumlah_semua as $data) { ?>
                      <?= rupiah($data['setoran'] - $data['penarikan']); ?>
                      <?php } ?>
                      <?php }else{ ?>
                      <?= rupiah(0); ?>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end row -->

    <div class="row">
      <!-- Area Chart -->
      <div class="col-xl-12 col-lg-12 m-2">
        <div class="card border-left-info shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Profile Sekolah</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th class="text-center">Nama Sekolah</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Akreditasi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center">SD Negeri 20 Waylima</td>
                    <td class="text-center">Jl. Raya Jembangan, Desa Pekondoh, Kecamatan Waylima, Pesawaran</td>
                    <td class="text-center">Akreditasi B</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- Content Row -->
      <div class="row">
        <!-- Content Column -->
        <div class="col-lg-6 mb-4"></div>
      </div>
    </div>


    
  </div>
  <!-- container-fluid -->
</div>
<!-- End Page-content -->
