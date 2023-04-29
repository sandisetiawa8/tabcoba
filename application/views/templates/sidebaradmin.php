<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

<div data-simplebar class="h-100">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title">Main</li>

            <li>
                <a href="<?= base_url('admin'); ?>" class="waves-effect">
                <img src="<?= base_url(); ?>assets/img/icon/dashboard.png" alt="" style="width: 25px; margin-right: 10px;">
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="<?= base_url('admin/setoran'); ?>" class="waves-effect">
                <img src="<?= base_url(); ?>assets/img/icon/income.png" alt="" style="width: 25px; margin-right: 10px;">
                    <span>Setoran</span>
                </a>
            </li>

            <li>
                <a href="<?= base_url('admin/penarikan'); ?>" class="waves-effect">
                <img src="<?= base_url(); ?>assets/img/icon/expense.png" alt="" style="width: 25px; margin-right: 10px;">
                    <span>Penarikan</span>
                </a>
            </li>

            <li>
                <a href="<?= base_url('admin/keuangan'); ?>" class="waves-effect">
                <img src="<?= base_url(); ?>assets/img/icon/report.png" alt="" style="width: 25px; margin-right: 10px;">
                    <span>Laporan Keuangan</span>
                </a>
            </li>

            <li>
                <a href="<?= base_url('admin/daftaruser'); ?>" class="waves-effect">
                <img src="<?= base_url(); ?>assets/img/icon/list.png" alt="" style="width: 25px; margin-right: 10px;">
                    <span>Daftar User</span>
                </a>
            </li>

            <li>
                <a href="<?= base_url('admin/editprofile'); ?>" class="waves-effect">
                <img src="<?= base_url(); ?>assets/img/icon/user.png" alt="" style="width: 25px; margin-right: 10px;">
                    <span>Edit Profile</span>
                </a>
            </li>

            <li>
                <a href="<?= base_url('admin/ubahpassword'); ?>" class="waves-effect">
                <img src="<?= base_url(); ?>assets/img/icon/reset-password.png" alt="" style="width: 25px; margin-right: 10px;">
                    <span>Ubah Password</span>
                </a>
            </li>

            <!-- Calender -->
            <li>
                <a href="<?= base_url('auth/logout'); ?>" class="waves-effect">
                <img src="<?= base_url(); ?>assets/img/icon/log-out.png" alt="" style="width: 25px; margin-right: 10px;">
                    <span>Logout</span>
                </a>
            </li>


            

        </ul>
    </div>
    <!-- Sidebar -->
</div>
</div>
<!-- Left Sidebar End -->