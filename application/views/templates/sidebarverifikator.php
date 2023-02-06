<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: rebeccapurple;">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('verifikator'); ?>">
    <div class="sidebar-brand-icon rotate-n-15">
    <i class="fa-brands fa-hackerrank"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SIKAM JEJAMA</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - My Profile -->
<li class="nav-item" style="padding-left: 10px;">
    <a class="nav-link" href="<?= base_url('verifikator'); ?>">
        <img src="<?= base_url(); ?>assets/img/icon/dashbord.png" alt="" style="width: 25px;">
        <span style="margin-left: 5px;">Dashbord</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<li class="nav-item" style="margin-top: -10px; padding-left: 10px;">
    <a class="nav-link" href="<?= base_url('verifikator/daftarproposal'); ?>">
        <img src="<?= base_url(); ?>assets/img/icon/daftarproposal.png" alt="" style="width: 25px;">
        <span style="margin-left: 5px;">Daftar Proposal</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider">

<li class="nav-item" style="margin-top: -10px; padding-left: 10px;">
    <a class="nav-link" href="<?= base_url('verifikator/daftaruser'); ?>">
        <img src="<?= base_url(); ?>assets/img/icon/daftaruser.jpg" alt="" style="width: 25px;">
        <span style="margin-left: 5px;">Daftar User</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<li class="nav-item" style="margin-top: -10px; padding-left: 10px;">
    <a class="nav-link" href="<?= base_url('verifikator/editprofile'); ?>">
        <img src="<?= base_url(); ?>assets/img/icon/editprofile.png" alt="" style="width: 25px;">
        <span style="margin-left: 5px;">Edit Profile</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider">

<li class="nav-item" style="margin-top: -10px; padding-left: 10px;">
    <a class="nav-link" href="<?= base_url('verifikator/ubahpassword'); ?>">
        <img src="<?= base_url(); ?>assets/img/icon/ubahpassword.png" alt="" style="width: 25px;">
        <span style="margin-left: 5px;">Ubah Kata Sandi</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider">

<li class="nav-item" style="margin-top: -10px; padding-left: 10px;">
    <a class="nav-link" href="#" onclick="keluar('<?= base_url('auth/logout'); ?>')">
        <img src="<?= base_url(); ?>assets/img/icon/logout.png" alt="" style="width: 25px;">
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