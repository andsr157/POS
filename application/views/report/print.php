<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title></title>
</head>
<body onload="window.print()">
    
<h1><?=$title?></h1>
<h1><?=$subtitle?></h1>
<div class="row">
        	<div class="col-12 table-responsive">
                
                <table class="table table-custom" id="table1">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>invoice</th>
                    <th>tanggal</th>
                    <th>customer</th>
                    <th>diskon</th>
                    <th>total</th>
                    <th>kasir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;
                    foreach($datafilter as $row) { ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$row->invoice?></td>    
                        <td><?=$row->date?></td>    
                        <td><?= $row->customer_id == null ? "Umum" : $row->customer_name ?></td>   
                        <td><?=$row->discount?></td>    
                        <td><?=$row->final_price?></td>    
                        <td><?=$row->namauser?></td>    
                        
                        <!-- <td>
                            <a href="">
                                <button type="button" class="btn btn-edit btn-icons btn-rounded btn-secondary" data-toggle="modal" data-edit="1">
                                    <i class="mdi mdi-pencil"></i>
                                </button>
                            </a>

                            <a href="">
                                <button type="button" class="btn btn-edit btn-icons btn-rounded btn-secondary" onclick= "return confirm('Apakah anda yakin?')"  data-toggle="modal" data-edit="1">
                                    <i class="mdi mdi-close"></i>
                                </button>
                            </a>
                        </td> -->
                    </tr>
                </tbody>
                <?php
                } ?>
                </table>
        	</div>
        </div>
</body>
</html>