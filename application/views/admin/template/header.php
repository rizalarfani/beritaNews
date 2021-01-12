<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> BeritaNews | <?php echo $title ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/bootstrap-3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/toastr/css/toastr.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.css">
    <script src="<?php echo base_url('assets') ?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>
</head>

<body class="hold-transition skin-green sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <div id="infoBerhasil" data-info="<?php echo $this->session->flashdata('info') ?>"></div>
        <div id="infoGagal" data-info="<?php echo $this->session->flashdata('infoGagal') ?>"></div>
        <header class="main-header">
            <!-- Logo -->
            <a href="<?php echo base_url() ?>" class="logo">
                <span class="logo-mini"><b>UAS Berita News</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Berita</b>News</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav" style="margin-right: 20px;">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img alt="User Profile <?php echo $this->session->userdata('log_admin')->nama_lengkap ?>" src="<?php echo base_url() ?>upload/profil/<?php echo $this->session->userdata('log_admin')->foto ?>" class="user-image">
                                <span class="hidden-xs"><?php echo $this->session->userdata('log_admin')->nama_lengkap ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img alt="User Profile <?php echo $this->session->userdata('log_admin')->nama_lengkap ?>" class="img-circle" src="<?php echo base_url() ?>upload/profil/<?php echo $this->session->userdata('log_admin')->foto ?>">
                                    <p>
                                        <?php echo $this->session->userdata('log_admin')->email ?>
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo base_url('profil') ?>" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo base_url('logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>