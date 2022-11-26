<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Website POS</title>

      <!-- CSS -->
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/iconfonts/ionicons/css/ionicons.css">
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/iconfonts/typicons/src/font/typicons.css">
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/css/vendor.bundle.base.css">
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/css/vendor.bundle.addons.css">
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/shared/style.css">
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/demo_1/style.css">
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/user/style.css">
      <link rel="shortcut icon" href="icons/favicon.png"/>
      <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
      <!-- End-CSS -->
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main/style.css">
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/alert/style.css">

    </head>
    <body>
      <div class="container-scroller">
        <!-- TopNav -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
          <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
            <a class="navbar-brand brand-logo" href="<?=base_url('dashboard')?>">
              <img src="<?= base_url() ?>assets/images/logo/logo.png" alt="logo" /> </a>
            <a class="navbar-brand brand-logo-mini" href="<?=base_url('dashboard')?>">
              <img src="<?= base_url() ?>assets/images/logo/logo-mini.png" alt="logo" /> </a>
          </div>
          <div class="navbar-menu-wrapper d-flex align-items-center">
            <form class="search-form d-none d-md-block" action="#">
              <div class="form-group">
                <input type="search" class="form-control" name="search_page" placeholder="Cari Halaman">  
              </div>
            </form>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown">
                <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-bell-outline"></i>
                    <span class="count bg-success"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
                  <div class="dropdown-item py-3 border-bottom">
                    <p class="mb-0 font-weight-medium float-left">Anda Memiliki 0 Pemberitahuan</p>
                    <p class="mb-0 font-weight-medium float-left">Anda Memiliki 0 Pemberitahuan</p>
                    <a href="#" role="button" data-toggle="modal" data-target="#notificationModal"><span class="badge badge-pill badge-primary float-right">Semua</span></a>
                  </div>
                    <a class="dropdown-item preview-item py-3">
                      <div class="preview-thumbnail">
                        <i class="mdi mdi-alert m-auto text-warning"></i>
                      </div>
                      <div class="preview-item-content">
                        <h6 class="preview-subject font-weight-normal text-dark mb-1">Barang Hampir Habis</h6>
                        <p class="font-weight-light small-text mb-0"> Stok tersisa  </p>
                      </div>
                    </a>
                    <a class="dropdown-item preview-item py-3">
                      <div class="preview-thumbnail">
                        <i class="mdi mdi-alert m-auto text-danger"></i>
                      </div>
                      <div class="preview-item-content">
                        <h6 class="preview-subject font-weight-normal text-dark mb-1">Barang Telah Habis</h6>
                        <p class="font-weight-light small-text mb-0"> Stok barang telah habis</p>
                      </div>
                    </a>
              </li>
              <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
                <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                  <img class="img-xs rounded-circle" src="pictures/' . auth()->user()->foto) }}" alt="Profile image"> </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                  <div class="dropdown-header text-center">
                    <img class="img-md rounded-circle" src="pictures/' . auth()->user()->foto) }}" alt="Profile image">
                    <p class="mb-1 mt-3 font-weight-semibold"><?= $this->lvalidasi->user_login()->nama?></p>
                    <p class="font-weight-light text-muted mb-0"><?= $this->lvalidasi->user_login()->username?></p>
                  </div>
                  <a href="{{ url('/profile') }}" class="dropdown-item">Profil</a>
                  <a href="<?=base_url('auth/logout')?>" class="dropdown-item">Sign Out</a>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </nav>
        <!-- End-TopNav -->

        <div class="container-fluid page-body-wrapper">
          <!-- SideNav -->
          <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
              <li class="nav-item nav-profile">
                <a href="{{ url('/profile') }}" class="nav-link">
                  <div class="text-wrapper">
                    <p class="profile-name"><?= $this->lvalidasi->user_login()->nama?></p>
                    <p class="designation"><?= $this->lvalidasi->user_login()->username?></p>
                  </div>
                </a>
              </li>
              <li class="nav-item nav-category">Daftar Menu</li>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('dashboard')?>">
                  <span class="menu-title">Dashboard</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('supplier')?>">
                  <span class="menu-title">Suppliers</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('customer')?>">
                  <span class="menu-title">Customers</span>
                </a>
              </li>
              <?php if($this->lvalidasi->user_login()->level == 1) { ?>
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#kelola_akun" aria-expanded="false" aria-controls="kelola_akun">
                  <span class="menu-title">Kelola Akun</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="kelola_akun">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                      <a class="nav-link" href="<?=base_url('users')?>">Daftar Akun</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ url('/access') }}">Hak Akses</a>
                    </li>
                  </ul>
                </div>
              </li>
              <?php } ?>
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#kelola_barang" aria-expanded="false" aria-controls="kelola_barang">
                  <span class="menu-title">Products</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="kelola_barang">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                      <a class="nav-link" href="<?=base_url('category')?>">Categories</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?=base_url('unit')?>">Unit</a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/transaction') }}">
                  <span class="menu-title">Transaksi</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#kelola_laporan" aria-expanded="false" aria-controls="kelola_laporan">
                  <span class="menu-title">Kelola Laporan</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="kelola_laporan">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                      <a class="nav-link" href="{{ url('/report/transaction')  }}">Laporan Transaksi</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ url('/report/workers') }}">Laporan Pegawai</a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
        </nav>
        <!-- End-SideNav -->

        <div class="main-panel">
          <div class="row">
            <div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="notificationModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="notificationModalLabel">Daftar Notifikasi</h5>
                    <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-12">
                          <div class="d-flex justify-content-start align-items-center mb-3">
                            <div class="icon-notification">
                              <i class="mdi mdi-alert m-auto text-warning"></i>
                            </div>
                            <div class="text-group ml-3">
                              <p class="m-0 title-notification">Barang Hampir Habis</p>
                              <p class="m-0 description-notification">Stok tersisa</p>
                            </div>
                          </div>
                          <div class="d-flex justify-content-start align-items-center mb-3">
                            <div class="icon-notification">
                              <i class="mdi mdi-alert m-auto text-danger"></i>
                            </div>
                            <div class="text-group ml-3">
                              <p class="m-0 title-notification">Barang Telah Habis</p>
                              <p class="m-0 description-notification">Stok barang telah habis</p>
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="content-wrapper" id="content-web-page">
            <?php echo $contents?>
          </div>
          <div class="content-wrapper" id="content-web-search" hidden="">
            <div class="row">
              <div class="col-12 text-left">
                <h3 class="d-block">Cari Halaman</h3>
                <h5 class="mt-3 d-block"><span class="result-1"></span> <span class="result-2"></span></h5>
              </div>
              <div class="col-12 mt-3">
                <div class="row" id="page-result-parent">
                </div>
              </div>
            </div>
          </div>
          <footer class="footer" id="footer-content">
            <div class="container-fluid clearfix">
              <!-- <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019 <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i> -->
              </span>
            </div>
          </footer>
        </div>
      </div>
    </div>

    <!-- Javascript -->
    <script src="<?php echo base_url() ?>assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/js/vendor.bundle.addons.js"></script>
    <script src="<?php echo base_url() ?>assets/js/shared/off-canvas.js"></script>
    <script src="<?php echo base_url() ?>assets/js/shared/misc.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/js/jquery.form-validator.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/js/sweetalert.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/templates/script.js"></script>
    <script type="text/javascript">
      swal(
          "Berhasil!",
          "Akun baru berhasil dibuat",
          "success"
      );



      
    </script>
  
    <!-- End-Javascript -->
  </body>
</html>