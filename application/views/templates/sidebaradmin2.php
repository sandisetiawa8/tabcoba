<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #008080; vertical-align: middle;">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
    <div class="sidebar-brand-icon">
    <img src="<?= base_url('assets/img/icon/icon.png')?>" width="40px" alt="" style="margin-right: -20px;">
    </div>
    <div class="sidebar-brand-text mx-3">TABUNGAN SISWA KELAS <?= $user['kelas']; ?><br></div><br>
</a>

<!-- Divider -->
<hr class="sidebar-divider">


<!-- Nav Item - My Profile -->
<li class="nav-item" style="padding-left: 9px;">
    <a class="nav-link" href="<?= base_url('admin'); ?>">
        <img src="<?= base_url(); ?>assets/img/icon/dashboard.png" alt="" style="width: 25px;">
        <span style="margin-left: 5px;">Dashbord</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<li class="nav-item" style="margin-top: -15px; padding-left: 9px;">
    <a class="nav-link" href="<?= base_url('admin/setoran'); ?>">
        <img src="<?= base_url(); ?>assets/img/icon/income.png" alt="" style="width: 25px;">
        <span style="margin-left: 5px;">Setoran</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider">

<li class="nav-item" style="margin-top: -15px; padding-left: 9px;">
    <a class="nav-link" href="<?= base_url('admin/penarikan'); ?>">
        <img src="<?= base_url(); ?>assets/img/icon/expense.png" alt="" style="width: 25px;">
        <span style="margin-left: 5px;">Penarikan</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider">

<li class="nav-item" style="margin-top: -15px; padding-left: 9px;">
    <a class="nav-link" href="<?= base_url('admin/keuangan'); ?>">
        <img src="<?= base_url(); ?>assets/img/icon/report.png" alt="" style="width: 25px;">
        <span style="margin-left: 5px;">Laporan Keuangan</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider">

<li class="nav-item" style="margin-top: -15px; padding-left: 9px;">
    <a class="nav-link" href="<?= base_url('admin/daftaruser'); ?>">
        <img src="<?= base_url(); ?>assets/img/icon/list.png" alt="" style="width: 25px;">
        <span style="margin-left: 5px;">Daftar User</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<li class="nav-item" style="margin-top: -15px; padding-left: 9px;">
    <a class="nav-link" href="<?= base_url('admin/editprofile'); ?>">
        <img src="<?= base_url(); ?>assets/img/icon/user.png" alt="" style="width: 25px;">
        <span style="margin-left: 5px;">Edit Profile</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider">

<li class="nav-item" style="margin-top: -15px; padding-left: 9px;">
    <a class="nav-link" href="<?= base_url('admin/ubahpassword'); ?>">
        <img src="<?= base_url(); ?>assets/img/icon/reset-password.png" alt="" style="width: 25px;">
        <span style="margin-left: 5px;">Ubah Kata Sandi</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider">

<li class="nav-item" style="margin-top: -15px; padding-left: 9px;">
    <a class="nav-link" href="#" onclick="keluar('<?= base_url('auth/logout'); ?>')">
        <img src="<?= base_url(); ?>assets/img/icon/log-out.png" alt="" style="width: 25px;">
        <span style="margin-left: 5px;">Logout</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider">
<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->