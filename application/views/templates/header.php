<!doctype html>
<html class="no-js " lang="en">


<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title>Sistem Informasi Disposisi Surat Masuk</title>
<link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/templates/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/templates/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/templates/plugins/charts-c3/plugin.css"/>

<link rel="stylesheet" href="<?php echo base_url() ?>assets/templates/plugins/morrisjs/morris.min.css" />

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
<link href="<?php echo base_url() ?>assets/templates/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/animate.css">

<!-- Custom Css -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/templates/css/style.min.css">
</head>

<body class="theme-blush">

<!-- Page Loader -->
<!-- <div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="<?php echo base_url() ?>assets/templates/images/loader.svg" width="48" height="48" alt="Aero"></div>
        <p>Please wait...</p>
    </div>
</div> -->

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Main Search -->
<div id="search">
    <button id="close" type="button" class="close btn btn-primary btn-icon btn-icon-mini btn-round">x</button>
    <form>
      <input type="search" value="" placeholder="Search..." />
      <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>

<!-- Right Icon menu Sidebar -->
<div class="navbar-right d-print-none">
    <ul class="navbar-nav">
        <li><a href="#search" class="main_search" title="Search..."><i class="zmdi zmdi-search"></i></a></li>
        
        <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" title="Notifications" data-toggle="dropdown" role="button"><i class="zmdi zmdi-notifications"></i>
                <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
            </a>
            <ul class="dropdown-menu slideUp2">
                <li class="header">Notifications</li>
                <li class="body">
                    <ul class="menu list-unstyled">
                        <li>
                            <a href="javascript:void(0);">
                                <div class="icon-circle bg-blue"><i class="zmdi zmdi-account"></i></div>
                                <div class="menu-info">
                                    <h4>8 New Members joined</h4>
                                    <p><i class="zmdi zmdi-time"></i> 14 mins ago </p>
                                </div>
                            </a>
                        </li>
                        
                    </ul>
                </li>
                <li class="footer"> <a href="javascript:void(0);">View All Notifications</a> </li>
            </ul>
        </li>
        
        
       
        <li><a href="<?php echo base_url() ?>auth/logout" onclick="return confirm('Apakah yakin anda akan keluar ?')" class="mega-menu text-danger" title="Sign Out"><i class="zmdi zmdi-power"></i></a></li>
    </ul>
</div>

<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar d-print-none">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>assets/templates/images/logo.svg" width="25" alt="Aero"><span class="m-l-10">Disposisi</span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <a class="image" href="<?php echo base_url() ?>profil/<?php echo $this->session->userdata('session_nip') ?>"><img src="<?php echo base_url() ?>assets/templates/images/profile_av.png" alt="User"></a>
                    <div class="detail text-left">
                        <h6><?php echo $this->session->userdata('session_nama') ?></h6>
                        <small title="jabatan"><?php echo $this->session->userdata('session_jabatan') ?></small><br>
                        <small class="text-info" title="status pegawai"><?php echo $this->session->userdata('session_status_pegawai') ?></small>                        
                    </div>
                </div>
            </li>
            <li <?php if($this->uri->segment(3)=="dashboard"){echo 'class="active open"';}?>><a href="<?php echo base_url() ?>dashboard"><i class="zmdi zmdi-home"></i><span>Beranda</span></a></li>
            <li><a href="<?php echo base_url() ?>profil/<?php echo $this->session->userdata('session_nip') ?>"><i class="zmdi zmdi-account"></i><span>Profile</span></a></li>
            <li><a href="<?php echo base_url() ?>surat_masuk"><i class="zmdi zmdi-inbox"></i>
                <?php 
                $notif = $this->SMasukModel->getSuratByAcc('0');
                $notif_kabag = $this->SMasukModel->get_count('surat_lajur_tujuan',$this->session->userdata('session_jabatan_id'),'surat_ket_kabag');
                $notif_kabid = $this->SMasukModel->get_count('surat_lajur_tujuan',$this->session->userdata('session_jabatan_id'),'surat_ket_kabag');
                $notif_kasubag = $this->SMasukModel->get_count_kasubag('surat_ket_kasubag','',$this->session->userdata('session_jabatan_id'));
                ?>                
                <span>Surat Masuk 
                    <?php if (count($notif)!=0 && $this->session->userdata('session_jabatan')=='Pimpinan'): ?>
                    <span class="badge badge-danger animated jello infinite" title="surat yang belum di acc"> <?= count($notif) ?></span>
                    <?php endif ?>
                    <?php if (count($notif_kabag)!=0  && $this->session->userdata('session_jabatan')=='Kabag'): ?>

                    <span class="badge badge-danger animated jello infinite" title="surat yang belum di acc"> <?= count($notif_kabag) ?></span>
                    <?php endif ?>
                    <?php if (count($notif_kabid)!=0  && $this->session->userdata('session_jabatan')=='Kabid'): ?>

                    <span class="badge badge-danger animated jello infinite" title="surat yang belum di acc"> <?= count($notif_kabid) ?></span>
                    <?php endif ?>
                    <?php if (count($notif_kasubag)!=0  && $this->session->userdata('session_jabatan')=='Kasubbag'): ?>

                    <span class="badge badge-danger animated jello infinite" title="surat yang belum di acc"> <?= count($notif_kasubag) ?></span>
                    <?php endif ?>

                </span>
            </a> </li>
            <?php if ($this->session->userdata('session_status_pegawai')!='fungsional'): ?>
                
            <li><a href="<?php echo base_url() ?>jabatan"><i class="zmdi zmdi-file-text"></i><span>Data Jabatan</span></a></li>


            <li
            <?php if ($this->uri->segment(3)=='pegawai'){ echo "class='active'"; } ?>
            ><a href="<?php echo base_url() ?>pegawai"><i class="zmdi zmdi-accounts"></i><span>Data Pegawai</span></a></li>

            <li
            <?php if ($this->uri->segment(3)=='laporan'){ echo "class='active'"; } ?>
            ><a href="<?php echo base_url() ?>laporan"><i class="zmdi zmdi-file"></i><span>Laporan</span></a></li>

            <?php endif ?>
            
            
            
            
        
            
            
        </ul>
    </div>
</aside>



<!-- Main Content -->

<section class="content">
    <div class="block-header d-print-none">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2><?php echo $breadcumb ?></h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i class="zmdi zmdi-home"></i> SIDSM</a></li>
                    <li class="breadcrumb-item active"><?php echo $breadcumb ?></li>
                </ul>
                <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">                
                <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
            </div>
        </div>
    </div>

    

    <div class="container-fluid">
         <?php if ($this->session->flashdata('alert') == 'success_post') { ?>
            <div class="alert alert-success animated shake hide-it">
                <strong>SUKSES!!!</strong> Data berhasil ditambahkan.
            </div>
        <?php } ?>
        <?php if ($this->session->flashdata('alert') == 'success_delete') { ?>
            <div class="alert alert-warning animated shake hide-it">
                <strong>SUKSES!!!</strong> Data berhasil dihapus.
            </div>
        <?php } ?>
        <?php if ($this->session->flashdata('alert') == 'success_change') { ?>
            <div class="alert alert-info animated shake hide-it">
                <strong>SUKSES!!!</strong> Data berhasil diubah.
            </div>
        <?php } ?>
        <?php if ($this->session->flashdata('alert') == 'fail_edit') { ?>
            <div class="alert alert-danger animated shake hide-it">
                <strong>GAGAL!!!</strong> Terjadi kesalahan saat menyimpan.
            </div>
        <?php } ?>
        
        <div class="row clearfix">
            <div class="col-lg-12">
             