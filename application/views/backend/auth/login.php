<!doctype html>
<html class="no-js " lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>Login</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/templates/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/templates/css/style.min.css">
</head>

<body class="theme-blush">

<div class="authentication">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12 mt-5">
                <form class="card auth_form" method="POST" action="<?php echo base_url() ?>auth/login">
                    <div class="header">
                        <img class="logo" src="<?php echo base_url() ?>assets/templates/images/logo.svg" alt="">
                        <h5>Log in</h5>
                    </div>
                    <div class="body">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Masukkan NIP" name="nip">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Masukkan Password" name="password">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                            </div>
                        </div>

                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit" name="login">
                            SIGN IN
                        </button>

                    </div>
                </form>

            </div>
            <div class="col-lg-8 col-sm-12">
                <div class="card text-right">
                    <img src="<?php echo base_url() ?>assets/images/logo.png" alt="Sign In" width="400px"
                         heigth="400px"/>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="<?php echo base_url() ?>assets/templates/bundles/libscripts.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/templates/bundles/vendorscripts.bundle.js"></script>
<!-- Lib Scripts Plugin Js -->
</body>


</html>