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
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main/style.css">
      <link rel="shortcut icon" href="icons/favicon.png"/>
      <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
      <!-- End-CSS -->

    </head>
    <body>
      <div class="container-scroller">
        <!-- TopNav -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
          <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
            <a class="navbar-brand brand-logo" href="<?=base_url('dashboard')?>">
              <img src="icons/logo.png" alt="logo" /> </a>
            <a class="navbar-brand brand-logo-mini" href="<?=base_url('dashboard')?>">
              <img src="icons/logo-mini.png" alt="logo" /> </a>
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
                  <div class="profile-image">
                    <img class="img-xs rounded-circle" src="pictures/' . auth()->user()->foto) }}" alt="profile image">
                    <div class="dot-indicator bg-success"></div>
                  </div>
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
              <?php if($this->session->userdata('level') == 1) { ?>
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
                <span class="menu-title">Kelola Barang</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="kelola_barang">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/product') }}">Daftar Barang</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/supply') }}">Pasok Barang</a>
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
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019 <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i>
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
      $(document).on('input', 'input[name=search_page]', function(){
        if($(this).val() != ''){
          $('#content-web-page').prop('hidden', true);
          $('#content-web-search').prop('hidden', false);
          var search_word = $(this).val();
          $.ajax({
            url: "{{ url('/search') }}/" + search_word,
            method: "GET",
            success:function(response){
              $('.result-1').html(response.length + ' Hasil Pencarian');
              $('.result-2').html('dari "' + search_word + '"');
              var lengthLoop = response.length - 1;
              var searchResultList = '';
              for(var i = 0; i <= lengthLoop; i++){
                var page_url = "{{ url('/', ':id') }}";
                page_url = page_url.replace('%3Aid', response[i].page_url);
                searchResultList += '<a href="'+ page_url +'" class="page-result-child mb-4 w-100"><div class="col-12"><div class="card card-noborder b-radius"><div class="card-body"><div class="row"><div class="col-12"><h5 class="d-block page_url">'+ response[i].page_name +'</h5><p class="align-items-center d-flex justify-content-start"><span class="icon-in-search mr-2"><i class="mdi mdi-chevron-double-right"></i></span> <span class="breadcrumbs-search page_url">'+ response[i].page_title +'</span></p><div class="search-description"><p class="m-0 p-0 page_url">'+ response[i].page_content.substring(0, 500) +'...</p></div></div></div></div></div></div></a>';
              }
              $('#page-result-parent').html(searchResultList);
              $('.page_url:contains("'+search_word+'")').each(function(){
                  var regex = new RegExp(search_word, 'gi');
                  $(this).html($(this).text().replace(regex, '<span style="background-color: #607df3;">'+search_word+'</span>'));
              });
            }
          });
        }else{
          $('#content-web-page').prop('hidden', false);
          $('#content-web-search').prop('hidden', true);
        }
      });
    </script>
    <script src="http://localhost/ipos/public/js/manage_account/account/script.js"></script>
  <script type="text/javascript">
        swal(
          "Berhasil!",
          "Akun baru berhasil dibuat",
          "success"
      );
    
    
    
    
    
    
    $(document).on('click', '.filter-btn', function(e){
      e.preventDefault();
      var data_filter = $(this).attr('data-filter');
      $.ajax({
        method: "GET",
        url: "http://localhost/ipos/public/account/filter/" + data_filter,
        success:function(data)
        {
          $('tbody').html(data);
        }
      });
    });

    $(document).on('click', '.btn-edit', function(){
      var data_edit = $(this).attr('data-edit');
      $.ajax({
        method: "GET",
        url: "http://localhost/ipos/public/account/edit/" + data_edit,
        success:function(response)
        {
          $('.img-edit').attr("src", "http://localhost/ipos/public/pictures/" + response.user.foto);
          $('input[name=id]').val(response.user.id);
          $('input[name=nama]').val(response.user.nama);
          $('input[name=email]').val(response.user.email);
          $('input[name=username]').val(response.user.username);
          $('select[name=role] option[value="'+ response.user.role +'"]').prop('selected', true);
          validator.resetForm();
        }
      });
    });

    $(document).on('click', '.btn-delete', function(e){
      e.preventDefault();
      var data_delete = $(this).attr('data-delete');
      swal({
        title: "Apa Anda Yakin?",
        text: "Data akun akan terhapus, klik oke untuk melanjutkan",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.open("http://localhost/ipos/public/account/delete/" + data_delete, "_self");
        }
      });
    });

    $(document).on('click', '.btn-delete-img', function(){
      $(".img-edit").attr("src", "http://localhost/ipos/public/pictures/default.jpg");
      $('input[name=nama_foto]').val('default.jpg');
    });
  </script>
    <!-- End-Javascript -->
  </body>
</html>