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
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/datatable/style.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/demo_1/style.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/user/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
  <!-- End-CSS -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main/style.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/dashboard/style.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/transaction/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

      
      
  </head>

<body>

  <div class="container-scroller">
    <!-- TopNav -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="<?= base_url('dashboard') ?>">
          <img src="<?= base_url() ?>assets/images/logo/logo.png" alt="logo" /> </a>
        <a class="navbar-brand brand-logo-mini" href="<?= base_url('dashboard') ?>">
          <img src="<?= base_url() ?>assets/images/logo/logo-mini3.png" alt="logo" /> </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav ml-auto">
          
          <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="mdi mdi-account-circle"></i> </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <p class="mb-1 mt-3 font-weight-semibold"><?= $this->lvalidasi->user_login()->nama ?></p>
                <p class="font-weight-light text-muted mb-0"><?= $this->lvalidasi->user_login()->username ?></p>
              </div>
              <a href="<?= base_url('users/edit/'.$this->session->userdata['user_id']) ?>" class="dropdown-item">Edit   Profil</a>
              <a href="<?= base_url('auth/logout') ?>" class="dropdown-item">Sign Out</a>
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
            <a href="" class="nav-link">
              <div class="text-wrapper">
                <p class="profile-name"><?= $this->lvalidasi->user_login()->nama ?></p>
                <p class="designation"><?= $this->lvalidasi->user_login()->username ?></p>
              </div>
            </a>
          </li>
          <li class="nav-item nav-category">Daftar Menu</li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dashboard') ?>">
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('supplier') ?>">
              <span class="menu-title">Suppliers</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('customer') ?>">
              <span class="menu-title">Customers</span>
            </a>
          </li>
          <?php if ($this->lvalidasi->user_login()->level == 1) { ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('users') ?>">
                <span class="menu-title">Kelola Akun</span>
              </a>
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
                  <a class="nav-link" href="<?= base_url('category') ?>">Categories</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url('unit') ?>">Unit</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url('item') ?>">Items</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#transaksi" aria-expanded="false" aria-controls="transaksi">
              <span class="menu-title">Transaksi</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="transaksi">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url('sale') ?>">Penjualan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url('stock/in') ?>">Stock-in</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url('stock/out') ?>">Stock-out</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#laporan" aria-expanded="false" aria-controls="laporan">
              <span class="menu-title">Laporan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="laporan">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?=base_url('report/sAle')?>">Riwayat Penjualan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url('report/filterReport') ?>">Cetak Laporan</a>
                </li>
              </ul>
            </div>
          </li>
          
        </ul>
      </nav>
      <!-- End-SideNav -->

      <div class="main-panel">
        <div class="content-wrapper" id="content-web-page">
          <?php echo $contents ?>
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
  <!-- <script src="<//?php echo base_url() ?>assets/vendors/jquery/jquery.js"></script> -->
  <script src="<?php echo base_url() ?>assets/js/shared/off-canvas.js"></script>
  <script src="<?php echo base_url() ?>assets/js/shared/misc.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/js/jquery.form-validator.min.js"></script>
  <script src="<?php echo base_url() ?>assets/css/alert/sweetalert2.min.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/js/jquery-ui.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script> 

  

  <script>
    $(document).ready(function() {
      $('#table1').DataTable();
    });
  </script>

<script>
    $(document).ready(function() {
      $('#table2').DataTable();
    });
  </script>


  <!-- script untuk stock in/out -->

  <script>
    $(document).ready(function() {
      $(document).on('click', '#select', function() {
        var item_id = $(this).data('id');
        var barcode = $(this).data('barcode');
        var name = $(this).data('name');
        var unit_name = $(this).data('unit');
        var stock = $(this).data('stock');
        $('#item_id').val(item_id);
        $('#barcode').val(barcode);
        $('#item_name').val(name);
        $('#unit_name').val(unit_name);
        $('#stock').val(stock);
        $("#modal-item").modal('hide')
      })
    })
  </script>

  <!-- script untuk detail history stock -->
  <script>
    $(document).ready(function() {
      $(document).on('click', '#dtl_set', function() {
        var barcode = $(this).data('barcode');
        var itemname = $(this).data('itemname');
        var detail = $(this).data('detail');
        var suppliername = $(this).data('suppliername');
        var qty = $(this).data('qty');
        var date = $(this).data('date');
        $('#barcode').text(barcode);
        $('#item_name').text(itemname);
        $('#detail').text(detail);
        $('#supplier_name').text(suppliername);
        $('#qty').text(qty);
        $('#date').text(date);
      })
    })
  </script>

  <script>
    $(document).ready(function() {
      $(document).on('click', '#sale_s', function() {
        var item_id = $(this).data('id');
        var barcode = $(this).data('barcode');
        var price = $(this).data('price');
        var stock = $(this).data('stock');
        $('#item_id').val(item_id);
        $('#barcode').val(barcode);   
        $('#price').val(price);
        $('#stock').val(stock);
        $("#modal-item-sale").modal('hide')
        get_cart_qty(barcode)
      })
    })

    function get_cart_qty(kode_barcode){
      $('#cart_table tr').each(function(){
        var qty_cart = $('#cart_table td.barcode:contains("'+kode_barcode+'")').parent().find("td").eq(4).html()
        if(qty_cart != null){
          $('#qty_cart').val(qty_cart)
        }else{
          $('#qty_cart').val(0)
        }
      })
    }
  </script>

  <script>
    $(document).ready(function() {
      $(document).on('click', '#add_cart', function() {
        var item_id = $('#item_id').val()
        var price = $('#price').val()
        var stock = $('#stock').val()
        var qty = $('#qty').val()
        var qty_cart = $('#qty_cart').val()
        if (item_id == '') {
          alert('product belum dipuilih')
          $('#barcode').focus()
        } else if (stock < 1 || parseInt(stock) < (parseInt(qty_cart) + parseInt(qty))) {
          alert('stock tidak mencukupi')
          $('#barcode').focus()
        } else {
          $.ajax({
            type: 'POST',
            url: '<?= base_url('sale/process') ?>',
            data: {
              'add_cart': true,
              'item_id': item_id,
              'price': price,
              'qty': qty
            },
            dataType: 'json',
            success: function(result) {
              if (result.success == true) {
                $('#cart_table').load('<?= base_url('sale/cart_data') ?>', function() {
                  calculate()
                })
                $('#item_id').val('')
                $('#barcode').val('')
                $('#qty').val(1)
                $('#barcode').focus()
              } else {
                alert('gagal tambah item ')
              }
            }
          })
        }
      })
    })

   
  </script>

  <script>
    $(document).ready(function() {
      $(document).on('click', '#del_cart', function() {
        if (confirm('apakah anda yakin?')) {
          var cart_id = $(this).data('cartid')
          $.ajax({
            type: 'POST',
            url: '<?= base_url('sale/cart_del') ?>',
            dataType: 'json',
            data: {
              'cart_id': cart_id
            },
            success: function(result) {
              if (result.success == true) {
                $('#cart_table').load('<?= base_url('sale/cart_data') ?>', function() {
                  calculate()
                })
              } else {
                alert('Gagal Hapus item cart')
              }
            }
          })
        }
      })
    })
  </script>

  <script>
    $(document).ready(function() {
      $(document).on('click', '#update_cart', function() {
        var cartid = $(this).data('cartid');
        var barcode = $(this).data('barcode');
        var product = $(this).data('product');
        var stock = $(this).data('stock');
        var price = $(this).data('price');
        var qty = $(this).data('qty');
        var total_before = $(this).data('price') * $(this).data('qty');
        var discount_item = $(this).data('discount');
        var total_item = $(this).data('total');
        $('#cartid_item').val(cartid);
        $('#barcode_item').val(barcode);
        $('#product_item').val(product);
        $('#stock_item').val(stock);
        $('#price_item').val(price);
        $('#qty_item').val(qty);
        $('#total_before').val(total_before);
        $('#discount_item').val(discount_item);
        $('#total_item').val(total_item);
        $("#modal-item-sale").modal('hide')
      })
    })

    function count_edit_modal() {
      var price = $('#price_item').val()
      var qty = $('#qty_item').val()
      var discount = $('#discount_item').val()

      total_before = price * qty
      $('#total_before').val(total_before)

      total = (price - discount) * qty
      $('#total_item').val(total)

      if (discount == '') {
        $('#discount_item').val(0)
      }
    }
    $(document).on('keyup mouseup', '#price_item, #qty_item, #discount_item', function() {
      count_edit_modal()
    })
  </script>

  <!-- script update cart -->
  <script>
    $(document).ready(function() {
      $(document).on('click', '#edit_cart', function() {
        var cart_id = $('#cartid_item').val()
        var price = $('#price_item').val()
        var qty = $('#qty_item').val()
        var discount = $('#discount_item').val()
        var total = $('#total_item').val()
        var stock = $('#stock_item').val()
        if (price == '' || qty < 1) {
          alert('Harga Tidak Boleh Kosong!!')
          $('#price_item').focus()
        } else if (qty == '' || qty < 1) {
          alert('Qty Minimal Satu')
          $('#qty_item').focus()
        }
        else if (parseInt(qty) > parseInt(stock)) {
          alert('Stock tidak mencukupi')
          $('#qty_item').focus()
        }else {
          $.ajax({
            type: 'POST',
            url: '<?= base_url('sale/process') ?>',
            data: {
              'edit_cart': true,
              'cart_id': cart_id,
              'price': price,
              'qty': qty,
              'discount': discount,
              'total': total
            },
            dataType: 'json',
            success: function(result) {
              if (result.success == true) {
                $('#cart_table').load('<?= base_url('sale/cart_data') ?>', function() {
                  calculate()
                })
                // alert('Berhasil update data item cart ')
                $('#modal-item-edit').modal('hide')
              } else {
                alert('gagal update item ')
              }
            }
          })
        }
      })
    })

    function calculate() {
      var subtotal = 0;
      $('#cart_table tr').each(function() {
        subtotal += parseInt($(this).find('#total').text())
      })
      isNaN(subtotal) ? $('#sub_total').val(0) : $('#sub_total').val(subtotal)

      var discount = $('#discount').val()
      var grand_total = (subtotal - discount)
      if (isNaN(grand_total)) {
        $('#grand_total').val(0)
        $('#grand_total2').text(0)
      } else {
        $('#grand_total').val(grand_total)
        $('#grand_total2').text(grand_total)
      }

      var cash = $('#cash').val();
      cash != 0 ? $('#change').val(cash - grand_total) : $('#change').val(0)

      if (discount == '' || discount < 0) {
        $('#discount').val(0)
      }
    }


    $(document).on('keyup mouseup', '#discount, #cash', function() {
      calculate()
    })
    $(document).ready(function() {
      calculate()
    })

    $(document).on('click', '#process_payment', function() {
      var customer_id = $('#customer').val()
      var subtotal = $('#sub_total').val()
      var discount = $('#discount').val()
      var grandtotal = $('#grand_total').val()
      var cash = $('#cash').val()
      var change = $('#change').val()
      var note = $('#note').val()
      var date = $('#date').val()

      if (subtotal < 1) {
        alert('Belum memilih item')
        $('#barcode').focus()
      } else if (cash < 1) {
        alert('Uang cash belum di input')
        $('#cash').focus()
      } else {
        if (confirm('Yakin Proses Transaksi ini?')) {
          $.ajax({
            type: 'POST',
            url: '<?= base_url('sale/process') ?>',
            data: {
              'process_payment': true,
              'customer_id': customer_id,
              'subtotal': subtotal,
              'discount': discount,
              'grandtotal': grandtotal,
              'cash': cash,
              'change': change,
              'note': note,
              'date': date
            },
            dataType: 'json',
            success: function(result) {
              if(result.success){
                alert('Transaksi Berhasil')
                window.open('<?=base_url('sale/cetak/')?>' + result.sale_id, '_blank')
              }else{
                alert('Transaksi Gagal')
              }
              location.href='<?=base_url('sale')?>'
            }
          })
        }
      }

    })
    $(document).on('click', '#cancel_payment', function(){
      if(confirm('Apakah Anda Yakin?')){
        $.ajax({
          type: 'POST',
          url: '<?=base_url('sale/cart_del')?>',
          dataType: 'json',
          data:{'cancel_payment':true},
          success:function(result){
            if(result.success == true){
              $('#cart_table').load('<?=base_url('sale/cart_data')?>', function(){
                calculate()
              })
            }
          } 
        })
        $('#discount').val(0)
        $('#cash').val(0)
        $('#customer').val(0).change()
        $('#barcode').val()
        $('#discount').focus()
      }
    })
  </script>
  
  <script>
    $(document).on('click', '#detail-report', function(){
      $('#invoice').text($(this).data('invoice'))
      $('#cust').text($(this).data('customer'))
      $('#datetime').text($(this).data('date') + ' ' + $(this).data('time'))
      $('#total').text($(this).data('total'))
      $('#cash').text($(this).data('cash'))
      $('#discount').text($(this).data('discount'))
      $('#change').text($(this).data('remaining'))
      $('#grandtotal').text($(this).data('grandtotal'))
      $('#note').text($(this).data('note'))
      $('#cashier').text($(this).data('cashier'))

      var product = '<table class="table no-margin">'
      product += '<tr><th>Item</th><th>Price</th><th>Qty</th><th>Disc</th><th>Total</th></tr>'
      $.getJSON('<?=base_url('report/sale_product/')?>'+$(this).data('saleid'), function(data){
        $.each(data, function(key, val){
          product += '<tr><td>'+val.name+'</td><td>'+val.price+'</td><td>'+val.qty+'</td><td>'+val.discount_item+'</td><td>'+val.total+'</td></tr>'
        })
        product += '</table>'
        $('#product').html(product)
      })
      
    })

  </script>

  <script>
     $('#barcode').keypress(function(e){
      var key = e.which;
      var barcode = $(this).val();
      if(key == 13){
        $.ajax({
          type: 'post',
          url: '<?= base_url('sale/get_item') ?>',
          data: {'barcode': barcode},
          dataType: 'json', 
          success: function(result) {
            if (result.success == true) {
              $('#item_id').val(result.item.item_id); 
              $('#barcode').val(barcode);
              $('#price').val(result.item.price);
              $('#stock').val(result.item.stock);

              $('#add_cart').click()
            } else {
              alert('product tidak ditemukan')
            }
          }
        })
      }
    })
  </script>
</body>

    <script>
        $(document).ready(function() {
            $('#table1').DataTable();
        });
    </script>

    <!-- script untuk stock in -->
    <script>
    $(document).ready(function(){
        $(document).on('click', '#select', function(){
            var item_id = $(this).data('id');
            var barcode = $(this).data('barcode');
            var name = $(this).data('name');
            var unit_name = $(this).data('unit');
            var stock = $(this).data('stock');
            $('#item_id').val(item_id);
            $('#barcode').val(barcode);
            $('#item_name').val(name);
            $('#unit_name').val(unit_name);
            $('#stock').val(stock);
            $("#modal-item").modal('hide')
        })
    })
  </script>

<!-- script untuk detail history stock -->
<script>
    $(document).ready(function(){
        $(document).on('click', '#dtl_set', function(){
            var barcode = $(this).data('barcode');
            var itemname = $(this).data('itemname');
            var detail = $(this).data('detail');
            var suppliername = $(this).data('suppliername');
            var qty = $(this).data('qty');
            var date = $(this).data('date');  
            $('#barcode').text(barcode);
            $('#item_name').text(itemname);
            $('#detail').text(detail);
            $('#supplier_name').text(suppliername);
            $('#qty').text(qty);
            $('#date').text(date);
        })
    })
  </script>
    
  </body>
</html>
