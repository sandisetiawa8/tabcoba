<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: rebeccapurple;">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('user'); ?>">
    <div class="sidebar-brand-icon rotate-n-15">
    <i class="fa-brands fa-hackerrank"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SIKAM JEJAMA</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider">

<li class="nav-item" style="margin-top: 10px; padding-left: 10px;">
    <a class="nav-link" href="<?= base_url('user/formkerjasama'); ?>">
    <img src="<?= base_url(); ?>assets/img/icon/ajukan.png" alt="" style="width: 30px; ">
        <span style="margin-left: 5px;">Ajukan Kerjasama</span></a>
</li>

<hr class="sidebar-divider">

<li class="nav-item" style="margin-top: -10px; padding-left: 10px;">
    <a class="nav-link" href="<?= base_url('user/proposalsaya'); ?>">
    <img src="<?= base_url(); ?>assets/img/icon/daftarproposal.png" alt="" style="width: 30px;">
        <span style="margin-left: 5px;">Proposal Saya</span></a>
</li>

<hr class="sidebar-divider">

<li class="nav-item" style="margin-top: -10px; padding-left: 10px;">
    <a class="nav-link" href="<?= base_url('user/editprofile'); ?>">
    <img src="<?= base_url(); ?>assets/img/icon/editprofile.png" alt="" style="width: 30px;">
        <span style="margin-left: 5px;">Edit Profile</span></a>
</li>

<hr class="sidebar-divider">

<li class="nav-item" style="margin-top: -10px; padding-left: 10px;">
    <a class="nav-link" href="<?= base_url('user/ubahpassword'); ?>">
    <img src="<?= base_url(); ?>assets/img/icon/ubahpassword.png" alt="" style="width: 30px;">
        <span style="margin-left: 5px;">Ubah Kata Sandi</span></a>
</li>

<hr class="sidebar-divider">

<li class="nav-item" style="margin-top: -10px; padding-left: 10px;">
    <a class="nav-link" href="#" onclick="keluar('<?= base_url('auth/logout'); ?>')">
    <img src="<?= base_url(); ?>assets/img/icon/logout.png" alt="" style="width: 30px;">
        <span style="margin-left: 5px;">Logout</span></a>
</li>

<hr class="sidebar-divider">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->