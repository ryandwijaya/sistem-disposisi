
<div class="row clearfix">
    <div class="col-md-12">
    
        <div class="body">
            <marquee behavior="" direction="">SELAMAT DATANG DI SISTEM INFORMASI DISPOSISI SURAT MASUK EKOREGION</marquee>
        </div>

    </div>
</div>
<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
               <h2>Gallery</h2> 
            </div>

            <div class="body">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block w-100" width="100%" height="300" src="<?php echo base_url() ?>assets/images/1.jpeg" alt="First slide">
                         <div class="carousel-caption d-none d-md-block">
                            <h5>Kantor Pengendalian Ekoregion</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam itaque duc</p>
                          </div>                      
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" width="100%" height="300" src="<?php echo base_url() ?>assets/images/2.jpeg" alt="Second slide">
                         <div class="carousel-caption d-none d-md-block">
                            <h5>Kantor Pengendalian Ekoregion</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam itaque duc</p>
                          </div>                      
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" width="100%" height="300" src="<?php echo base_url() ?>assets/images/3.jpg" alt="Third slide">
                         <div class="carousel-caption d-none d-md-block">
                            <h5>Kantor Pengendalian Ekoregion</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam itaque duc</p>
                          </div>                      
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>                
            </div>

        </div>
    </div>
</div>
<div class="row clearfix">
            <div class="col-md-4">
                <div class="card widget_2 big_icon mood">
                    <div class="body">
                        <h6>Total Pegawai</h6>
                        <h2><?php echo count($pegawai) ?></h2>
                        <?php if ($this->session->userdata('session_status_pegawai')!='fungsional'): ?>
                            
                        <small><a href="<?php echo base_url() ?>pegawai">Click for details  >></a></small>
                        <?php endif ?>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card widget_2 big_icon mood">
                    <div class="body">
                        <h6>Total Surat Masuk</h6>
                        <h2><?php echo count($surat) ?></h2>
                        <?php if ($this->session->userdata('session_status_pegawai')!='fungsional'): ?>
                            
                        <small><a href="<?php echo base_url() ?>surat_masuk">Click for details  >></a></small>
                        <?php endif ?>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card widget_2 big_icon mood">
                    <div class="body">
                        <h6>Total Pegawai</h6>
                        <h2>300</h2>
                        <?php if ($this->session->userdata('session_status_pegawai')!='fungsional'): ?>
                            
                        <small><a href="#">Click for details  >></a></small>
                        <?php endif ?>
                        
                    </div>
                </div>
            </div>
</div>



<div class="row clearfix">
    <div class="col-md-12">
<div class="card">
    <div class="header">
        <h2>Dashboard</h2>
    </div>
    <div class="body">
        <div class="row">
            <div class="col-md-3">
                <img src="<?php echo base_url() ?>assets/images/logo.png">
            </div>
            <div class="col-md-9">
                <h5>VISI DAN MISI PERUSAHAAN</h5>
                <hr>
                <ul class="nav nav-tabs p-0 mb-3 nav-tabs-success" role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#visi"> <i class="zmdi zmdi-home"></i> Visi </a></li>
                        
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#misi"><i class="zmdi zmdi-settings"></i> Misi </a></li>
                </ul>

                <div class="tab-content">
                <div role="tabpanel" class="tab-pane in active" id="visi">
                 Terwujudnya Pengelolaan Lingkungan Hidup Berbasis Ekoregion.    
                </div>
                <div role="tabpanel" class="tab-pane" id="misi">
                    <p>1. Melaksanakan Inventaris dan Mengembangkan Sistem Informasi Ekoregion Sumatera.</p>    
                    <p>2. Melaksanakan Pengendalian permanfaatan ruang dan pengelolaan Sumber Daya Alam dan Lingkungan Hidup.</p>    
                    <p>2. Melaksanakan peningkatan kapasitas sumber daya manusia, kelembagaan dan laboratorium daerah di ekoregion Sumatera.</p>    
                    <p>2. Melaksanakan penyusunan rencana dan program, keuangan, administrasi umum dan kepegawaian.</p>    
                </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
    </div>
</div>
