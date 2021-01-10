<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img alt="User Profile <?php echo $this->session->userdata('log_admin')->nama_lengkap ?>" src="<?php echo base_url() ?>upload/profil/<?php echo $this->session->userdata('log_admin')->foto ?>" class="img-circle">
            </div>
            <div class="pull-left info">
                <p><?php echo $this->session->userdata('log_admin')->nama_lengkap ?></p>
                <a href="#" class="text-success">Administrasi</a>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li id="dahsboard">
                <a href="<?php echo base_url('dashboard') ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li id="user">
                <a href="<?php echo base_url('user') ?>">
                    <i class="fa fa-users"></i> <span>user</span>
                </a>
            </li>
            <li id="logout">
                <a href="<?php echo base_url('belakang/logout') ?>">
                    <i class="fa fa-sign-out"></i> <span>Logout</span>
                </a>
            </li>
        </ul>
    </section>
</aside>