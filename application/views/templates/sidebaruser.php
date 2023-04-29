<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #008080;">

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
<li class="nav-item" style="padding-left: 10px;">
    <a class="nav-link" href="<?= base_url('user'); ?>">
        <img src="<?= base_url(); ?>assets/img/icon/dashboard.png" alt="" style="width: 25px;">
        <span style="margin-left: 5px;">Dashbord</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<li class="nav-item" style="margin-top: -10px; padding-left: 10px;">
    <a class="nav-link" href="<?= base_url('user/TabunganKu'); ?>">
        <img src="<?= base_url(); ?>assets/img/icon/income.png" alt="" style="width: 25px;">
        <span style="margin-left: 5px;">TabunganKu</span></a>
</li>
<!-- Divider -->

<!-- Divider -->
<hr class="sidebar-divider">

<li class="nav-item" style="margin-top: -10px; padding-left: 10px;">
    <a class="nav-link" href="<?= base_url('user/myprofile'); ?>">
        <img src="<?= base_url(); ?>assets/img/icon/expense.png" alt="" style="width: 25px;">
        <span style="margin-left: 5px;">Profile Saya</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider">

<li class="nav-item" style="margin-top: -10px; padding-left: 10px;">
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