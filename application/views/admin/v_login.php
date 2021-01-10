<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap-3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/toastr/css/toastr.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/iCheck/square/blue.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/toastr/css/toastr.min.css">
    <script src="<?php echo base_url() ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div id="infoBerhasil" data-info="<?php echo $this->session->flashdata('info') ?>"></div>
        <div id="infoGagal" data-info="<?php echo $this->session->flashdata('infoGagal') ?>"></div>
        <div class="login-logo">
            <a href="../../index2.html"><b>Berita</b>News</a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Login untuk admin</p>
            <?php echo form_open('login/prosess_login') ?>
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email" name="email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>

    <script src="<?php echo base_url() ?>assets/bootstrap-3/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/toastr/js/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            let infoBerhasil = $('#infoBerhasil').data('info');
            let infoGagal = $('#infoGagal').data('info');
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            if (infoBerhasil) {
                toastr.info(infoBerhasil);
            }
            if (infoGagal) {
                toastr.warning(infoGagal);
            }
        });
    </script>
</body>

</html>